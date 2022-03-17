<?php

namespace App\Repositories\Content\Articles;

use App\Models\Content\Article;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories\Content;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Article::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function latest(): Builder
    {
        $query = $this->model->newQuery();

        $query->latest('updated_at');

        return $query;
    }

    public function featured(): Builder
    {
        $query = $this->model->newQuery();

        $query->where('featured_at', '!=', null);

        $query->latest('featured_at');

        return $query;
    }

}

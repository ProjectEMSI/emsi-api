<?php

namespace App\Repositories\Content\Shorts;

use App\Models\Content\Short;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories\Content;
 */
class ShortRepositoryEloquent extends BaseRepository implements ShortRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Short::class;
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
}

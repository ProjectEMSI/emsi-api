<?php

namespace App\Repositories\Content\Articles;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Repositories\Content;
 */
interface ArticleRepository extends RepositoryInterface
{
    public function latest(): Builder;

    public function featured(): Builder;
}

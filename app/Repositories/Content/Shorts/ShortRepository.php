<?php

namespace App\Repositories\Content\Shorts;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Repositories\Content;
 */
interface ShortRepository extends RepositoryInterface
{
    public function latest(): Builder;
}

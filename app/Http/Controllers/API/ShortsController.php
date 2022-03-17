<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Short\ShortCollection;
use App\Repositories\Content\Shorts\ShortRepository;

class ShortsController extends ApiController
{
    public function __construct(protected ShortRepository $shortRepository)
    {
    }

    public function index()
    {
        $shorts = $this->shortRepository->with(['article', 'author'])->latest()->cursorPaginate();

        return new ShortCollection($shorts);
    }

    public function widget()
    {
        $shorts = $this->shortRepository->latest()->take(3)->get();

        return new ShortCollection($shorts);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleCollection;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Content\Article;
use App\Repositories\Content\Articles\ArticleRepository;

class ArticlesController extends Controller
{
    public function __construct(protected ArticleRepository $articleRepository)
    {
    }

    public function latest()
    {
        $articles = $this->articleRepository->with('author')->latest()->cursorPaginate();

        return new ArticleCollection($articles);
    }

    public function featured()
    {
        $articles = $this->articleRepository->with('author')->featured()->cursorPaginate();

        return new ArticleCollection($articles);
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }
}

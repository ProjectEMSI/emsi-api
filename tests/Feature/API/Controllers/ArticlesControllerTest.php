<?php

use App\Models\Content\Article;
use function Pest\Laravel\get;

it('returns latest articles', function () {
    $response = get('/api/v1/articles/latest');

    $response->assertStatus(200);
});

it('returns featured articles', function () {
    $response = get('/api/v1/articles/featured');

    $response->assertStatus(200);
});

it('returns single article', function () {
    $article = Article::factory()->create();

    $response = get('/api/v1/articles/' . $article->slug);

    $response->assertStatus(200);
});

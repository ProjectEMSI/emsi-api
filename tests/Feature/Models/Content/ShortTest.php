<?php

use App\Models\Content\Article;
use App\Models\Content\Short;
use App\Models\User;
use function PHPUnit\Framework\assertInstanceOf;

test('short belongs to author', function () {
    $author = User::factory()->create();
    $short = Short::factory()->create(['content_author_id' => $author->id]);

    assertInstanceOf(User::class, $short->author);
});

test('short belongs to article', function () {
    $article = Article::factory()->create();
    $short = Short::factory()->create(['content_article_id' => $article->id]);

    assertInstanceOf(Article::class, $short->article);
});

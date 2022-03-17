<?php

use App\Models\Content\Article;
use App\Models\User;
use function PHPUnit\Framework\assertInstanceOf;

test('article belongs to author', function () {
    $author = User::factory()->create();
    $article = Article::factory()->create(['content_author_id' => $author->id]);

    assertInstanceOf(User::class, $article->author);
});

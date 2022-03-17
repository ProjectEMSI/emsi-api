<?php

namespace App\Filament\Resources\Content\ArticleResource\Pages;

use App\Filament\Resources\Content\ArticleResource;
use Filament\Resources\Pages\ListRecords;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;
}

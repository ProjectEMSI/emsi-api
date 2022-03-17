<?php

namespace App\Filament\Resources\Content\ArticleResource\Pages;

use App\Filament\Resources\Content\ArticleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;
}

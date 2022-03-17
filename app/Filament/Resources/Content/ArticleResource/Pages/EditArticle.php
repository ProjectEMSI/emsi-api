<?php

namespace App\Filament\Resources\Content\ArticleResource\Pages;

use App\Filament\Resources\Content\ArticleResource;
use Filament\Resources\Pages\EditRecord;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;
}

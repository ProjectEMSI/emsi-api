<?php

namespace App\Filament\Resources\Content\ArticleResource\Schema\Blocks;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\MarkdownEditor;

class TextBlock extends Block
{
    public static function getBlock(): Builder\Block
    {
        return Builder\Block::make('text')
            ->schema([
                MarkdownEditor::make('content')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('articles')
            ])
            ->icon('heroicon-o-document-text');
    }
}

<?php

namespace App\Filament\Resources\Content\ArticleResource\Schema\Blocks;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class ImageBlock extends Block
{
    public static function getBlock(): Builder\Block
    {
        return Builder\Block::make('image')
            ->schema([
                FileUpload::make('image')
                    ->image()
                    ->required(),

                TextInput::make('caption')
            ])
            ->icon('heroicon-o-photograph');
    }
}

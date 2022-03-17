<?php

namespace App\Filament\Resources\Content\ArticleResource\Schema\Blocks;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\MultipleFileUpload;
use Filament\Forms\Components\TextInput;

class ImageCarouselBlock extends Block
{
    public static function getBlock(): Builder\Block
    {
        return Builder\Block::make('image_carousel')
            ->schema([
                MultipleFileUpload::make('images'),
                TextInput::make('caption')
            ])
            ->icon('heroicon-o-collection');
    }
}

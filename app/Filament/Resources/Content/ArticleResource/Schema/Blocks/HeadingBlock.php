<?php

namespace App\Filament\Resources\Content\ArticleResource\Schema\Blocks;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class HeadingBlock extends Block
{

    public static function getBlock(): Builder\Block
    {
        return Builder\Block::make('heading')
            ->schema([
                Select::make('heading')
                    ->options([
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3'
                    ]),

                TextInput::make('text')
            ])
            ->icon('heroicon-o-document-text');
    }
}

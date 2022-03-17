<?php

namespace App\Filament\Resources\Content\ArticleResource\Schema\Blocks;

use Filament\Forms\Components\Builder;

abstract class Block
{
    abstract public static function getBlock(): Builder\Block;
}

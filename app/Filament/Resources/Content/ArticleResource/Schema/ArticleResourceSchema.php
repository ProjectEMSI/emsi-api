<?php

namespace App\Filament\Resources\Content\ArticleResource\Schema;

use App\Filament\Resources\Content\ArticleResource\Schema\Blocks\HeadingBlock;
use App\Filament\Resources\Content\ArticleResource\Schema\Blocks\ImageBlock;
use App\Filament\Resources\Content\ArticleResource\Schema\Blocks\ImageCarouselBlock;
use App\Filament\Resources\Content\ArticleResource\Schema\Blocks\TextBlock;
use App\Forms\Components\ExtendedSpatieTagsInput;
use App\Models\Content\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Forms;
use Spatie\Tags\Tag;

class ArticleResourceSchema
{

    public static function getSchema(): array
    {
        return [
            Forms\Components\Tabs::make('Article')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('General')
                        ->schema([
                            Forms\Components\Grid::make()
                                ->schema([
                                    Forms\Components\Card::make()
                                        ->schema([
                                            Forms\Components\TextInput::make('name')
                                                ->required()
                                                ->reactive()
                                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                                            Forms\Components\TextInput::make('slug')
                                                ->disabled()
                                                ->required()
                                                ->unique(Article::class, 'slug', fn ($record) => $record),
                                            Forms\Components\BelongsToSelect::make('content_author_id')
                                                ->relationship('author', 'name')
//                                                ->relationship('author', 'name', function ($query) {
//                                                    return $query->whereHas('roles', function ($query) {
//                                                        $query->where('name', '=', 'Admin'); // TODO: Set to only certain permission?
//                                                    })->get();
//                                                })
                                                ->default(auth()->user()->id)
                                                ->nullable(),
                                            Forms\Components\DatePicker::make('published_at')
                                                ->label('Published Date')
                                                ->default(now()),
                                            ExtendedSpatieTagsInput::make('tags')
                                                ->maxItems(5),
                                            Forms\Components\DatePicker::make('featured_at')
                                                ->label('Featured Date')
                                                ->disabled(), // TODO: Disabled only if user is not of certain role
                                        ])
                                        ->columns(2)
                                        ->columnSpan(2),

                                    Forms\Components\Card::make()
                                        ->schema([
                                            Forms\Components\FileUpload::make('image')
                                                ->image()
                                        ])
                                        ->columnSpan(2),
                                ])->columnSpan(2),

                            Forms\Components\Grid::make()
                                ->schema([
                                    Forms\Components\Card::make()
                                        ->schema([
                                            Forms\Components\Placeholder::make('created_at')
                                                ->label('Created at')
                                                ->content(fn (?Article $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                            Forms\Components\Placeholder::make('updated_at')
                                                ->label('Last modified at')
                                                ->content(fn (?Article $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                                        ])
                                        ->columnSpan(2),

                                    Forms\Components\Card::make()
                                        ->schema([
                                            Forms\Components\Toggle::make('comments_enabled')
                                                ->inline(false),
                                            Forms\Components\Toggle::make('display_author')
                                                ->inline(false),
                                        ])
                                        ->columnSpan(2)
                                ])->columnSpan(1),
                        ])->columns(3),
                    Forms\Components\Tabs\Tab::make('Content')
                        ->schema([
                            Forms\Components\Builder::make('content')
                                ->blocks([
                                    HeadingBlock::getBlock(),
                                    TextBlock::getBlock(),
                                    ImageBlock::getBlock(),
                                    ImageCarouselBlock::getBlock(),
                                ])
                        ])
                        ->columns(1),
                    Forms\Components\Tabs\Tab::make('seo')
                        ->label('SEO')
                        ->schema([
                            Forms\Components\TextInput::make('seo_title')
                                ->label('Title')
                                ->maxLength(60)
                                ->nullable(),
                            Forms\Components\TextInput::make('seo_description')
                                ->label('Description')
                                ->maxLength(160)
                                ->nullable()
                        ])
                        ->columns(1)
                ])
        ];
    }

}

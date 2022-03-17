<?php

namespace App\Filament\Resources\Content;

use App\Filament\Resources\Content\ShortResource\Pages;
use App\Filament\Resources\Content\ShortResource\RelationManagers;
use App\Models\Content\Short;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ShortResource extends Resource
{
    protected static ?string $model = Short::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\BelongsToSelect::make('content_article_id')
                            ->relationship('article', 'name')
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('url', null)),

                        Forms\Components\BelongsToSelect::make('content_author_id')
                            ->relationship('user', 'name')
                            ->searchable(),

                        Forms\Components\TextInput::make('name')
                            ->columnSpan(2),

                        Forms\Components\Textarea::make('body')
                            ->maxLength(280)
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('url')
                            ->label('URL')
                            ->url()
                            ->nullable()
                            ->columnSpan(2)
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('content_article_id', null))
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShorts::route('/'),
            'create' => Pages\CreateShort::route('/create'),
            'edit' => Pages\EditShort::route('/{record}/edit'),
        ];
    }
}

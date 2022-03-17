<?php

namespace App\Filament\Resources\Permissions;

use App\Filament\Resources\Permissions\RoleResource\Pages;
use App\Filament\Resources\Permissions\RoleResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\UsersRelationManager;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-speakerphone';

    protected static ?string $navigationGroup = 'Permissions';

    protected static ?int $navigationSort = 80;

    protected static ?string $recordTitleAttribute = 'name';

    protected static bool $isGloballySearchable = false;

    public static function form(Form $form): Form
    {
        $guardOptions = collect(config('auth.guards'))->mapWithKeys(function ($value, $key) {
            return [$key => $key];
        });

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\Select::make('guard_name')
                    ->options($guardOptions->toArray())
                    ->required(),

                Forms\Components\BelongsToManyMultiSelect::make('permissions')
                    ->relationship('permissions', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('guard_name')
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            UsersRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}

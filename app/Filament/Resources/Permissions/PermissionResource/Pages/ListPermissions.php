<?php

namespace App\Filament\Resources\Permissions\PermissionResource\Pages;

use App\Filament\Resources\Permissions\PermissionResource;
use Filament\Resources\Pages\ListRecords;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;
}

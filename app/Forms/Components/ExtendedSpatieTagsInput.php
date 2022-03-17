<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Concerns\CanLimitItemsLength;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\SpatieTagsInput;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Tags\Tag;

class ExtendedSpatieTagsInput extends SpatieTagsInput
{
    protected string $view = 'forms.components.extended-spatie-tags-input';

    use CanLimitItemsLength;

    public function getSuggestions(): array
    {
        if ($this->suggestions !== null) {
            return parent::getSuggestions();
        }

        $type = $this->getType();

        return Tag::query()
            ->when(
                filled($type),
                fn (Builder $query) => $query->where('type', $type),
                fn (Builder $query) => $query->whereNull('type'),
            )
            ->limit(5)
            ->pluck('name')
            ->toArray();
    }
}

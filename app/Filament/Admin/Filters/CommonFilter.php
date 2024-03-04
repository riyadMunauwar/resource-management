<?php

namespace App\Filament\Admin\Filters;

use Filament\Tables;
use App\Models\Category;

class CommonFilter
{

    public static function make($type)
    {
        return [
            Tables\Filters\SelectFilter::make('category_id')
                ->label('Category')
                ->options(Category::onlyCurrentUserAndGloabal()->where('type', $type)->get()->mapWithKeys(function ($category) {
                    return [$category->id => $category->name];
                })->toArray())
                ->attribute('category_id')
                ->searchable()
                ->native(false)
                ->columnSpan(2)
        ];
    }
}

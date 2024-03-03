<?php

namespace App\Filament\Admin\Filters;

use Filament\Tables;
use App\Models\Category;

class CommonFilter
{

    public static function make()
    {
        return [
            Tables\Filters\SelectFilter::make('category_id')
                ->label('Category')
                ->options(Category::onlyCurrentUserAndGloabal()->pluck('name', 'id'))
                ->searchable()
                // ->attribute('category_id')
                ->native(false)
        ];
    }
}

<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;


class ResourceTable
{
    public static function make() : array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->toggleable()
                ->sortable(),

        ];
    }
}

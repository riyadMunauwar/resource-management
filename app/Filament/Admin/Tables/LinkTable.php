<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;


class LinkTable
{
    public static function make() : array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->toggleable()
                ->sortable(),

            Tables\Columns\TextColumn::make('link')
                ->searchable()
                ->toggleable()
                ->sortable()
                ->copyable(),

        ];
    }
}

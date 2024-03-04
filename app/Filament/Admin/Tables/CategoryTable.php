<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;


class CategoryTable
{
    public static function make() : array
    {
        return [

            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->toggleable()
                ->sortable(),

            Tables\Columns\TextColumn::make('type')
                ->toggleable()
                ->sortable()
                ->badge(),

            Tables\Columns\TextColumn::make('user.name')
                ->toggleable()
                ->sortable()
                ->badge(),

            Tables\Columns\CheckboxColumn::make('is_global'),

        ];
    }
}

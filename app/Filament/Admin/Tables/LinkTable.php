<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;


class LinkTable
{
    public static function make() : array
    {
        return [

            Tables\Columns\IconColumn::make('is_global')
                ->icon(fn (bool $state): string => match ($state) {
                    true => 'heroicon-o-users',
                    false => 'heroicon-o-lock-closed',
                }),

            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->toggleable()
                ->sortable(),

            Tables\Columns\TextColumn::make('link')
                ->searchable()
                ->toggleable()
                ->sortable()
                ->copyable(),

            Tables\Columns\TextColumn::make('category.name')
                ->badge(),

        ];
    }
}

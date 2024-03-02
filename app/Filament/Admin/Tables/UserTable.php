<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;


class UserTable
{
    public static function make() : array
    {
        return [

            Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->searchable()
                ->toggleable()
                ->sortable(),

            Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->toggleable(),


            Tables\Columns\TextColumn::make('role')
                ->formatStateUsing(fn (string $state): string => \App\Enums\Role::tryFrom($state)->getLabel())
                ->badge()
                ->sortable()
                ->toggleable(),
        ];
    }
}

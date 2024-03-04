<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Enums\FontWeight;


class TaskTable
{
    public static function make() : array
    {
        return [
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->weight(FontWeight::Bold),

                    Tables\Columns\TextColumn::make('user.name')
                        ->label('Created by'),

                    Tables\Columns\TextColumn::make('assignTo.name')
                        ->label('Assign to'),

                    Tables\Columns\TextColumn::make('status')
                        ->badge(),

                    Tables\Columns\TextColumn::make('category.name')
                        ->badge(),

                    Tables\Columns\TextColumn::make('finished_at')
                        ->dateTime(),

                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime(),


                Tables\Columns\CheckboxColumn::make('is_global'),
        ];
    }
}

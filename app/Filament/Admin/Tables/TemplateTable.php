<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Enums\FontWeight;


class TemplateTable
{
    public static function make() : array
    {
        return [
            Tables\Columns\Layout\Grid::make()
                ->columns(1)
                ->schema([

                    Tables\Columns\TextColumn::make('title')
                        ->searchable()
                        ->toggleable()
                        ->sortable()
                        ->weight(FontWeight::Bold),

                    Tables\Columns\TextColumn::make('content')
                        ->copyable(),
                ]),
        ];
    }
}

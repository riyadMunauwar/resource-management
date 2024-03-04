<?php


namespace App\Filament\Admin\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Enums\FontWeight;

class NoticeTable
{
    public static function make() : array
    {
        return [
            Tables\Columns\Layout\Grid::make()
                ->columns(1)
                ->schema([

                    Tables\Columns\IconColumn::make('is_global')
                        ->icon(fn (bool $state): string => match ($state) {
                            true => 'heroicon-o-users',
                            false => 'heroicon-o-lock-closed',
                        }),

                    Tables\Columns\TextColumn::make('title')
                        ->searchable()
                        ->toggleable()
                        ->sortable()
                        ->weight(FontWeight::Bold),

                    Tables\Columns\TextColumn::make('content')
                        ->html()
                        ->copyable(),

                    Tables\Columns\TextColumn::make('category.name')
                        ->badge(),
                ]),
        ];
    }
}

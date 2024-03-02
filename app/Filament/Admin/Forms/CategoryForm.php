<?php

namespace App\Filament\Admin\Forms;

use Filament\Forms;
use Filament\Forms\Form;

class CategoryForm
{

    public static function make()
    {
        return [

            Forms\Components\Checkbox::make('is_global')
                ->default(false),

            Forms\Components\TextInput::make('name')
                ->maxLength(1024)
                ->required(),

            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->default(auth()->id())
                ->columnSpanFull(),

        ];
    }
}

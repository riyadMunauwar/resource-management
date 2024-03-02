<?php

namespace App\Filament\Admin\Forms;

use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Hash;

class UserForm
{

    public static function make()
    {
        return [
            Forms\Components\Select::make('role')
                ->required()
                ->options(\App\Enums\Role::class)
                ->default(\App\Enums\Role::User->value)
                ->native(false),

            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('password')
                ->password()
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->dehydrated(fn ($state) => filled($state))
                ->required(fn (string $operation): bool => $operation === 'create'),

        ];
    }
}

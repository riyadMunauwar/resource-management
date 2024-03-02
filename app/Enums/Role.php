<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Role: string implements HasLabel
{
    case User = 'user';

    case Admin = 'admin';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::User => 'User',
            self::Admin => 'Admin',
        };
    }
}

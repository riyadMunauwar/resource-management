<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TaskStatus: string implements HasLabel
{
    case Pending = 'pending';

    case Processing = 'processing';

    case Complate = 'complate';



    public function getLabel(): ?string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Processing => 'Processing',
            self::Complate => 'Complate',
        };
    }
}

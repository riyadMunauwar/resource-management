<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CategoryType: string implements HasLabel
{
    case Template = 'template';

    case Resource = 'resource';

    case Note = 'note';

    case Notice = 'notice';

    case Task = 'task';

    case Link = 'link';



    public function getLabel(): ?string
    {
        return match ($this) {
            self::Template => 'Template',
            self::Resource => 'Resource',
            self::Notice => 'Notice',
            self::Task => 'Task',
            self::Note => 'Note',
            self::Link => 'Link',
        };
    }
}

<?php

namespace App\Filament\Admin\Actions;

use Filament\Tables;

class CommonBulkAction
{

    public static function make()
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ];
    }
}

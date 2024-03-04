<?php

namespace App\Filament\Admin\Actions;

use Filament\Tables;

class CommonAction
{

    public static function make()
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Filament\Admin\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'User';

    protected static ?string $pluralModelLabel = 'Users';

    protected static ?string $slug = 'users';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'email';

    protected static ?string $navigationLabel = 'Users';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(\App\Filament\Admin\Forms\UserForm::make())
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(\App\Filament\Admin\Tables\UserTable::make())
            ->filters([
                //
            ])
            ->actions(\App\Filament\Admin\Actions\CommonAction::make())
            ->bulkActions(\App\Filament\Admin\Actions\CommonBulkAction::make());
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

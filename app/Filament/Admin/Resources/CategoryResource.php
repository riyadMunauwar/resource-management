<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CategoryResource\Pages;
use App\Filament\Admin\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $modelLabel = 'Category';

    protected static ?string $pluralModelLabel = 'Categories';

    protected static ?string $slug = 'categories';

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Categories';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(\App\Filament\Admin\Forms\CategoryForm::make())
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(\App\Filament\Admin\Tables\CategoryTable::make())
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            // 'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ResourceResource\Pages;
use App\Filament\Admin\Resources\ResourceResource\RelationManagers;
use App\Models\Resource as ResourceModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\FiltersLayout;

class ResourceResource extends Resource
{
    protected static ?string $model = ResourceModel::class;

    protected static ?string $modelLabel = 'Resource';

    protected static ?string $pluralModelLabel = 'Resources';

    protected static ?string $slug = 'resource';

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Resources';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(\App\Filament\Admin\Forms\ResourceForm::make())
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->id())->orWhere('is_global', true)->latest())
            ->columns(\App\Filament\Admin\Tables\ResourceTable::make())
            ->filters(\App\Filament\Admin\Filters\CommonFilter::make(), layout: FiltersLayout::AboveContent)
            ->actions(\App\Filament\Admin\Actions\CommonAction::make())
            ->bulkActions(\App\Filament\Admin\Actions\CommonBulkAction::make())
            ->contentGrid(['sm' => 2])
            ->reorderable('position');
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
            'index' => Pages\ListResources::route('/'),
            'create' => Pages\CreateResource::route('/create'),
            // 'edit' => Pages\EditResource::route('/{record}/edit'),
        ];
    }
}

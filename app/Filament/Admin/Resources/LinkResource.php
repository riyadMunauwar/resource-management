<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LinkResource\Pages;
use App\Filament\Admin\Resources\LinkResource\RelationManagers;
use App\Models\Link;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\FiltersLayout;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $modelLabel = 'Link';

    protected static ?string $pluralModelLabel = 'Links';

    protected static ?string $slug = 'links';

    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Links';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(\App\Filament\Admin\Forms\LinkForm::make())
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->id())->orWhere('is_global', true)->latest())
            ->columns(\App\Filament\Admin\Tables\LinkTable::make())
            ->filters(\App\Filament\Admin\Filters\CommonFilter::make(), layout: FiltersLayout::AboveContent)
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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            // 'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }
}

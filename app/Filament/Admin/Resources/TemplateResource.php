<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TemplateResource\Pages;
use App\Filament\Admin\Resources\TemplateResource\RelationManagers;
use App\Models\Template;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\FiltersLayout;

class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $modelLabel = 'Template';

    protected static ?string $pluralModelLabel = 'Templates';

    protected static ?string $slug = 'templates';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Templates';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(\App\Filament\Admin\Forms\TemplateForm::make())
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->latest())
            ->columns(\App\Filament\Admin\Tables\TemplateTable::make())
            ->filters(\App\Filament\Admin\Filters\CommonFilter::make(\App\Enums\CategoryType::Template->value), layout: FiltersLayout::AboveContent)
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
            'index' => Pages\ListTemplates::route('/'),
            'create' => Pages\CreateTemplate::route('/create'),
            // 'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }
}

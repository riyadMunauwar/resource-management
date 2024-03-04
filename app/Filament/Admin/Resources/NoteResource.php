<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\NoteResource\Pages;
use App\Filament\Admin\Resources\NoteResource\RelationManagers;
use App\Models\Note;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\FiltersLayout;

class NoteResource extends Resource
{
    protected static ?string $model = Note::class;

    protected static ?string $modelLabel = 'Note';

    protected static ?string $pluralModelLabel = 'Notes';

    protected static ?string $slug = 'notes';

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Notes';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(\App\Filament\Admin\Forms\NoteForm::make())
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(\App\Filament\Admin\Tables\NoteTable::make())
            ->filters(\App\Filament\Admin\Filters\CommonFilter::make(\App\Enums\CategoryType::Note->value), layout: FiltersLayout::AboveContent)
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
            'index' => Pages\ListNotes::route('/'),
            'create' => Pages\CreateNote::route('/create'),
            // 'edit' => Pages\EditNote::route('/{record}/edit'),
        ];
    }
}

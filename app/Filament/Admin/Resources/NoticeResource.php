<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\NoticeResource\Pages;
use App\Filament\Admin\Resources\NoticeResource\RelationManagers;
use App\Models\Notice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\FiltersLayout;

class NoticeResource extends Resource
{
    protected static ?string $model = Notice::class;

    protected static ?string $modelLabel = 'Notice';

    protected static ?string $pluralModelLabel = 'Notices';

    protected static ?string $slug = 'notices';

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Notices';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(\App\Filament\Admin\Forms\NoticeForm::make())
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->id())->orWhere('is_global', true)->latest())
            ->columns(\App\Filament\Admin\Tables\NoticeTable::make())
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
            'index' => Pages\ListNotices::route('/'),
            'create' => Pages\CreateNotice::route('/create'),
            // 'edit' => Pages\EditNotice::route('/{record}/edit'),
        ];
    }
}

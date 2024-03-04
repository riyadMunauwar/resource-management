<?php

namespace App\Filament\Admin\Forms;

use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class TaskForm
{

    public static function make()
    {
        return [

            Forms\Components\Checkbox::make('is_global')
                ->default(false),

            Forms\Components\DateTimePicker::make('published_at')
                ->native(false)
                ->nullable(),

            Forms\Components\Select::make('category_id')
                ->relationship(
                    name: 'category',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn (Builder $query) => $query->where('type', \App\Enums\CategoryType::Task->value),
                )
                ->createOptionForm(\App\Filament\Admin\Forms\CategoryForm::make())
                ->label('Category')
                ->getSearchResultsUsing(fn (string $search): array => Category::onlyCurrentUserAndGlobal()->where('type', \App\Enums\CategoryType::Task->value)->where('name', 'like', "%{$search}%")->limit(12)->pluck('name', 'id')->toArray())
                ->getOptionLabelUsing(fn ($value): ?string => Category::find($value)?->name)
                ->searchable()
                ->preload()
                ->placeholder('Search category')
                ->required()
                ->native(false),

            Forms\Components\Select::make('status')
                ->options(\App\Enums\TaskStatus::class)
                ->required()
                ->default(\App\Enums\TaskStatus::Pending->value)
                ->native(false),

            Forms\Components\TextInput::make('name')
                ->maxLength(255)
                ->required(),

            Forms\Components\RichEditor::make('description')
                ->nullable(),

            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required()
                ->default(auth()->id())
                ->columnSpanFull(),

            Forms\Components\Select::make('assign_to_id')
                ->relationship('assignTo', 'name')
                ->searchable()
                ->required()
                ->default(auth()->id())
                ->columnSpanFull(),
        ];
    }
}

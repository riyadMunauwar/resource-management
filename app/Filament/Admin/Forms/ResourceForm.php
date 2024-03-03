<?php

namespace App\Filament\Admin\Forms;

use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Category;

class ResourceForm
{

    public static function make()
    {
        return [

            Forms\Components\Checkbox::make('is_global')
                ->default(false),

            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->createOptionForm(\App\Filament\Admin\Forms\CategoryForm::make())
                ->label('Category')
                ->getSearchResultsUsing(fn (string $search): array => Category::onlyCurrentUserAndGlobal()->where('name', 'like', "%{$search}%")->limit(12)->pluck('name', 'id')->toArray())
                ->getOptionLabelUsing(fn ($value): ?string => Category::find($value)?->name)
                ->searchable()
                ->preload()
                ->placeholder('Search category')
                ->required()
                ->native(false),

            Forms\Components\TextInput::make('title')
                ->maxLength(255)
                ->required(),

            Forms\Components\RichEditor::make('content')
                ->required(),

            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required()
                ->default(auth()->id())
                ->columnSpanFull(),
        ];
    }
}

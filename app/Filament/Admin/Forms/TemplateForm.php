<?php

namespace App\Filament\Admin\Forms;

use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;


class TemplateForm
{

    public static function make()
    {
        return [

            Forms\Components\Checkbox::make('is_global')
                ->default(false),

            Forms\Components\Select::make('category_id')
                ->relationship(
                    name: 'category',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn (Builder $query) => $query->where('type', \App\Enums\CategoryType::Template->value),
                )
                ->createOptionForm(\App\Filament\Admin\Forms\CategoryForm::make())
                ->label('Category')
                ->getSearchResultsUsing(fn (string $search): array => Category::onlyCurrentUserAndGlobal()->where('type', \App\Enums\CategoryType::Template->value)->where('name', 'like', "%{$search}%")->limit(12)->pluck('name', 'id')->toArray())
                ->getOptionLabelUsing(fn ($value): ?string => Category::find($value)?->name)
                ->searchable()
                ->preload()
                ->placeholder('Search category')
                ->required()
                ->native(false),

            Forms\Components\TextInput::make('title')
                ->maxLength(255)
                ->required(),

            Forms\Components\Textarea::make('content')
                ->required()
                ->rows(10)
                ->cols(20),

            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required()
                ->default(auth()->id())
                ->columnSpanFull(),

        ];
    }
}

<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Events;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\MorphToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Pages\Crud\DetailPage;

class EventsDetailPage extends DetailPage
{
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Title')
                    ->updateOnPreview()
                    ->required(),
                Slug::make('Slug')
                    ->unique()
                    ->separator('-')
                    ->from('title')
                    ->required(),
                TinyMce::make('content'),
            ])
        ];
    }

    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}

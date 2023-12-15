<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Events;

use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\MorphToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;

class EventsIndexPage extends IndexPage
{
    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make(__('Title'), 'title'),
//            Text::make(__('Content'), 'content'),
            MorphToMany::make('Tag', 'tags', 'name')->fields([Text::make('Tags', 'name')]),
            Slug::make(__('Slug'), 'slug'),
            Image::make(__('Thumbnail'), 'thumbnail'),
        ];    }

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

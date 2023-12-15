<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\News;

use MoonShine\Decorations\Heading;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\MorphToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;

class NewsIndexPage extends IndexPage
{
    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make(__('Title'), 'title'),
//            Text::make(__('Content'), 'content'),
            MorphToMany::make(__('Tag'), 'tags'),
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
            Heading::make('Title'),

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

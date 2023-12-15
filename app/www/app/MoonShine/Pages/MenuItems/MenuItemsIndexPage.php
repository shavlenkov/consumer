<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\MenuItems;

use MoonShine\Fields\ID;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;

class MenuItemsIndexPage extends IndexPage
{
    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make(__('Title'), 'title'),
            Slug::make(__('Url'), 'url'),
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

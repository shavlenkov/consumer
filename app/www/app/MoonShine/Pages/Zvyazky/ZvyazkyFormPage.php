<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Zvyazky;

use MoonShine\Pages\Crud\FormPage;

class ZvyazkyFormPage extends FormPage
{
    public function fields(): array
    {
        return [];
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

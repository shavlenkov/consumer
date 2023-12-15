<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;

class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Categories';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('title')->required(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}

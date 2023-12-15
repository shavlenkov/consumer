<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Category;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    public function fields(): array
    {

        $categories = Category::select(['id', 'title'])->get();

        $a = [];
    
        foreach ($categories as $category) {
            $a[$category->id] = $category->title;
        }

        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('title')->required(),
                Text::make('descr')->required(),
                Select::make('Category', 'category_id')
                    ->options($a),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}

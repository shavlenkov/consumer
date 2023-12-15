<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Header;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;

class HeaderResource extends ModelResource
{
    protected string $model = Header::class;

    protected string $title = 'Headers';

    public function getActiveActions(): array 
    {
        return ['view', 'update'];
    } 

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Image::make('Image', 'image_url')
                ->dir('/') 
                ->disk('public')
                ->allowedExtensions(['jpg', 'gif', 'png']),
                Text::make('title'),
                Text::make('subtitle'),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}

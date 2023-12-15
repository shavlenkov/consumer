<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Links;
use App\MoonShine\Pages\Links\LinksIndexPage;
use App\MoonShine\Pages\Links\LinksFormPage;
use App\MoonShine\Pages\Links\LinksDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Url;
use MoonShine\Resources\ModelResource;

class LinksResource extends ModelResource
{
    protected string $model = Links::class;

    protected string $title = 'Links';

    public function pages(): array
    {
        return [
            LinksIndexPage::make($this->title()),
            LinksFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            LinksDetailPage::make(__('moonshine::ui.show')),
        ];
    }
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Url::make('link')
                    ->required(),
                Image::make('image')
            ])
        ];
    }
    public function rules(Model $item): array
    {
        return [];
    }
}

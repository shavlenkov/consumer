<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\MoonShine\Pages\Page\PageIndexPage;
use App\MoonShine\Pages\Page\PageFormPage;
use App\MoonShine\Pages\Page\PageDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;

class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Pages';

    public function pages(): array
    {
        return [
            PageIndexPage::make($this->title()),
            PageFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            PageDetailPage::make(__('moonshine::ui.show')),
        ];
    }
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Title')
                    ->required(),
                Slug::make('Slug')
                    ->unique()
                    ->separator('-')
                    ->from('title'),
                TinyMce::make('Content')
                    ->required(),
                Image::make('thumbnail')
            ])
        ];
    }
    public function rules(Model $item): array
    {
        return [];
    }
}

<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Events;
use App\MoonShine\Pages\Events\EventsIndexPage;
use App\MoonShine\Pages\Events\EventsFormPage;
use App\MoonShine\Pages\Events\EventsDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\MorphToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;

class EventsResource extends ModelResource
{
    protected string $model = Events::class;

    protected string $title = 'Events';

    public function pages(): array
    {
        return [
            EventsIndexPage::make($this->title()),
            EventsFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            EventsDetailPage::make(__('moonshine::ui.show')),
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
                MorphToMany::make('Tag', 'tags', 'name')->sortable()->selectMode(),

                Image::make('thumbnail')
            ])
        ];
    }
    public function rules(Model $item): array
    {
        return [];
    }
}

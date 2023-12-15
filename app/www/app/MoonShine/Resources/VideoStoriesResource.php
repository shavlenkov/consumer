<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\VideoStories;
use App\MoonShine\Pages\VideoStories\VideoStoriesIndexPage;
use App\MoonShine\Pages\VideoStories\VideoStoriesFormPage;
use App\MoonShine\Pages\VideoStories\VideoStoriesDetailPage;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\MorphToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;

class VideoStoriesResource extends ModelResource
{
    protected string $model = VideoStories::class;

    protected string $title = 'VideoStories';

    public function pages(): array
    {
        return [
            VideoStoriesIndexPage::make($this->title()),
            VideoStoriesFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            VideoStoriesDetailPage::make(__('moonshine::ui.show')),
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

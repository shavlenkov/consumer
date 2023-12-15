<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Announcement;
use App\MoonShine\Pages\Announcement\AnnouncementIndexPage;
use App\MoonShine\Pages\Announcement\AnnouncementFormPage;
use App\MoonShine\Pages\Announcement\AnnouncementDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\MorphToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;

class AnnouncementResource extends ModelResource
{
    protected string $model = Announcement::class;

    protected string $title = 'Announcements';

    public function pages(): array
    {
        return [
            AnnouncementIndexPage::make($this->title()),
            AnnouncementFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            AnnouncementDetailPage::make(__('moonshine::ui.show')),
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

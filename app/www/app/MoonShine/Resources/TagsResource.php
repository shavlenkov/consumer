<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tags;
use App\MoonShine\Pages\Tags\TagsIndexPage;
use App\MoonShine\Pages\Tags\TagsFormPage;
use App\MoonShine\Pages\Tags\TagsDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;

class TagsResource extends ModelResource
{
    protected string $model = Tag::class;

    protected string $title = 'Tags';

    public function pages(): array
    {
        return [
            TagsIndexPage::make($this->title()),
            TagsFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            TagsDetailPage::make(__('moonshine::ui.show')),
        ];
    }
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Name')
                    ->required(),
            ])
        ];
    }
    public function rules(Model $item): array
    {
        return [];
    }
}

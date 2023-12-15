<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;
use App\MoonShine\Pages\ContentEdit\ContentEditIndexPage;
use App\MoonShine\Pages\ContentEdit\ContentEditFormPage;
use App\MoonShine\Pages\ContentEdit\ContentEditDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class ContentEditResource extends ModelResource
{
    protected string $model = Content::class;

    protected string $title = 'ContentEdits';

    public function pages(): array
    {
        return [
            ContentEditIndexPage::make($this->title()),
            ContentEditFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ContentEditDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Content')
                    ->required(),
                Slug::make('Slug')
                    ->unique()
                    ->separator('-'),
            ])
        ];
    }
}

<?php
declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\NewsTranslation;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\MoonShine\Pages\News\NewsIndexPage;
use App\MoonShine\Pages\News\NewsFormPage;
use App\MoonShine\Pages\News\NewsDetailPage;

use Illuminate\Validation\Rule;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Fields;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Relationships\HasManyThrough;
use MoonShine\Fields\Relationships\MorphToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use VI\MoonShineSpatieTranslatable\Fields\Translatable;

class NewsResource extends ModelResource implements \MoonShine\Contracts\Menu\MenuFiller
{
    protected string $model = News::class;

    protected string $title = 'Новини';
//    public array $with = [
//        'author',
//        'tag',
//    ];
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Title', 'title->uk')
                    ->setValue($this->getItem()?->getTranslation('title', 'uk'))
                    ->required()
                    ->hideOnIndex(),
                TinyMce::make('Content', 'content->uk')
                    ->setValue($this->getItem()?->getTranslation('content', 'uk'))
//                            ->required()
                    ->hideOnIndex(),
                Slug::make('Slug', 'slug->uk')
                    ->setValue($this->getItem()?->getTranslation('slug', 'uk'))
                    ->separator('-')
                    ->required()
                    ->hideOnIndex(),
                MorphToMany::make('Tag', 'tags', 'name')->selectMode(),

                Image::make('thumbnail')
            ])
        ];
    }

    public function pages(): array
    {
        return [
            NewsIndexPage::make($this->title()),
            NewsFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            NewsDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title->uk' => ['required', 'string', 'max:255'],
//            'title->en' => ['required', 'string', 'max:255'],
            'content->uk' => ['required', 'string', 'min:1'],
//            'content->en' => ['required', 'string', 'min:1'],
            'slug->uk' => ['required', 'string', 'max:255', Rule::unique(News::class, 'slug->uk')->ignore($this->getItemID())],
//            'slug->en' => ['required', 'string', 'max:255', Rule::unique(News::class, 'slug->en')->ignore($this->getItemID())],
        ];
    }

    public function validationMessages(): array
    {
        return [
//            'title->uk.max'=>'', // Пример заполнения
        ];
    }

    public function search(): array
    {
        return ['id', 'title', 'content'];
    }

    public function filters(): array
    {
        return [
            Text::make('Title')
        ];
    }

}

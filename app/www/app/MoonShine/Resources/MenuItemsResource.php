<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Pages\MenuItems\MenuItemsIndexPage;
use App\MoonShine\Pages\MenuItems\MenuItemsFormPage;
use App\MoonShine\Pages\MenuItems\MenuItemsDetailPage;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\Resources\ModelResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MenuItemsResource extends ModelResource
{
    protected string $model = MenuItem::class;

    protected string $title = 'MenuItems';

    public function pages(): array
    {
        return [
            MenuItemsIndexPage::make($this->title()),
            MenuItemsFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            MenuItemsDetailPage::make(__('moonshine::ui.show')),
        ];
    }
    public function fields(): array
    {
        $yourModelValues = MenuItem::pluck('title','id')->toArray(); // Замініть 'name' і 'id' на ваші поля
        $yourModelValues = [NULL => 'No Parent'] + $yourModelValues;

        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Title')
                    ->required(),
                Slug::make('Url')
                    ->unique()
                    ->separator('-')
                    ->from('url'),
                Select::make('Parent Id', 'parent_id')
                    ->options($yourModelValues)
                    ->default(function ($request) use ($yourModelValues) {
                        // Використовуйте перший ідентифікатор як значення за замовчуванням
                        return (string) key($yourModelValues)[0];
                    }),
                Select::make('Page Type', 'page_type')
                    ->options([
                        'post' => 'Post',
                        'link' => 'Link'
                    ])
                    ->default('post')
            ])
        ];
    }
    public function rules(Model $item): array
    {
        return [];
    }
}

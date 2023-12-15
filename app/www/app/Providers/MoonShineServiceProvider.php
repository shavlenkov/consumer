<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\AnnouncementResource;
use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\PostResource;
use App\MoonShine\Resources\ContentEditResource;
use App\MoonShine\Resources\EventsResource;
use App\MoonShine\Resources\LinksResource;
use App\MoonShine\Resources\MenuItemsResource;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\TagsResource;
use App\MoonShine\Resources\VideoStoriesResource;
use App\MoonShine\Resources\ZvyazkyResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
//use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use App\Services\LocaleService;

use App\MoonShine\Resources\HeaderResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),

            // MenuGroup::make('Новини', [
            //     MenuItem::make(
            //         'Список Новин',
            //         new NewsResource()
            //     )
            // ]),
            // MenuGroup::make('Події', [
            //     MenuItem::make(
            //         'Список Подій',
            //         new EventsResource()
            //     )
            // ]),
            // MenuGroup::make('Відео', [
            //     MenuItem::make(
            //         'Усі Відео',
            //         new VideoStoriesResource()
            //     )
            // ]),
            // MenuGroup::make('Анонси', [
            //     MenuItem::make(
            //         'Усі Анонси',
            //         new AnnouncementResource()
            //     )
            // ]),

            MenuGroup::make('Каталог', [
                MenuItem::make(
                    'Категорії',
                    new CategoryResource()
                ),
                MenuItem::make(
                    'Матеріали',
                    new PostResource()
                )
            
                ]),




            MenuGroup::make('Меню', [
                MenuItem::make(
                    'Усі меню',
                    new MenuItemsResource()
                )
            ]),
            MenuGroup::make('Зв`язки', [
                MenuItem::make(
                    'Усі Зв`язки',
                    new ZvyazkyResource()
                )
            ]),
            MenuGroup::make('Сторінки', [
                MenuItem::make(
                    'Усі Зв`язки',
                    new PageResource()
                )
            ]),
            MenuGroup::make('Посилання', [
                MenuItem::make(
                    'Усі Посилання',
                    new LinksResource()
                )
            ]),
            MenuGroup::make('Редагування контенту', [
                MenuItem::make(
                    'Редагувати контент',
                    new ContentEditResource()
                )
            ]),
            MenuGroup::make('Редагування теги', [
                MenuItem::make(
                    'Усі теги',
                    new TagsResource()
                )
            ]),

            MenuGroup::make('Налаштування', [
                MenuItem::make(
                    'Header',
                    new HeaderResource()
                )
            ])

        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}

<?php

declare(strict_types=1);

namespace App\MoonShine;

use App\MoonShine\Components\DemoVersionComponent;
use MoonShine\Components\Layout\{Content, Flash, Footer, Header, LayoutBlock, LayoutBuilder, Menu, Sidebar};
use MoonShine\Contracts\MoonShineLayoutContract;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
            ]),
            LayoutBlock::make([
                DemoVersionComponent::make(),
                Flash::make(),
                Header::make(),
                Content::make(),
                Footer::make()->copyright(fn (): string => <<<'HTML'
                        &copy; 2023 Розробка сайту:
                        <a href="https://doroshenko.agency/"
                            class="font-semibold text-primary hover:text-secondary"
                            target="_blank"
                        > Doroshenko agency
                        </a>
                    HTML),
            ])->customAttributes(['class' => 'layout-page']),
        ]);
    }
}

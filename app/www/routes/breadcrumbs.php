<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use App\Http\Controllers\PagesController;
// home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Головна', route('home'));
});
Breadcrumbs::for('news.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Новини', route('news.index', app()->getLocale()));
});
Breadcrumbs::for('news.show', function ($trail, $news) {
    $trail->parent('news.index');
    $trail->push($news->title, route('news.show', $news->id));
});
Breadcrumbs::for('events.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Події', route('events.index'));
});
Breadcrumbs::for('events.show', function ($trail, $event) {
    $trail->parent('events.index');
    $trail->push($event->title, route('events.show', $event->id));
});
Breadcrumbs::for('announcements.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Анонси', route('announcements.index'));
});
Breadcrumbs::for('videos.show', function ($trail, $event) {
    $trail->parent('videos.index');
    $trail->push($event->title, route('videos.show', $event->id));
});
Breadcrumbs::for('videos.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Відео', route('videos.index'));
});
Breadcrumbs::for('announcements.show', function ($trail, $news) {
    $trail->parent('announcements.index');
    $trail->push($news->title, route('announcements.show', $news->id));
});
Breadcrumbs::for('tag.show', function ($trail, $tag) {
    $trail->parent('home');
    $trail->push($tag->name, route('posts.by.tag', $tag->slug));
});
Breadcrumbs::for('menu.level1', function ($trail, $page) {
    $trail->parent('home');
    if($page->parent->parent->parent && $page->parent->parent->parent !== null ) {
        $trail->push($page->parent->parent->parent->title, route('pages.show', $page->parent->parent->parent->id));
    }else{
        $trail->push($page->title, route('pages.show', $page->id));
    }
});

Breadcrumbs::for('menu.level2', function ($trail, $page) {
    if($page->parent->parent) {
        $trail->parent('menu.level1', $page);
        $trail->push($page->parent->parent->title, route('pages.show', $page->parent->parent->id));
    }else{
        $trail->push($page->title, route('pages.show', $page->id));
    }
});

Breadcrumbs::for('menu.level3', function ($trail, $page) {
    if($page->parent) {
        $trail->parent('menu.level2', $page);
        $trail->push($page->parent->title, route('pages.show', $page->parent->id));
    }else{
        $trail->push($page->title, route('pages.show', $page->id));
    }
});
Breadcrumbs::for('menu.level4', function ($trail, $page) {
    $trail->parent('menu.level3', $page);
    $trail->push($page->title, route('pages.show', $page->id));
});
Breadcrumbs::for('menu.current_menu', function ($trail, $page) {
    $trail->parent('home');

    $breadcrumbs = [];

    while ($page) {
        $breadcrumbs[] = $page;
        $page = $page->parent;
    }

    $breadcrumbs = array_reverse($breadcrumbs);

    foreach ($breadcrumbs as $breadcrumb) {
        $trail->push($breadcrumb->title, route('pages.show', $breadcrumb->id));
    }
});

//Breadcrumbs::for('menu.current_menu', function ($trail, $page) {
//    $trail->parent('menu.level3', $page);
//    $trail->push($page->title, route('pages.show', $page->id));
//});
//Breadcrumbs::for('menu.current_menu', function ($trail, $selectedMenuItem) {
//    $breadcrumbs = PagesController::getMenuBreadcrumbs($selectedMenuItem);
//
//    foreach ($breadcrumbs as $index => $breadcrumb) {
//        if ($index === count($breadcrumbs) - 1) {
//            $trail->push($breadcrumb->title, route('pages.show', $breadcrumb->id));
//        } else {
//            $trail->parent('menu.level' . ($index + 1), $breadcrumb);
//        }
//    }
//});

//Breadcrumbs::for('menu.current_menu', function ($trail, $menu) {
//    $trail->parent('home');
//        if ($menu->parent_id) {
//            $trail->parent('menu.level3', $menu->id);
//        } else {
//            $trail->parent('menu.level1');
//        }
//
//        $trail->push($menu->title, route('pages.show', $menu->id));
//
//});

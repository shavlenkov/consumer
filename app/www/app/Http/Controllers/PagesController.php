<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\MenuItem;
use App\Models\Page;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(5);

        return view('home', compact( 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $selectedMenuItem = MenuItem::find($id);
        $links = Links::all();
        $order = [1, 18, 51, 33, 40, 44];
        $menuItems = $this->getMenuItems($selectedMenuItem);
        $breadcrumbs = Breadcrumbs::render('menu.current_menu', $selectedMenuItem);
        // Отримайте всі дочірні пункти меню рекурсивно
        $menuItemsList = MenuItem::all();

        return view('partials.menu.show', compact('menuItemsList','menuItems', 'selectedMenuItem', 'links','breadcrumbs', 'order'));
    }
    static function getMenuBreadcrumbs($selectedMenuItem)
    {
        $breadcrumbs = [];
        $currentMenuItem = $selectedMenuItem;

        while ($currentMenuItem) {
            $breadcrumbs[] = $currentMenuItem;
            $currentMenuItem = $currentMenuItem->parent;
        }

        // Виводимо для перевірки
//        dd($breadcrumbs);

        return array_reverse($breadcrumbs);
    }
    private function getMenuItems($parentMenuItem)
    {
        $menuItems = [];

        foreach ($parentMenuItem->children as $child) {
            // Рекурсивно отримати дочірні пункти меню
            $childItems = $this->getMenuItems($child);

            // Додати поточний пункт разом із дочірніми
            $menuItems[] = [
                'item' => $child,
                'children' => $childItems,
            ];
        }

        return $menuItems;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}

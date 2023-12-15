@foreach($menuItems as $menuItem)
    <li>
        <a href="{{ is_array($menuItem) && isset($menuItem['item']->page_type) && $menuItem['item']->page_type === 'post' ? route('pages.show', $menuItem['item']->id) : $menuItem['item']->url }}">
        {{ $menuItem['item']->title }}
        </a>
        @if(count($menuItem['children']) > 0)
            <ul>
                @include('partials.menu.menu-item', ['menuItems' => $menuItem['children']])
            </ul>
        @endif
    </li>
@endforeach

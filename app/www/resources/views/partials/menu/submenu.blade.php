@foreach($menuItemsList as $menuItem)
    <li>
        <a href="{{ is_array($menuItem) && isset($menuItem->page_type) && $menuItem->page_type === 'post' ? route('pages.show', $menuItem->id) : $menuItem->url }}">
            {{ $menuItem->title }}
        </a>
        @if(count($menuItem['children']) > 0)
            <ul>
                @include('partials.menu.menu-item', ['menuItemsList' => $menuItem['children']])
            </ul>
        @endif
    </li>
@endforeach

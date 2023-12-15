@extends('layouts.master')

@section('content')
<div class="container">
    @foreach($menuItems as $menuItem)
        <div>
            {{ $menuItem['item']->title }}

            @if(count($menuItem['children']) > 0)
                <ul>
                    @include('partials.menu.menu-item', ['menuItems' => $menuItem['children']])
                </ul>
            @endif
        </div>
    @endforeach
</div>
@endsection

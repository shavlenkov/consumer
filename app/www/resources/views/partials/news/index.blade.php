@extends('layouts.master')
@section('content')
    <div class="container custom-container posts-container">
        <div class="row">
            <div class="col-12">
                {{ Breadcrumbs::render('news.index', $news) }}

            </div>
            <div class="col-12">
                <div class="news-list posts-list">
                    <div class="post-item">
                        @foreach($news as $newsItem)
                            <h3>
                                <a href="{{ route('news.show', $newsItem->id) }}">
                                    {{ __($newsItem->title) }}
                                </a>
                            </h3>
                            <span class="public-date">
                                @if($newsItem->created_at)
                                {{ $newsItem->created_at->format('d F Y') }}
                                    @endif
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
                  <div class="col-12 links-section">
                <h2 class="home-posts-title">
                    Посилання
                </h2>
                <div class="links-slider">
                    @php
                        $i = 1;
                    @endphp
                    @foreach($links as $link)
                        <div class="link-slide-item">
                            <a href="{{ $link->link }}">
                                <img src="{{ asset('/uploads/'.$link->image) }}" alt="Slide @php echo $i++ @endphp">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <h2>Мапа порталу
                    <button class="btn btn-link open-sitemap" type="button">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                             fill="none">
                            <path d="M19 9.5L12 16.5L5 9.5" stroke="#2D5CA6" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </button>
                </h2>
                <div class="sitemap" id="collapseSiteMap">
                    <div class="row">

                        @foreach($order as $parentId)
                            @php
                                $menu = $menuItemsList->where('id', $parentId)->first();
                            @endphp
                            @if($menu->parent_id === null)
                                <div class="InternalMenu" id="menu-{{ $menu->id }}">
                                    <div class="MenuItem parentItem">
                                        <a href="{{ $menu->page_type === 'post' ? route('pages.show', $menu->id) : $menu->url }}">
                                            {{ $menu->title }}</a></div>
                                    @if($menu->children->isNotEmpty())
                                        <div class="SubMenu">
                                            @foreach($menu->children as $child)
                                                @if($child->children->isNotEmpty())
                                                    <div class="Title subtitle">
                                                        <a id="menu-{{$child->id}}" href="{{  $child->page_type === 'post' ? route('pages.show', $child->id) : $child->url }}">
                                                            {{ $child->title }}
                                                        </a>
                                                        <div class="submenu">
                                                            @foreach($child->children as $subChild)
                                                                <div class="MenuItem">
                                                                    <a href="{{  $subChild->page_type === 'post' ? route('pages.show', $subChild->id) : $subChild->url }}">
                                                                        {{ $subChild->title }}
                                                                    </a>
                                                                </div>
                                                                @if($subChild->children->isNotEmpty())
                                                                    <div class="SubMenu">
                                                                        <div class="submenu">
                                                                            @foreach($subChild->children as $subParentChild)
                                                                                <div class="MenuItem">
                                                                                    <a href="{{  $subParentChild->page_type === 'post' ? route('pages.show', $subParentChild->id) : $subParentChild->url }}">
                                                                                        {{ $subParentChild->title }}
                                                                                    </a>
                                                                                </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                @endif

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="Title"><a href="{{ route('pages.show', $child->id) }}">
                                                            {{ $child->title }}
                                                        </a>
                                                    </div>

                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

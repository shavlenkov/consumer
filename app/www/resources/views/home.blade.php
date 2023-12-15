@extends('layouts.master')

@section('content')
    @php
        use Carbon\Carbon;


    // Create a date object
    $date = Carbon::now();

    // Get the current app locale
    $locale = app()->getLocale();

    // Tell Carbon to use the current app locale
    Carbon::setlocale($locale);
    $format = $locale === 'uk' ? 'd F Y' : 'd F Y';

    @endphp
    <main class="main-content">
        <!-- Main content -->
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="slider-block">
                        <h2 class="home-posts-title">Події</h2>
                        <div class="events-slide home-slider">
                            @foreach(App\Models\Post::events()->get() as $event)
                                @php
                                    $eventDate = $event->created_at->translatedFormat($format);
                                @endphp
                                <div class="event-item">
                                    <div class="event-thumb">
                                        <img class="post-thumb" src="{{ asset('uploads/'.$event->thumbnail) }}" alt="">
                                    </div>
                                    <a href="{{ route('events.show', $event->id) }}">
                                        <h3 class="post-title event-title">
                                            {{ $event->title }}
                                        </h3>
                                    </a>
                                    <span class="public-date">
                                            {{ $eventDate }}
                            </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-block">
                        <h2 class="home-posts-title">Відеосюжети</h2>
                        <div class="videos-slide home-slider">
                            @foreach(App\Models\Post::videostories()->get() as $video)
                                @php
                                    $videoDate = $video->created_at->translatedFormat($format);
                                @endphp
                                <div class="video-item">
                                    <img class="post-thumb" src="{{ asset('uploads/'.$video->thumbnail) }}" alt="">
                                    <a class="post-link" href="{{ route('videos.show',  $video->id) }}">
                                        <h3 class="post-title video-title">
                                            {{ $video->title }}
                                        </h3>
                                    </a>
                                    <span class="public-date">
                                            {{ $videoDate }}
                            </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8 col-12 d-grid posts-grid">
                    <h2 class="home-posts-title announcement-title">Анонси</h2>
                    <h2 class="home-posts-title news-title">Новини</h2>
                    <style>

                    </style>
                    @php

                        use App\Models\Post;

                        $announcements = Post::announcements()->paginate(5);
                        $news = Post::news()->paginate(5);

                        $posts = $announcements->concat($news);
                        $newOrder = [];
                        for ($i = 0; $i < count($posts) / 2; $i++) {
                            $newOrder[] = $posts[$i];                     // Додаємо announcement
                            $newOrder[] = $posts[$i + count($posts) / 2];  // Додаємо news
                        }

                    @endphp
                    @foreach ($posts as $post)
                        @php
                            $postDate = $post->created_at->translatedFormat($format);
                        @endphp
                        <div class="post-item {{ strtolower($post['type']) }}-item">
                            @if($post->category->title == "Новини")
                                <a class="post-link"
                                   href="{{ route('news.show', __($post->slug)) }}">
                                    @else
                                        <a class="post-link" href="{{ route('announcements.show', ['locale' => app()->getLocale(), 'id' => $post->id]) }}">
                                            @endif
                                            {{ __($post->title) }}
                                        </a>
                                        <span class="post-public-date">
                                @if($post->created_at)
                                                {{ $postDate }}
                                            @endif
        </span>
                        </div>
                    @endforeach

                    <div class="read-more read-announcement d-flex align-items-start justify-content-end">
                        <a href="{{ route('announcements.index', app()->getLocale()) }}" class="read-more-link">Усі анонси</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <g clip-path="url(#clip0_181_4970)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.125 9C1.125 11.0886 1.95468 13.0916 3.43153 14.5685C4.90838 16.0453 6.91142 16.875 9 16.875C11.0886 16.875 13.0916 16.0453 14.5685 14.5685C16.0453 13.0916 16.875 11.0886 16.875 9C16.875 6.91142 16.0453 4.90838 14.5685 3.43153C13.0916 1.95468 11.0886 1.125 9 1.125C6.91142 1.125 4.90838 1.95468 3.43153 3.43153C1.95468 4.90838 1.125 6.91142 1.125 9ZM18 9C18 11.3869 17.0518 13.6761 15.364 15.364C13.6761 17.0518 11.3869 18 9 18C6.61305 18 4.32387 17.0518 2.63604 15.364C0.948212 13.6761 0 11.3869 0 9C0 6.61305 0.948212 4.32387 2.63604 2.63604C4.32387 0.948212 6.61305 0 9 0C11.3869 0 13.6761 0.948212 15.364 2.63604C17.0518 4.32387 18 6.61305 18 9ZM5.0625 8.4375C4.91332 8.4375 4.77024 8.49676 4.66475 8.60225C4.55926 8.70774 4.5 8.85082 4.5 9C4.5 9.14918 4.55926 9.29226 4.66475 9.39775C4.77024 9.50324 4.91332 9.5625 5.0625 9.5625H11.5796L9.16425 11.9767C9.11195 12.029 9.07047 12.0911 9.04216 12.1595C9.01386 12.2278 8.99929 12.301 8.99929 12.375C8.99929 12.449 9.01386 12.5222 9.04216 12.5905C9.07047 12.6589 9.11195 12.721 9.16425 12.7733C9.21655 12.8255 9.27864 12.867 9.34697 12.8953C9.4153 12.9236 9.48854 12.9382 9.5625 12.9382C9.63646 12.9382 9.7097 12.9236 9.77803 12.8953C9.84636 12.867 9.90845 12.8255 9.96075 12.7733L13.3358 9.39825C13.3881 9.346 13.4297 9.28393 13.4581 9.21559C13.4864 9.14725 13.501 9.07399 13.501 9C13.501 8.92601 13.4864 8.85275 13.4581 8.78441C13.4297 8.71607 13.3881 8.654 13.3358 8.60175L9.96075 5.22675C9.90845 5.17445 9.84636 5.13297 9.77803 5.10466C9.7097 5.07636 9.63646 5.06179 9.5625 5.06179C9.48854 5.06179 9.4153 5.07636 9.34697 5.10466C9.27864 5.13297 9.21655 5.17445 9.16425 5.22675C9.11195 5.27905 9.07047 5.34114 9.04216 5.40947C9.01386 5.4778 8.99929 5.55104 8.99929 5.625C8.99929 5.69896 9.01386 5.7722 9.04216 5.84053C9.07047 5.90886 9.11195 5.97095 9.16425 6.02325L11.5796 8.4375H5.0625Z"
                                      fill="#2D5CA6"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_181_4970">
                                    <rect width="18" height="18" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>

                    <div class="read-more read-news d-flex align-items-start justify-content-end">
                        <a href="{{ route('news.index',app()->getLocale()) }}" class="read-more-link">Усі новини</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <g clip-path="url(#clip0_181_4970)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.125 9C1.125 11.0886 1.95468 13.0916 3.43153 14.5685C4.90838 16.0453 6.91142 16.875 9 16.875C11.0886 16.875 13.0916 16.0453 14.5685 14.5685C16.0453 13.0916 16.875 11.0886 16.875 9C16.875 6.91142 16.0453 4.90838 14.5685 3.43153C13.0916 1.95468 11.0886 1.125 9 1.125C6.91142 1.125 4.90838 1.95468 3.43153 3.43153C1.95468 4.90838 1.125 6.91142 1.125 9ZM18 9C18 11.3869 17.0518 13.6761 15.364 15.364C13.6761 17.0518 11.3869 18 9 18C6.61305 18 4.32387 17.0518 2.63604 15.364C0.948212 13.6761 0 11.3869 0 9C0 6.61305 0.948212 4.32387 2.63604 2.63604C4.32387 0.948212 6.61305 0 9 0C11.3869 0 13.6761 0.948212 15.364 2.63604C17.0518 4.32387 18 6.61305 18 9ZM5.0625 8.4375C4.91332 8.4375 4.77024 8.49676 4.66475 8.60225C4.55926 8.70774 4.5 8.85082 4.5 9C4.5 9.14918 4.55926 9.29226 4.66475 9.39775C4.77024 9.50324 4.91332 9.5625 5.0625 9.5625H11.5796L9.16425 11.9767C9.11195 12.029 9.07047 12.0911 9.04216 12.1595C9.01386 12.2278 8.99929 12.301 8.99929 12.375C8.99929 12.449 9.01386 12.5222 9.04216 12.5905C9.07047 12.6589 9.11195 12.721 9.16425 12.7733C9.21655 12.8255 9.27864 12.867 9.34697 12.8953C9.4153 12.9236 9.48854 12.9382 9.5625 12.9382C9.63646 12.9382 9.7097 12.9236 9.77803 12.8953C9.84636 12.867 9.90845 12.8255 9.96075 12.7733L13.3358 9.39825C13.3881 9.346 13.4297 9.28393 13.4581 9.21559C13.4864 9.14725 13.501 9.07399 13.501 9C13.501 8.92601 13.4864 8.85275 13.4581 8.78441C13.4297 8.71607 13.3881 8.654 13.3358 8.60175L9.96075 5.22675C9.90845 5.17445 9.84636 5.13297 9.77803 5.10466C9.7097 5.07636 9.63646 5.06179 9.5625 5.06179C9.48854 5.06179 9.4153 5.07636 9.34697 5.10466C9.27864 5.13297 9.21655 5.17445 9.16425 5.22675C9.11195 5.27905 9.07047 5.34114 9.04216 5.40947C9.01386 5.4778 8.99929 5.55104 8.99929 5.625C8.99929 5.69896 9.01386 5.7722 9.04216 5.84053C9.07047 5.90886 9.11195 5.97095 9.16425 6.02325L11.5796 8.4375H5.0625Z"
                                      fill="#2D5CA6"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_181_4970">
                                    <rect width="18" height="18" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
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
                    <div class="sitemap" id="collapseSiteMap" style="display: none">
                            @foreach($order as $parentId)
                                @php
                                    $menu = $menuItems->where('id', $parentId)->first();
                                @endphp
                                @if($menu->parent_id === null)
                                <div class="InternalMenu" id="menu-{{ $menu->id }}">
                                    <div class="MenuItem parentItem"><a href="{{ route('pages.show', $menu->id) }}">{{ $menu->title }}</a></div>
                                    @if($menu->children->isNotEmpty())
                                        <div class="SubMenu">
                                            @foreach($menu->children as $child)
                                                @if($child->children->isNotEmpty())
                                                    <div class="Title subtitle">
                                                        <a href="{{ route('pages.show', $child->id) }}">
                                                        {{ $child->title }}
                                                        </a>
                                                        <div class="submenu">
                                                            @foreach($child->children as $subChild)
                                                                <div class="MenuItem">
                                                                    <a href="{{ route('pages.show', $subChild->id) }}">
                                                                    {{ $subChild->title }}
                                                                    </a>
                                                                </div>
                                                                @if($subChild->children->isNotEmpty())
                                                                <div class="SubMenu">
                                                                    <div class="submenu">
                                                                        @foreach($subChild->children as $subParentChild)

                                                                        <div class="MenuItem">
                                                                            <a href="{{ route('pages.show', $subParentChild->id) }}">
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
        </div>
        <!-- /.content -->
    </main>
@endsection



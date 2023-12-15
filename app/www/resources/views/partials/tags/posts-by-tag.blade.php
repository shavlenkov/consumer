@extends('layouts.master')

@section('content')
    <main>
        <div class="container custom-container post-container">
            <div class="row">
                <div class="col-12">
                    {{ Breadcrumbs::render('tag.show', $tag) }}

                </div>
                <h2>{{ $tag->name }}</h2>
                @if($news && $news->count() > 0)
                    <div class="col-12">
                        <h3>Новини</h3>
                        <ul class="tags-list news-tags">
                            @foreach($news as $post)
                                @dd($news)
                                <li id="news-tag">
                                    <a href="{{ route('news.show', __($post->slug)) }}">
                                        {{ __($post->title) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                @endif


            @if($videos && $videos->count() > 0)

                <h3>Videos</h3>
                @foreach($videos as $post)
                    <p>{{ $post->title }}</p>
                @endforeach
            @endif

            @if($events && $events->count() > 0)

                <h3>Events</h3>
                @foreach($events as $post)
                    <p>{{ $post->title }}</p>
                @endforeach
            @endif

            @if($announcements && $announcements->count() > 0)

                <h3>Events</h3>
                @foreach($announcements as $post)
                    <p>{{ $post->title }}</p>
                @endforeach
            @endif
        </div>
        </div>
    </main>
@endsection

@extends('layouts.master')

@section('content')
    <div class="container custom-container">

        @if(isset($results['news']) && count($results['news']) > 0)
            <h2>Новини:</h2>

            <ul>
                @foreach ($results['news'] as $post)
                    <li>
                        <a href="{{ route('news.show', __($post->slug)) }}">
                        {{ __($post->title) }}
                        </a>
                    </li>
                @endforeach
            </ul>

        @endif
            @if(isset($results['video']) && count($results['video']) > 0)
                <h2>Відео:</h2>

                <ul>
                    @foreach ($results['video'] as $post)
                        <li>
                            <a href="{{ route('videos.show', $post->id) }}">
                                {{ __($post->title) }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            @endif
        @if(isset($results['events']) && count($results['events']) > 0)
                <h2>Події:</h2>

                <ul>
                @foreach ($results['events'] as $post)
                    <li>{{ $post->title }}</li>
                @endforeach
            </ul>

        @endif

            @if(isset($results['announcement']) && count($results['announcement']) > 0)
                <h2>Анонси:</h2>

                <ul>
                    @foreach ($results['announcement'] as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>

            @endif
    </div>
@endsection

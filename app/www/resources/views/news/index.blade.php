<!-- resources/views/news/index.blade.php -->

@extends('layouts.master')

@section('content')
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Slug</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($news as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

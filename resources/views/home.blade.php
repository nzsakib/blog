@extends('layouts.layout')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
        @endforeach
    </div>
@endsection
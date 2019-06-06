@extends('layouts.layout')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <h1>{{ $post->title }}</h1>
        @endforeach
    </div>
@endsection
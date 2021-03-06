@extends('layouts.layout')

@section('content')
    <div class="container">
        <br><br><br><br>
        <h1>Create a new post: </h1>
        <form action="/post" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="body">Detailed description: </label>
                {{-- <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea> --}}
                <editor></editor>
            </div>

            <button type="submit" class="btn btn-primary">Publish Post</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@endsection

@section('extraJS')
    <script>
        // var simplemde = new SimpleMDE();
    </script>
@endsection
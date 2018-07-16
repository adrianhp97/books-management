@extends('layouts.app')

@section('title')
Detail {{ $book->name }}
@endsection

@section('content')
<div class="jumbotron text-center">
    <h2>{{ $book->title }}</h2>
    <p>
        <strong>Title:</strong> {{ $book->title }}<br>
        <strong>Author:</strong> {{ $book->author }}
        <strong>ISBN:</strong> {{ $book->isbn }}<br>
        <strong>Published:</strong> {{ $book->published }}
    </p>
</div>
@endsection
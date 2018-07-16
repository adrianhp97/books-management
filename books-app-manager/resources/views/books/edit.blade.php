@extends('layouts.app')

@section('title')
Edit {{ $book->name }}
@endsection

@section('content')
{{ HTML::ul($errors->all()) }}

{{ Form::model($book, array('route' => array('book.update', $book->uuid), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('isbn', 'ISBN') }}
        {{ Form::text('isbn', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('published', 'Published') }}
        {{ Form::text('published', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Book!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
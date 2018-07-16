@extends('layouts.app')

@section('title', 'Create Books')

@section('content')
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => '/')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author', old('author'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('isbn', 'ISBN') }}
        {{ Form::text('isbn', old('isbn'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('published', 'Published') }}
        {{ Form::text('published', old('published'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the Book!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
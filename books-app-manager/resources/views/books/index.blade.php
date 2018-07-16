@extends('layouts.app')

@section('title', 'All Books')

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ISBN</td>
            <td>Title</td>
            <td>Author</td>
            <td>Published</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $key => $value)
        <tr>
            <td>{{ $value->isbn }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->author }}</td>
            <td>{{ $value->published }}</td>

            <td>
                {{ Form::model($value, array('route' => array('book.delete', $value->uuid), 'method' => 'DELETE')) }}
                    {{ Form::submit('Delete this Book', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <a class="btn btn-small btn-success" href="{{ URL::to('/' . $value->title . '-' . $value->uuid) }}">Show this book</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('/' . $value->uuid . '/edit') }}">Edit this book</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
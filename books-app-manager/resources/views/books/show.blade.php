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
        {{ Form::model($book, array('route' => array('book.delete', $book->uuid), 'method' => 'DELETE')) }}
            {{ Form::submit('Delete this Book', array('class' => 'btn btn-warning delete')) }}
        {{ Form::close() }}
        <a class="btn btn-small btn-info" href="{{ URL::to('/' . $book->uuid . '/edit') }}">Edit this book</a>

    </p>
</div>
@endsection

@section('script')
<script>
    $('.delete').on('click', function(event){
        event.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this book!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $(this).closest("form").submit();
            }
        });
    })
</script>
@endsection
@extends('layouts.app')

@section('title', 'All Books')

@section('content')
<div class="row">
    @foreach($books as $key => $value)
    <div class="col-sm-4 book-card">
        <a href="{{ URL::to('/' . $value->title . '-' . $value->uuid) }}">
            <div class="card">
                <div class="card-body">{{ $value->title }}</div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
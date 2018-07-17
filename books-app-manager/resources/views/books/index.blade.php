@extends('layouts.app')

@section('title', 'All Books')

@section('content')
<div class="row">
    @if (!empty($books))
        @foreach($books as $key => $value)
        <div class="col-sm-4 book-card">
            <a href="{{ URL::to('/' . $value->title . '-' . substr($value->uuid, -6)) }}">
                <div class="card">
                    <div class="card-body">{{ $value->title }}</div>
                </div>
            </a>
        </div>
        @endforeach
    @else
        <div>There are no books</div>
    @endif
</div>
@endsection
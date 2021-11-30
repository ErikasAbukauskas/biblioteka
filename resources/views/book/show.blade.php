@extends('layouts.app')

@section('content')

<div class="container">

    <h2>{{$book->title}}</h2>
    <h2>{{$book->isbn}}</h2>
    <h2>{{$book->pages}}</h2>
    <p>{!! $book->about !!}</p>
    <h2>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</h2>

</div>

@endsection

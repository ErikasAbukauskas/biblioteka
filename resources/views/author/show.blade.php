@extends('layouts.app')

@section('content')

<div class="container">

    <h2>{{$author->name}}</h2>
    <h2>{{$author->surname}}</h2>

        <table>
            <tr>
                <td>Title</td>
                <td>ISBN</td>
            </tr>

            @foreach($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->isbn}}</td>
            </tr>
            @endforeach

        </table>

</div>

@endsection

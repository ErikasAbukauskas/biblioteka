@extends('layouts.app')

@section('content')
<div class="container">

    <form method="GET" action="{{route('book.index')}}">

        @csrf

        <select name="bookTitle">
            <option value="">Visi</option>
            @foreach ($filterBooks as $book)

            <option value="{{$book->title}}">{{$book->title}}</option>

            @endforeach

        </select>

        <button type="submit" class="btn btn-secondary">Filter</button>

    </form>

    <form method="GET" action="{{route('book.index')}}">

        @csrf

        <select name="bookAuthor">
            <option value="">Visi</option>
            @foreach ($authors as $author)

                <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>

            @endforeach

        </select>

        <button type="submit" class="btn btn-secondary">Filter</button>

    </form>

    <a href="{{route('book.index')}}" class="btn btn-primary">Clear Filter</a>

    <a href="{{route('book.create')}}" class="btn btn-primary">Create Book</a>

    <a href="{{route('book.generateStatisticsPdf')}}" class="btn btn-secondary">
        Export statistics
    </a>

    <table class="table table-striped">

        <tr>
            <th> @sortablelink('id', 'ID') </th>
            <th> @sortablelink('title', 'Title') </th>
            <th> @sortablelink('isbn', 'ISBN') </th>
            <th> @sortablelink('pages', 'Pages') </th>
            <th> @sortablelink('about', 'About') </th>
            <th> @sortablelink('author_id', 'Author') </th>
            <th> Actions </th>
        </tr>

        @foreach ($books as $book)

            <tr>

                <td> {{$book->id}} </td>
                <td> {{$book->title}} </td>
                <td> {{$book->isbn}} </td>
                <td> {{$book->pages}} </td>
                <td> {!! $book->about !!} </td>
                <td> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}} </td>

                <td>
                    <a href="{{route('book.edit', [$book])}}" class="btn btn-secondary"> Edit </a>
                    <a href="{{route('book.show', [$book])}}" class="btn btn-primary"> Show </a>

                    <form method="post" action="{{route('book.destroy', [$book])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                </td>

            </tr>

        @endforeach

    </table>
    {!! $books->appends(Request::except('pages'))->render()!!}
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('author.create')}}" class="btn btn-primary">Create Author</a>

    <table class="table table-striped">

        <tr>
            <th> @sortablelink('id', 'ID') </th>
            <th> @sortablelink('name', 'Name') </th>
            <th> @sortablelink('surname', 'Surname') </th>
            <th> Actions </th>
        </tr>

        @foreach ($authors as $author)

            <tr>
                <td> {{$author->id}} </td>
                <td> {{$author->name}} </td>
                <td> {{$author->surname}} </td>
                <td>
                    <a href="{{route('author.edit', [$author])}}" class="btn btn-secondary"> Edit </a>
                    <a href="{{route('author.show', [$author])}}" class="btn btn-primary"> Show </a>

                    <form method="post" action="{{route('author.destroy', [$author])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                </td>

            </tr>

        @endforeach

    </table>
    {!! $authors->appends(Request::except('pages'))->render()!!}
</div>

@endsection

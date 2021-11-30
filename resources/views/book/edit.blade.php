@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('book.update', [$book]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="bookTitle" class="col-md-4 col-form-label text-md-right">{{ __(' Book Title') }}</label>

                            <div class="col-md-6">
                                <input id="bookTitle" type="text" class="form-control" name="bookTitle" value="{{$book->title}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bookIsbn" class="col-md-4 col-form-label text-md-right">{{ __(' ISBN') }}</label>

                            <div class="col-md-6">
                                <input id="bookIsbn" type="text" class="form-control" name="bookIsbn" value="{{$book->isbn}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bookPages" class="col-md-4 col-form-label text-md-right">{{ __(' Pages') }}</label>

                            <div class="col-md-6">
                                <input id="bookPages" type="text" class="form-control" name="bookPages" value="{{$book->pages}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bookAbout" class="col-md-4 col-form-label text-md-right">{{ __(' About') }}</label>

                            <div class="col-md-6">
                               <textarea class="summernote" name="bookAbout">
                                    {{$book->about}}"
                               </textarea>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="bookAuthor" class="col-md-4 col-form-label text-md-right">{{ __(' Author') }}</label>

                                <div class="col-md-6">

                                    <select name="bookAuthor" class="form-control">

                                        @foreach ($authors as $author)

                                            <option value="{{$author->id}}" @if ($author->id == $book->author_id) selected @endif> {{$author->name}} {{$author->surname}}</option>

                                        @endforeach

                                    </select>

                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.summernote').summernote();
    });
</script>

@endsection

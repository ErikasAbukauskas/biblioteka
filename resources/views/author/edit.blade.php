@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Author') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('author.update', [$author]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="authorName" class="col-md-4 col-form-label text-md-right">{{ __(' Author Name') }}</label>

                            <div class="col-md-6">
                                <input id="authorName" type="text" class="form-control" name="authorName"  value="{{$author->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="authorSurname" class="col-md-4 col-form-label text-md-right">{{ __(' Author Surname') }}</label>

                            <div class="col-md-6">
                                <input id="authorSurname" type="text" class="form-control" name="authorSurname"  value="{{$author->surname}}" required autofocus>
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

@endsection

@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>


                    {{--                <a href="{{ route('admin.categories.index') }}">asdfasdf </a>--}}
                    <div class="card-body">
                        {{--                        <ul class="list-group">--}}
                        {{--                            <a href="#" class="list-group-item active">Категории</a>--}}
                        {{--                            <a href="#" class="list-group-item">Посты</a>--}}
                        {{--                            <li>Посты</li>--}}
                        {{--                        </ul>--}}
                        <ul class="list-group">
                            <li class="list-group-item"><a>Категория 1</a></li>
                            <li class="list-group-item"><a>Категория 2</a></li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>

        {{--            <a href="{{route('admin.categories.index')}}">Select Category</a>--}}

        {{--        @include('admin.includes.categoriesHome')--}}
    </div>

@endsection

@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('categories') }}
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>
                    <a href="{{route('categories.create')}}" class="btn btn-primary">Добавить категорию</a>
                    <div class="card-body">
                        <ul class="list-group">
                                @foreach($categories as $category)
                                <li class="list-group-item"><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    {{$categories->links()}}
                </div>

            </div>
        </div>

        {{--            <a href="{{route('admin.categories.index')}}">Select Category</a>--}}

        {{--        @include('admin.includes.categoriesHome')--}}
    </div>

@endsection

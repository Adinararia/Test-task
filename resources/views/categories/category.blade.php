@extends('layouts.app')

@php /** @var \App\Http\Controllers\CategoryController */ @endphp

@section('title', $category->name)

@section('content')


    <div class="container">
        {{ Breadcrumbs::render('category', $category) }}
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$category->name}}</div>
                    <div class="card-body">
                       @if(!$products->isEmpty())
                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <a href="{{route('categories.show', $product->id)}}">{{$product->name}}</a>
                                    <span>{{$product->description}}</span>
                                    <div class="badge bg-primary">
                                        <a href="{{route('categories.edit', $product->id)}}" class="btn btn-primary">Изменить</a>
                                        <a href="{{route('categories.destroy', $product->id)}}" class="text-right btn btn-primary">Удалить</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        @else
                            <span>  Постов в этой категории нет </span>
                        @endif
                    </div>
                    {{--Доделать пагинацию--}}
{{--                    @if(!$products->isEmpty())--}}
                    {{--                    {{$categories->links()}}--}}
{{--                    @endif--}}
                </div>

            </div>
        </div>
    </div>



@endsection

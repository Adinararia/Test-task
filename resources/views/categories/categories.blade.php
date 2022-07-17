@extends('layouts.app')
@section('title', __('dictionary.categories'))

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
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
                                    <div class="badge bg-primary">
                                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Изменить</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Удалить</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{$categories->links()}}
                </div>

            </div>
        </div>
    </div>

@endsection

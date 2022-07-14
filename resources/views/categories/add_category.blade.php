@extends('layouts.app')
@section('title', 'Добавить категорию')

@section('content')
    <div class="container">
        {{Breadcrumbs::render('categories.create')}}
        <div class="row justify-content-center">
            <div class="col-md-8">
    <form method="POST" action="{{route('categories.store')}}">
        @csrf
        <div class="form-group">
            <label for="inputCategory">Категория</label>
            <input type="text" class="form-control" id="inputCategory" name="nameCategory" aria-describedby="emailHelp" placeholder="Введите категорию">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
            </div>
        </div>
    </div>
@endsection

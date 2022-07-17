@extends('layouts.app')
@section('title', 'Редактировать категорию')

@section('content')
    <div class="container">
        {{Breadcrumbs::render('category.edit', $category)}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{route('categories.update', $category->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group needs-validation">
                        <label for="inputCategory">Название категории</label>
                        <input type="text" class="form-control @error('nameCategory') is-invalid @enderror" id="inputCategory" name="nameCategory" value="{{ $category->name }}" aria-describedby="nameCategoryFeedback" placeholder="Введите категорию">
                            @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div id="nameCategoryFeedback" class="invalid-feedback">{{$error}}</div>
                            @endforeach
                            @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

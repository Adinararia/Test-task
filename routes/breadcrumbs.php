<?php
// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('dictionary.home'), route('home'));
});

// categories
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('dictionary.categories'), route('categories.index'));
});

// Home > Categories > add category
Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push(trans('dictionary.add_category'), route('categories.create'));
});

// Home > Ctagories > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories');
    $trail->push($category->name, route('categories.show', $category->id));
});

Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories');
    $trail->push('Изменить ' . $category->name, route('categories.edit', $category->id));
});


//
//Breadcrumbs::for('category', function (BreadcrumbTrail $trail, \App\Models\Category $category) {
//    $trail->parent('categories');
//    $trail->push($category->name, route('categories.show', $category->id));
//});
//
//Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail, $category) {
//    $trail->parent('home');
//    $trail->parent('categories');
//    $trail->push($category->title, route('category', $category));
//});

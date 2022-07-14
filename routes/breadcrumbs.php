<?php
// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/*!!!!!!!
 *
 * Локальный словарь, не хотел создавать полную структуру перевода для пару слов.
 * Глобальная структура с лэнговыми переменными была бы через структуру resources/lang/{en}/{en}.json
 *
 * !!!!!!
 */

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $lang['home'] = 'Главная';
    $trail->push($lang['home'], route('home'));
});

// categories
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $lang['categories'] = 'Категории';
    $trail->parent('home');
    $trail->push($lang['categories'], route('categories.index'));
});

// Home > Blog > [Category]
Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $lang['add_category'] = 'Создание категории';
    $trail->parent('categories');
    $trail->push($lang['add_category'], route('categories.create'));
});


//
//Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail, $category) {
//    $trail->parent('home');
//    $trail->parent('categories');
//    $trail->push($category->title, route('category', $category));
//});

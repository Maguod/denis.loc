<?php

use App\Entity\Category\Category;
use App\Entity\User;
use \App\Entity\Uploader;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs ;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;



Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push('Главная', route('home'));
});
Breadcrumbs::register('public.main.index', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Рубрики автозапчастей', route('public.main.index'));
});
Breadcrumbs::register('public.contacts', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Наши контакты', route('public.contacts'));
});
Breadcrumbs::register('public.main.show', function (Crumbs $crumbs, $slug) {
    $crumbs->parent('public.main.index');
    $crumbs->push($slug, route('public.main.show', $slug));
});
Breadcrumbs::register('public.main.createOldMains', function (Crumbs $crumbs) {
    $crumbs->parent('public.main.index');
    $crumbs->push('Старые', route('public.main.createOldMains'));
});
Breadcrumbs::register('public.seller.index', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Производители', route('public.seller.index'));
});
Breadcrumbs::register('public.seller.show', function (Crumbs $crumbs, $slug) {
    $crumbs->parent('public.seller.index');
    $crumbs->push($slug, route('public.seller.show', $slug));
});
Breadcrumbs::register('public.category.index', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Группа товаров', route('public.category.index'));
});
Breadcrumbs::register('public.category.show', function (Crumbs $crumbs, $slug) {
    $crumbs->parent('public.category.index');
    $crumbs->push($slug, route('public.category.show', $slug));
});
Breadcrumbs::register('public.product.index', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Товары', route('public.product.index'));
});
Breadcrumbs::register('public.product.show', function (Crumbs $crumbs, $slug) {
    $crumbs->parent('public.product.index');
    $crumbs->push( $slug, route('public.product.show', $slug));
});

Breadcrumbs::register('register', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Register', route('register'));
});
Breadcrumbs::register('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Login', route('login'));
});
Breadcrumbs::register('password.request', function (Crumbs $crumbs) {
    $crumbs->parent('login');
    $crumbs->push('Reset Password', route('password.request'));
});
Breadcrumbs::register('password.reset', function (Crumbs $crumbs) {
    $crumbs->parent('password.request');
    $crumbs->push('Change', route('password.reset'));
});

Breadcrumbs::register('cabinet', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Cabinet', route('cabinet'));
});

// Admin

Breadcrumbs::register('admin.home', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Админка главная', route('admin.home'));
});

// Users

Breadcrumbs::register('admin.users.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Пользователи', route('admin.users.index'));
});
Breadcrumbs::register('admin.margins.edit', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Наценка', route('admin.margins.edit'));
});
Breadcrumbs::register('admin.users.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push('Создать пользователя', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.show', $user));
});

Breadcrumbs::register('admin.users.edit', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.show', $user);
    $crumbs->push('Редактировать пользователя', route('admin.users.edit', $user));
});

/*---------------Excel--------------*/

Breadcrumbs::register('admin.excel.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('excel', route('admin.excel.index'));
});
//Breadcrumbs::register('admin.excel.destroy', function (Crumbs $crumbs, \App\Entity\Excel\Excel $exc) {
//    $crumbs->parent('admin.home');
//    $crumbs->push('excel', route('admin.excel.destroy'));
//});

/*---------------Categories--------------*/

Breadcrumbs::register('admin.category.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Все категории', route('admin.category.index'));
});
Breadcrumbs::register('admin.category.findNoMain', function (Crumbs $crumbs) {
    $crumbs->parent('admin.category.index');
    $crumbs->push('Категории без рубрики', route('admin.category.findNoMain'));
});
Breadcrumbs::register('admin.category.edit', function (Crumbs $crumbs, $cat) {
    $crumbs->parent('admin.category.index');
    $crumbs->push('Редактировать категорию', route('admin.category.edit', $cat));
});
Breadcrumbs::register('admin.category.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.category.index');
    $crumbs->push('Создать категорию', route('admin.category.create'));
});
Breadcrumbs::register('admin.category.main', function (Crumbs $crumbs, $id) {
    $crumbs->parent('admin.category.index');
    $crumbs->push('Дерево подкатегорий', route('admin.category.main', $id));
});
Breadcrumbs::register('admin.category.search', function (Crumbs $crumbs) {
    $crumbs->parent('admin.category.index');
    $crumbs->push('Поиск по категорий', route('admin.category.search'));
});
/*---------------Products--------------*/
Breadcrumbs::register('admin.products.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Все товары', route('admin.products.index'));
});
Breadcrumbs::register('admin.products.show', function (Crumbs $crumbs, $id) {
    $crumbs->parent('admin.products.index');
    $crumbs->push('Товары в прайсе', route('admin.products.show', $id));
});
/*==================Прайс т.е. Uploader+++++++++++++*/
Breadcrumbs::register('admin.uploader.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Все товары', route('admin.uploader.index'));
});
Breadcrumbs::register('admin.uploader.edit', function (Crumbs $crumbs, Uploader $uploader) {
    $crumbs->parent('admin.uploader.index');
    $crumbs->push('Редактивать товар', route('admin.uploader.edit', $uploader));
});
//Breadcrumbs::register('admin.products.searchForm', function (Crumbs $crumbs) {
//    $crumbs->parent('admin.products.index');
//    $crumbs->push('Поиск', route('admin.products.searchForm'));
//});
Breadcrumbs::register('admin.uploader.search', function (Crumbs $crumbs) {
    $crumbs->parent('admin.uploader.index');
    $crumbs->push('Поиск по товарам', route('admin.uploader.search'));
});
/*---------------Uploader-----------------*/
//Breadcrumbs::register('admin.uploader.index', function (Crumbs $crumbs) {
//    $crumbs->parent('admin.home');
//    $crumbs->push('main', route('admin.main.index'));
//});
/*---------------MainCategories-----------------*/
//
Breadcrumbs::register('admin.main.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Рубрики сайта', route('admin.main.index'));
});
Breadcrumbs::register('admin.main.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.main.index');
    $crumbs->push('Создать рубрику', route('admin.main.create'));
});

// Breadcrumbs::register('admin.main.show', function (Crumbs $crumbs, $id) {
//     $crumbs->parent('admin.main.index');
//     $crumbs->push('Рубрика сайта', route('admin.main.show', $id));
// });

// Breadcrumbs::register('admin.main.edit', function (Crumbs $crumbs,\App\Entity\MainCategory $main) {
//     $crumbs->parent('admin.main.show', $main);
//     $crumbs->push('Редактор рубрики', route('admin.main.edit', $main));
// });
Breadcrumbs::register('admin.main.show', function (Crumbs $crumbs, $id) {
    $crumbs->parent('admin.main.index');
    $crumbs->push('Рубрика - ' .$id, route('admin.main.show', $id));
});

Breadcrumbs::register('admin.main.edit', function (Crumbs $crumbs,\App\Entity\MainCategory $main) {
    $crumbs->parent('admin.main.show', $main->id);
    $crumbs->push('Редактор рубрики', route('admin.main.edit', $main));
});

/*=============Seller===============*/
Breadcrumbs::register('admin.seller.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Все производители', route('admin.seller.index'));
});
Breadcrumbs::register('admin.seller.edit', function (Crumbs $crumbs, $id) {
    $crumbs->parent('admin.seller.index');
    $crumbs->push('Редактировать производителя', route('admin.seller.edit',$id));
});
Breadcrumbs::register('admin.xml.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Данные для импорта', route('admin.xml.index'));
});
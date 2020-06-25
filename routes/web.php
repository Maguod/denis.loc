<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

 Route::get('/', 'HomeController@index')->name('home');
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');
//Route::get('/categories', 'HomeController@categories')->name('public.categories');
Route::get('/category', 'CategoriesController@index')->name('public.category.index');
Route::get('/category/show/{slug}', 'CategoriesController@show')->name('public.category.show');
Route::get('/product', 'ProductsController@index')->name('public.product.index');
Route::get('/product/show/{slug}', 'ProductsController@show')->name('public.product.show');
Route::post('/public.product.send{id}', 'ProductsController@send')->name('public.product.send');
Route::post('/public.send', 'HomeController@send')->name('public.send');
Route::post('/public.vinSearch', 'HomeController@vinSearch')->name('public.vinSearch');
Route::get('/seller', 'SellersController@index')->name('public.seller.index');
Route::get('/seller/show/{slug}', 'SellersController@show')->name('public.seller.show');
Route::get('/main', 'MainsController@index')->name('public.main.index');
Route::get('/main/show/{slug}', 'MainsController@show')->name('public.main.show');
Route::get('/contacts', 'HomeController@contacts')->name('public.contacts');
//Route::get('/pay{id}', 'HomeController@pay')->name('public.pay');

Auth::routes();
Route::group([
    'middleware' => ['auth', 'can:admin-panel']
],
    function() {
//Clear Cache facade value:
        Route::get('/clear-cache', function () {
            $exitCode = Artisan::call('cache:clear');
            return '<h1>Cache facade value cleared</h1>';
        });

//Reoptimized class loader:
         Route::get('/optimize', function () {
            Artisan::call('optimize:clear');
            return '<h1>Reoptimized class loader</h1>';
        });

//Route cache:
        Route::get('/route-cache', function () {
            $exitCode = Artisan::call('route:cache');
            return '<h1>Routes cached</h1>';
        });


//Clear View cache:
        Route::get('/view-clear', function () {
            $exitCode = Artisan::call('view:clear');
            return '<h1>View cache cleared</h1>';
        });

//Clear Config cache:
        Route::get('/config-cache', function () {
            $exitCode = Artisan::call('config:cache');
            return '<h1>Clear Config cleared</h1>';
        });
        Route::get('/clear', function() {
             try {
                Artisan::call('config:clear');
                Artisan::call('route:clear');
            } catch (Exception $e) {
                echo 'Поймано исключение: ',  $e->getMessage(), "\n";
            }

            return "Кэш очищен.";
        });

    }
);
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as'   => 'admin.',
    'middleware' => ['auth', 'can:admin-panel']
],
    function() {
        Route::get('/', 'AdminController@index')->name('home');
        Route::get('/margin-price', 'PriceMarginController@priceWithMargin')->name('margin.price');
        Route::resource('users', 'UsersController');
        Route::get('/margins/edit', 'MarginsController@edit')->name('margins.edit');
        Route::post('/margins/store', 'MarginsController@store')->name('margins.store');
        Route::PATCH('/margin/update/{id}', 'MarginsController@update')->name('margin.update');

        Route::post('/users/{user}/verify', 'UsersController@verify')->name('users.verify');
        /*=============    Excel         ++++++++++++++*/
        Route::get('/excel/index', 'ExcelController@index')->name('excel.index');
        Route::post('/excel/store', 'ExcelController@store')->name('excel.store');
        Route::delete('/excel/destroy/{excel}', 'ExcelController@destroy')->name('excel.destroy');
        /*=============    Categories         ++++++++++++++*/
        Route::post('/category/add', 'CategoriesController@add')->name('category.add');
        Route::resource('category', 'CategoriesController');
        Route::post('category.findNoMain', 'CategoriesController@findNoMain')->name('category.findNoMain');
        Route::get('category.search', 'CategoriesController@search')->name('category.search');
        Route::get('category.createOldCategories', 'CategoriesController@createOldCategories')->name('category.createOldCategories');
        Route::get('category.createMainToCategories', 'CategoriesController@createMainToCategories')->name('category.createMainToCategories');
//        Route::post('category.main.store{id}', 'CategoriesController@main')->name('category.main.store');
        /*=============    Uploader         ++++++++++++++*/
        Route::post('/uploader/store', 'UploaderController@store')->name('uploader.store');
        Route::post('/uploader/storePrice', 'UploaderController@storePrice')->name('uploader.storePrice');
        Route::post('/uploader/createPrice', 'UploaderController@createPrice')->name('uploader.createPrice');
        Route::get('/uploader', 'UploaderController@index')->name('uploader.index');
        Route::get('/uploader/edit/{uploader}', 'UploaderController@edit')->name('uploader.edit');
        Route::post('/uploader/activate/{id}', 'UploaderController@activate')->name('uploader.activate');
        Route::PATCH('/uploader/update/{uploader}', 'UploaderController@update')->name('uploader.update');
        /*=============     Products      ++++++++++++++*/
        Route::get('products', 'ProductsController@index')->name('products.index');
        Route::get('products/show/{id}', 'ProductsController@show')->name('products.show');
        Route::post('products/add', 'ProductsController@updateOrCreateProductsTable')->name('products.add');
        /*=============     Main      ++++++++++++++*/
        Route::get('main/createOld', 'MainCatController@createOldMains')->name('main.createOld');
        Route::resource('main', 'MainCatController');
        Route::post('main/store', 'MainCatController@store')->name('main.store');

        Route::get('main/show/{id}', 'MainCatController@show')->name('main.show');

        Route::post('main/activate/{id}', 'MainCatController@toggleActivate')->name('main.activate');
        /*=============     Seller      ++++++++++++++*/
        Route::resource('seller', 'SellerController');
        Route::get('seller/{id}/edit', 'SellerController@edit')->name('seller.edit');
        Route::post('/seller/add', 'SellerController@add')->name('seller.add');

        /*=======================XML==========================*/
        Route::get('xml', 'XmlController@show')->name('xml.index');
        Route::post('xml/set', 'XmlController@setSettings')->name('xml.set');


});

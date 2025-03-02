<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once "vendor/autoload.php";
require_once "config.php";


use App\Route;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\Helpers\AuthHelper;

AuthHelper::middleware();

$router = new Route();


Route::get('/', 'App\Controller\Client\HomeController@index');

Route::get('/about', 'App\Controller\Client\AboutController@index');
Route::get('/contact', 'App\Controller\Client\ContactController@index');
Route::get('/post', 'App\Controller\Client\PostController@index');




Route::get('/products', 'App\Controller\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controller\Client\ProductController@detail');
Route::get('/products/categories/{id}', 'App\Controller\Client\ProductController@getProductByCategory');



Route::get('/cart', 'App\Controller\Client\CartController@index');
Route::post('/cart/add', 'App\Controller\Client\CartController@add');
Route::post('/cart/update', 'App\Controller\Client\CartController@update');
Route::delete('/cart/delete', 'App\Controller\Client\CartController@deleteItem');

Route::get('/checkout', 'App\Controller\Client\CheckoutController@checkout');
Route::get('/qr', 'App\Controller\Client\CheckoutController@qr');

Route::post('/order', 'App\Controller\Client\CheckoutController@order');

Route::get('/login', 'App\Controller\Client\LoginController@Login');
Route::post('/login', 'App\Controller\Client\LoginController@loginAction');

Route::get('/login-google', 'App\Controller\Client\GoogleController@loginGoogle');
Route::get('/login-googleAction', 'App\Controller\Client\GoogleController@callbackGoogle');


Route::get('/register', 'App\Controller\Client\RegisterController@register');
Route::post('/register', 'App\Controller\Client\RegisterController@registerAction');

Route::get('/logout', 'App\Controller\Client\LoginController@logout');

Route::get('/account/{id}', 'App\Controller\Client\AccountController@index');
Route::get('/account/orderDetail/{id}', 'App\Controller\Client\AccountController@order');

Route::get('/404', 'App\Controller\Client\ErrorsController@index');




Route::get('/admin', 'App\Controller\Admin\DashboardController@index');

Route::get('/admin/products', 'App\Controller\Admin\ProductController@index');
Route::get('/admin/products/create', 'App\Controller\Admin\ProductController@create');
Route::post('/admin/products/store', 'App\Controller\Admin\ProductController@store');
Route::get('/admin/products/{id}', 'App\Controller\Admin\ProductController@edit');
Route::put('/admin/update/{id}', 'App\Controller\Admin\ProductController@update');
Route::delete('/admin/products/delete/{id}', 'App\Controller\Admin\ProductController@delete');
Route::get('/admin/products/search', 'App\Controller\Admin\ProductController@searchProduct');
// *** Admin

Route::get('/admin/categories', 'App\Controller\Admin\CategoryController@index');
Route::get('/admin/categories/create', 'App\Controller\Admin\CategoryController@create');
Route::post('/admin/categories/store', 'App\Controller\Admin\CategoryController@store');
Route::get('/admin/categories/{id}', 'App\Controller\Admin\CategoryController@edit');
Route::put('/admin/categories/update/{id}', 'App\Controller\Admin\CategoryController@update');
Route::delete('/admin/categories/delete/{id}', 'App\Controller\Admin\CategoryController@delete');


Route::get('/admin/users', 'App\Controller\Admin\UserController@index');
Route::get('/admin/users/create', 'App\Controller\Admin\UserController@create');
Route::post('/admin/users/store', 'App\Controller\Admin\UserController@store');
Route::get('/admin/users/{id}', 'App\Controller\Admin\UserController@edit');
Route::put('/admin/users/update/{id}', 'App\Controller\Admin\UserController@update');
Route::delete('/admin/users/delete/{id}', 'App\Controller\Admin\UserController@delete');

Route::get('/admin/materials', 'App\Controller\Admin\MaterialController@index');
Route::get('/admin/materials/create', 'App\Controller\Admin\MaterialController@create');
Route::post('/admin/materials/store', 'App\Controller\Admin\MaterialController@store');
Route::get('/admin/materials/{id}', 'App\Controller\Admin\MaterialController@edit');
Route::put('/admin/materials/update/{id}', 'App\Controller\Admin\MaterialController@update');
Route::delete('/admin/materials/delete/{id}', 'App\Controller\Admin\MaterialController@delete');

Route::get('/admin/orders', 'App\Controller\Admin\OrderController@index');

Route::get('/admin/warehouse', 'App\Controller\Admin\WarehouseController@index');
Route::get('/admin/warehouse/create', 'App\Controller\Admin\WarehouseController@create');
Route::post('/admin/warehouse/store', 'App\Controller\Admin\WarehouseController@store');


Route::get('/admin/recipes', 'App\Controller\Admin\RecipesController@index');
Route::get('/admin/recipes/create', 'App\Controller\Admin\RecipesController@create');

Route::post('/admin/recipes/store', 'App\Controller\Admin\RecipesController@store');




Route::dispatch($_SERVER['REQUEST_URI']);

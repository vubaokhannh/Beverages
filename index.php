<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once "vendor/autoload.php";

use App\Route;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$router = new Route();


Route::get('/', 'App\Controller\Client\HomeController@index');

Route::get('/products', 'App\Controller\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controller\Client\ProductController@detail');



Route::get('/cart', 'App\Controller\Client\CartController@index');
Route::post('/cart/add', 'App\Controller\Client\CartController@add');
Route::put('/cart/update', 'App\Controller\Client\CartController@update');
Route::delete('/cart/delete', 'App\Controller\Client\CartController@deleteItem');

Route::get('/checkout', 'App\Controller\Client\CheckoutController@checkout');
Route::post('/order', 'App\Controller\Client\CheckoutController@order');





Route::get('/login', 'App\Controller\Client\LoginController@Login');
Route::post('/login', 'App\Controller\Client\LoginController@loginAction');

Route::get('/register', 'App\Controller\Client\RegisterController@register');
Route::post('/register', 'App\Controller\Client\RegisterController@registerAction');




// client
// $router->add("/", ["controller" => "HomeController", "action" => "index"], "GET");

// $router->add("/about", ["controller" => "AboutController", "action" => "index"]);

// $router->add("/product", ["controller" => "ProductController", "action" => "index"]);
// $router->add("/product/detail", ["controller" => "ProductController", "action" => "detail"]);

// $router->add("/post", ["controller" => "PostController", "action" => "index"]);
// $router->add("/post/detail", ["controller" => "PostController", "action" => "detail"]);

// $router->add("/contact", ["controller" => "ContactController", "action" => "index"]);

// $router->add("/cart", ["controller" => "CartController", "action" => "index"]);

// $router->add("/checkout", ["controller" => "CheckoutController", "action" => "index"]);

// $router->add("/login", ["controller" => "LoginController", "action" => "index"]);
// $router->add("/register", ["controller" => "RegisterController", "action" => "index"]);


Route::get('/admin', 'App\Controller\Admin\DashboardController@index');

Route::get('/admin/products', 'App\Controller\Admin\ProductController@index');
Route::get('/admin/products/create', 'App\Controller\Admin\ProductController@create');
Route::post('/admin/products/store', 'App\Controller\Admin\ProductController@store');
Route::get('/admin/products/{id}', 'App\Controller\Admin\ProductController@edit');
Route::put('/admin/update/{id}', 'App\Controller\Admin\ProductController@update');
Route::delete('/admin/products/delete/{id}', 'App\Controller\Admin\ProductController@delete');
// *** Admin




// // admin
// $router->add("/admin", ["controller" => "DashboardController", "action" => "index"]);

// $router->add("/admin/products", ["controller" => "ProductController", "action" => "index"], "GET");
// $router->add("/admin/products/create", ["controller" => "ProductController", "action" => "create"],"GET");
// $router->add("/admin/products/store", ["controller" => "ProductController", "action" => "store"], "POST");


// $router->add("/admin/products/edit", ["controller" => "ProductController", "action" => "edit"]);


// $router->add("/admin/categories", ["controller" => "CategoryController", "action" => "index"]);
// $router->add("/admin/categories/create", ["controller" => "CategoryController", "action" => "create"]);
// $router->add("/admin/categories/edit", ["controller" => "CategoryController", "action" => "edit"]);

// $router->add("/admin/users", ["controller" => "UserController", "action" => "index"]);
// $router->add("/admin/users/create", ["controller" => "UserController", "action" => "create"]);
// $router->add("/admin/users/edit", ["controller" => "UserController", "action" => "edit"]);



// $router->add("/admin/posts", ["controller" => "PostController", "action" => "index"]);
// $router->add("/admin/posts/create", ["controller" => "PostController", "action" => "create"]);
// $router->add("/admin/posts/edit", ["controller" => "PostController", "action" => "edit"]);



// $router->add("/admin/vourcher", ["controller" => "VourcherController", "action" => "index"]);
// $router->add("/admin/vourcher/create", ["controller" => "VourcherController", "action" => "create"]);
// $router->add("/admin/vourcher/edit", ["controller" => "VourcherController", "action" => "edit"]);


// $router->add("/admin/orders", ["controller" => "OrderController", "action" => "index"]);




Route::dispatch($_SERVER['REQUEST_URI']);

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once "vendor/autoload.php";

use App\Route;


$router = new Route();

// client
$router->add("/", ["controller" => "HomeController", "action" => "index"]);

$router->add("/about", ["controller" => "AboutController", "action" => "index"]);

$router->add("/product", ["controller" => "ProductController", "action" => "index"]);
$router->add("/product/detail", ["controller" => "ProductController", "action" => "detail"]);

$router->add("/post", ["controller" => "PostController", "action" => "index"]);
$router->add("/post/detail", ["controller" => "PostController", "action" => "detail"]);

$router->add("/contact", ["controller" => "ContactController", "action" => "index"]);

$router->add("/cart", ["controller" => "CartController", "action" => "index"]);

$router->add("/checkout", ["controller" => "CheckoutController", "action" => "index"]);

$router->add("/login", ["controller" => "LoginController", "action" => "index"]);
$router->add("/register", ["controller" => "RegisterController", "action" => "index"]);


// admin
$router->add("/admin", ["controller" => "DashboardController", "action" => "index"]);

$router->add("/admin/products", ["controller" => "ProductController", "action" => "index"]);
$router->add("/admin/products/create", ["controller" => "ProductController", "action" => "create"]);
$router->add("/admin/products/edit", ["controller" => "ProductController", "action" => "edit"]);


$router->add("/admin/categories", ["controller" => "CategoryController", "action" => "index"]);
$router->add("/admin/categories/create", ["controller" => "CategoryController", "action" => "create"]);
$router->add("/admin/categories/edit", ["controller" => "CategoryController", "action" => "edit"]);

$router->add("/admin/users", ["controller" => "UserController", "action" => "index"]);
$router->add("/admin/users/create", ["controller" => "UserController", "action" => "create"]);
$router->add("/admin/users/edit", ["controller" => "UserController", "action" => "edit"]);



$router->add("/admin/posts", ["controller" => "PostController", "action" => "index"]);
$router->add("/admin/posts/create", ["controller" => "PostController", "action" => "create"]);
$router->add("/admin/posts/edit", ["controller" => "PostController", "action" => "edit"]);



$router->add("/admin/vourcher", ["controller" => "VourcherController", "action" => "index"]);
$router->add("/admin/vourcher/create", ["controller" => "VourcherController", "action" => "create"]);
$router->add("/admin/vourcher/edit", ["controller" => "VourcherController", "action" => "edit"]);


$router->add("/admin/orders", ["controller" => "OrderController", "action" => "index"]);




$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$params = $router->match($path);
if ($params === false) {
    include './src/Views/Errors/404.php';
    exit;
}


if (strpos($path, '/admin') === 0) {
    $namespace = "\\App\\Controller\\Admin\\";
} else {
    $namespace = "\\App\\Controller\\Client\\";
}

$controllerName = $params['controller'];
$action = $params['action'];

$controllerClass = $namespace . $controllerName;


if (!class_exists($controllerClass)) {
    include './src/View/Errors/404.php';
    exit;
}

$controller = new $controllerClass();

if (!method_exists($controller, $action)) {
    include './src/View/Errors/404.php';
    exit;
}


call_user_func_array([$controller, $action], []);

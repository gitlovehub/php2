<?php

// Website có các trang là:
//      Trang chủ
//      Giới thiệu
//      Sản phẩm
//      Chi tiết sản phẩm
//      Liên hệ

// Để định nghĩa được, điều đầu tiên làm là phải tạo Controller trước
// Tiếp theo, khai function tương ứng để xử lý
// Bước cuối, định nghĩa đường dẫn

// HTTP Method: get, post, put (path), delete, option, head

use MyNamespace\MyProject\Controllers\Client\HomeController;
use MyNamespace\MyProject\Controllers\Client\ProductController;
use MyNamespace\MyProject\Controllers\Client\CartController;
use MyNamespace\MyProject\Controllers\Client\AuthController;

$router->get( '/',                      HomeController::class . '@index');
$router->get( '/cart',                  CartController::class . '@cart');
$router->get( '/cart/add',              CartController::class . '@add');
$router->get( '/cart/delete',           CartController::class . '@delete');
$router->get( '/cart/update',           CartController::class . '@update');

$router->get( '/shop',                  ProductController::class . '@shop');
$router->post( '/search',               ProductController::class . '@search');
$router->get( '/cate/{id}/',            ProductController::class . '@cate');
$router->get( '/product-detail/{id}/',  ProductController::class . '@detail');

$router->get(  '/auth/login',           AuthController::class . '@loginPage');
$router->post( '/auth/handle-login',    AuthController::class . '@login');
$router->get(  '/auth/logout',          AuthController::class . '@logout');
$router->get( '/account',               AuthController::class . '@account');

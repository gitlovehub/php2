<?php

// CRUD bao gồm: Danh sách, xem, thêm, sửa, xóa
// User:
//      GET     -> USER/INDEX   -> INDEX        -> Danh sách
//      GET     -> USER/CREATE  -> CREATE       -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   -> STORE        -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO Database
//      GET     -> USER/ID      -> SHOW ($id)   -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT -> EDIT ($id)   -> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID      -> UPDATE ($id) -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO Database
//      DELETE  -> USER/ID      -> DELETE ($id) -> XÓA BẢN GHI TRONG Database

use MyNamespace\MyProject\Controllers\Admin\CategoryController;
use MyNamespace\MyProject\Controllers\Admin\DashboardController;
use MyNamespace\MyProject\Controllers\Admin\ProductController;
use MyNamespace\MyProject\Controllers\Admin\UserController;

$router->before('GET|POST', '/admin/*.*', function() {

    if (!is_logged()) {
        header('location: ' . url('/auth/login') );
        exit();
    } 

    if (!is_admin()) {
        header('location: ' . url());
        exit();
    }
    
});

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@dashboard');

    // CRUD CATEGORY
    $router->mount('/categories', function () use ($router) {
        $router->get('/',               CategoryController::class . '@index');  // Danh sách
        $router->get('/create',         CategoryController::class . '@create'); // Show form thêm mới
        $router->post('/store',         CategoryController::class . '@store');  // Lưu mới vào Database
        $router->get('/{id}/show',      CategoryController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      CategoryController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   CategoryController::class . '@update'); // Lưu sửa vào Database
        $router->get('/{id}/delete',    CategoryController::class . '@delete'); // Xóa
    });

    // CRUD PRODUCT
    $router->mount('/products', function () use ($router) {
        $router->get('/',               ProductController::class . '@index');  // Danh sách
        $router->get('/create',         ProductController::class . '@create'); // Show form thêm mới
        $router->post('/store',         ProductController::class . '@store');  // Lưu mới vào Database
        $router->get('/{id}/show',      ProductController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      ProductController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   ProductController::class . '@update'); // Lưu sửa vào Database
        $router->get('/{id}/delete',    ProductController::class . '@delete'); // Xóa
    });

    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',               UserController::class . '@index');  // Danh sách
        $router->get('/create',         UserController::class . '@create'); // Show form thêm mới
        $router->post('/store',         UserController::class . '@store');  // Lưu mới vào Database
        $router->get('/{id}/show',      UserController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      UserController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   UserController::class . '@update'); // Lưu sửa vào Database
        $router->get('/{id}/delete',    UserController::class . '@delete'); // Xóa
    });
});
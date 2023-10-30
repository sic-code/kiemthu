<?php
session_start();
require_once "config.php";
//Nạp 1 class tự động khi new 1 đối tượng.
spl_autoload_register(function ($class) {
    require "controllers/" . $class . ".php";
});

$baseDir = "/banhang";
$router = [
    'get' => [
        ''  =>  [new SanphamController, 'index'],
        'sp' => [new SanphamController, 'detail'],
        'loai' => [new SanphamController, 'cat'],
        'addtocart' => [new SanphamController, 'addtocart'],
        'showcart' => [new SanphamController, 'showcart'],
        'removecart' => [new SanphamController, 'removecart'],
        'searchform'  => [new SanphamController, 'searchform'],
        'checkout' => [new SanphamController, 'checkout'],
        'register' => [new UserController, 'register'],
        'login' => [new UserController, 'login'],
        'logout' => [new UserController, 'logout'],
        'changepass' => [new userController, 'changepass'],
        'update-user' => [new userController, 'update_user'],
        'forgot_password' => [new userController, 'forgot_password'],
        // admin
        'admin' => function () {
            header("Location:" . ROOT_URL . "admin/product");
            exit;
        },
        'admin/product' => [new AdminSPController, 'index'],
        'admin/product_add' => [new AdminSPController, 'add'],
        'admin/product_edit' => [new AdminSPController, 'edit'],
        'admin/product_delete' => [new AdminSPController, 'delete'],
        'admin/loai' => [new AdminLoaiSPController, 'index'],
        'admin/loai_add' => [new AdminLoaiSPController, 'add'],
        'admin/loai_edit' => [new AdminLoaiSPController, 'edit'],
        'admin/loai_delete' => [new AdminLoaiSPController, 'delete'],
        'admin/user' => [new AdminUserController, 'index'],
        'admin/user_add' => [new AdminUserController, 'add'],
        'admin/user_edit' => [new AdminUserController, 'edit'],
        'admin/delete' => [new AdminUserController, 'delete'],
        'admin/baiviet' => [new AdminBVController, 'index'],
        'admin/baiviet_add' => [new AdminBVController, 'add'],
        'admin/baiviet_edit' => [new AdminBVController, 'edit'],
        'admin/baiviet_delete' => [new AdminBVController, 'delete'],


    ],
    'post' => [
        // 'searchform' => [new SanphamController, 'searchform'],
        'checkout' => [new SanphamController, 'checkout'],
        'register_' => [new UserController, 'register_'],
        'login_' => [new UserController, 'login_'],
        'changepass_' => [new userController, 'changepass_'],
        'update_user_' => [new userController, 'update_user_'],
        'forgot_password_' => [new userController, 'forgot_password_'],
        // admin
        'admin/product_add_' => [new AdminSPController, 'add_'],
        'admin/product_edit_' => [new AdminSPController, 'edit_'],
        'admin/loai_add_' => [new AdminLoaiSPController, 'add_'],
        'admin/loai_edit_' => [new AdminLoaiSPController, 'edit_'],
        'admin/user_add_' => [new AdminUserController, 'add_'],
        'admin/user_edit_' => [new AdminUserController, 'edit_'],
        'forgotpassword' => [new userController, 'forgotPassword'],
        'admin/baiviet_add_' => [new AdminBVController, 'add_'],
        'admin/baiviet_edit_' => [new AdminBVController, 'edit_'],
    ]
];
$path = substr($_SERVER['REQUEST_URI'], strlen($baseDir) + 1,); //Loai?idloai=1&page=3
$arr = explode("?", $path);  // ['Loai', 'idloai=1&page=3]
$route = strtolower($arr[0]);  //loai
if (count($arr) >= 2) parse_str($arr[1], $params);  // [idloai=>1, page=>3]
else $params = [];
$method = strtolower($_SERVER['REQUEST_METHOD']); //get
if (!array_key_exists($method, $router)) die("Method kô phù hợp:" . $method);
if (!array_key_exists($route, $router[$method])) die("Route đâu có:" . $route);
// if (!array_key_exists($route, $router[$method])) header("location:" .ROOT_URL. "404.php");

$action = $router[$method][$route];  // [0 => SanphamController, 1 => detail]
call_user_func($action);

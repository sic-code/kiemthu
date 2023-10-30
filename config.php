<?php
const DB_HOST = "localhost"; //địa chỉ của host
const DB_NAME = "laptop";   //tên dbname
const DB_USER = "root";     //user host
const DB_PASS = "";         // password
const ROOT_URL = "/banhang/";  //Đường dẫn gốc
const BASE_DIR = __DIR__;
const PUBLIC_URL = ROOT_URL . "public/"; // đường dẫn các file pulic
const IMAGE_URL = BASE_DIR. "/public/images/"; // đường dẫn các file pulic
date_default_timezone_set('Asia/Ho_Chi_Minh');


//Hàm upload file
function save_file($filename, $targer_dir)
{
    $file_uploaded  = $_FILES[$filename]; // lấy dữ liệu từ form trả về arry có nhiều thuộc tính
    $file_name = basename($file_uploaded['name']); // lấy ra name của array vd: avc.png
    $target_path =  IMAGE_URL . $targer_dir . $file_name; // địa chỉ folder bạn muốn di chuyển file đến + tên file
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}

// tạo coookie
function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}
//Xóa cookie
function delete_cookie($name)
{
    add_cookie($name, "", -1);
}
// lấy ra các giá trị cookie
function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}

function checkLoginAdmin()
{
    if (isset($_SESSION['user']['vaitro']) == false || $_SESSION['user']['vaitro'] != 1) {
        $_SESSION['back'] =  $_SERVER['REQUEST_URI'];
        header("location:" . ROOT_URL . "login");
        exit();
    }
}

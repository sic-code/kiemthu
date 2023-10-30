<?php
require_once "models/user.php";
class AdminUserController
{
    private $model = null;
    function __construct()
    {
        $this->model = new user();
    }

    function input_check($input)
    {
        $data = trim(strip_tags($input));
        return $data;
    }

    function index()
    {
        checkLoginAdmin();
        global $params;
        $pageNum = isset($params['page']) ? $params['page'] : 1;
        $pageSize = 12;
        $pagePrev = $pageNum - 1;
        $pagePrev = $pageNum + 1;
        $user_total = $this->model->user_count();
        $total_page = ceil($user_total / $pageSize);
        $user_list = $this->model->users_select_all($pageNum, $pageSize);
        $titlePage = "Danh sách người dùng";
        $viewnoidung = "views/admin/user/userList.php";
        include "views/admin/layout.php";
    }
    function add()
    {
        $titlePage = "Thêm người dùng";
        $viewnoidung = "views/admin/user/userAdd.php";
        include "views/admin/layout.php";
    }
    function add_()
        {
        }

    function edit()
    {
        $titlePage = "Sửa người dùng";
        $viewnoidung = "views/admin/user/userEdit.php";
        include "views/admin/layout.php";
    }
    function edit_()
    {
    }

    function delete()
    {
    }
}

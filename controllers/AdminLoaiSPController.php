<?php
require_once "models/loai.php";

class AdminLoaiSPController
{
    private $model = null;
    protected $messager_error = null;
    function __construct()
    {
        $this->model = new loai();
        $this->messager_error = "";
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
        $pageNum = isset($params['page']) == true ? $params['page'] : 1;
        $pageSize = 10;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        $loai_count = $this->model->loai_count();
        $page_total = ceil($loai_count / $pageSize);
        $list_loai = $this->model->loai_select_all($pageNum, $pageSize);
        $viewnoidung = "views/admin/loai/loai-list.php";
        $titlePage = "Danh danh sách loại";
        include "views/admin/layout.php";
    }
    function add()
    {
        $viewnoidung = "views/admin/loai/loai-add.php";
        $titlePage = "Thêm loai";
        include "views/admin/layout.php";
    }
    function add_()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            $ten_loai = $this->input_check($_POST['ten_loai']);
            $thu_tu = (int) $_POST['thu_tu'];
            $an_hien = (int) $_POST['an_hien'];
            if (empty($ten_loai)) :
                $this->messager_error = "Tên loại không được bỏ trống";
            elseif (empty($thu_tu)) :
                $this->messager_error = "Thứ tự không được để trống";
            else :
                try {
                    $this->model->loai_insert($ten_loai, $thu_tu, $an_hien);
                    $this->messager_error = "Thêm loại thành công";
                } catch (Exception $e) {
                    $this->messager_error = "Lỗi truy vấn $e";
                }
            endif;

        endif;
        $viewnoidung = "views/admin/loai/loai-add.php";
        $titlePage = "Thêm loai";
        include "views/admin/layout.php";
    }

    function edit()
    {
        global $params;
        $id = isset($params['id']) ? $params['id'] : '';
        $loai = $this->model->detail($id);
        $viewnoidung = "views/admin/loai/loai-edit.php";
        $titlePage = "Sửa thể loại";
        include "views/admin/layout.php";
    }
    function edit_()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $id_loai = (int) $_POST['id_loai'];
            $ten_loai = $this->input_check($_POST['ten_loai']);
            $thu_tu = (int) $this->input_check($_POST['thu_tu']);
            $an_hien = (int) $this->input_check($_POST['an_hien']);

            if (empty($ten_loai)) :
                $this->messager_error = "Tên loại không được để trống";
            else :
                $this->model->loai_update($id_loai, $ten_loai, $thu_tu, $an_hien);
                $this->messager_error = "<p class='color: #1b8a52;'>Sửa thể loại thành công $id_loai</p>";
                $loai = $this->model->detail($id_loai);
            endif;
        endif;
        $viewnoidung = "views/admin/loai/loai-edit.php";
        $titlePage = "Sửa thể loại";
        include "views/admin/layout.php";
    }
    function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            global $params;
            $id = isset($params['id']) ? $params['id'] : '';
            $check_loai = $this->model->loai_exist($id);
            // echo $check_loai;
            if ($check_loai == false) {
                echo "id không tồn tại";
            } else {
                try {
                    $this->model->loai_delete($id);
                } catch (Exception $e) {
                    echo "Lỗi truy vấn data $e";
                }
            }
        }
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
    function detail()
    {
        echo "<h1>detail</h1>";
    }
}
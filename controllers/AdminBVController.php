<?php
require_once "models/baiviet.php";

class AdminBVController
{

    private $model = null;
    protected $messager_error = null;
    function __construct()
    {
        $this->model = new baiviet();
        $this->messager_error = "";
    }

    function input_check($input)
    {
        $data = trim(strip_tags($input));
        return $data;
    }
    function index()
    {
        global $params;
        $pageNum = isset($params['page']) == true ? $params['page'] : 1;
        $pageSize = 10;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        $bv_count = $this->model->baiViet_count();
        $page_total = ceil($bv_count / $pageSize);
        $list_bv = $this->model->baiViet_select_all($pageNum, $pageSize);
        $titlePage = "Danh sách bài viết";
        $viewnoidung = "views/admin/baiviet/bvList.php";
        include "views/admin/layout.php";
    }
    function add()
    {
        $titlePage = "Danh sách bài viết";
        $viewnoidung = "views/admin/baiviet/bvAdd.php";
        include "views/admin/layout.php";
    }
    function add_()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $bv_title = $this->input_check($_POST['bv_title']);
            $bv_date = ($_POST['bv_date']);
            $anhien = (int) $_POST['anhien'];
            $bv_content = $this->input_check($_POST['bv_content']);


            if (empty($bv_title)) :
                $this->messager_error = "Tiêu đề rỗng";
            elseif (empty($bv_content)) :
                $this->messager_error = "Nội dung không được để trống";

            else :
                $save_image = save_file("bv_image", "baiviet/");
                $bv_image = $save_image ? $save_image : "";
                try {
                    $id_bv = $this->model->baiViet_insert($bv_title, $bv_image, $anhien, $bv_date, $bv_content);
                    $this->messager_error = "Thêm thành công bài viết có $id_bv";
                } catch (Exception $e) {
                    echo "Lỗi data $e";
                }
            endif;

        endif;
        $titlePage = "Danh sách bài viết";
        $viewnoidung = "views/admin/baiviet/bvAdd.php";
        include "views/admin/layout.php";
    }
    function edit()
    {
        global $params;
        $id = isset($params['id']) ? $params['id'] : '';
        $baiviet = $this->model->detail($id);
        $titlePage = "Danh sách bài viết";
        $viewnoidung = "views/admin/baiviet/bvEdit.php";
        include "views/admin/layout.php";
    }
    function edit_()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $bv_title = $this->input_check($_POST['bv_title']);
            $bv_date = ($_POST['bv_date']);
            $anhien = (int) $_POST['anhien'];
            $id_bv =$_POST['id_bv'];
            $bv_content = $this->input_check($_POST['bv_content']);
            if(empty($bn_title)) {
                $this->messager_error = "trống tiêu đề";
            } else {
                $save_image = save_file("bv_image", "baiviet/");
                $bv_image = $save_image ? $save_image : $_POST['bv_image_old'];
                try {
                    $this->model->baiViet_update($bv_title, $bv_image, $anhien, $bv_date, $bv_content);
                    $this->messager_error = "Sửa thành công bài viết có $id_bv";
                    $baiviet = $this->model->detail($id_bv);
                } catch (Exception $e) {
                    echo "Lỗi data $e";
                }
            }
        endif;
        $titlePage = "Danh sách bài viết";
        $viewnoidung = "views/admin/baiviet/bvEdit.php";
        include "views/admin/layout.php";
    }
    function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            global $params;
            $id = $params['id'];
            try {
                $this->model->baiViet_delete($id);
            } catch (Exception $e) {
                echo "Lỗi truy vấn data $e";
            }
        }
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}

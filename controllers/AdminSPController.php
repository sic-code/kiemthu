<?php
require_once "models/sanpham.php";

class AdminSPController
{
    private $model = null;
    protected $listloai = null;
    protected $messager_error; // Hàm gán lỗi

    function __construct()
    {
        $this->model = new sanpham();
        $this->listloai = $this->model->layListLoai(); //Dùng để lấy ra các loại
        $this->messager_error = ""; //biến gán lỗi
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
        $id = isset($params['id']) == true ? $params['id'] : "";
        $sort = isset($params['sort']) == true ? $params['sort'] : "";
        $pageNum = isset($params['page']) == true ? $params['page'] : 1;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        $pageSize = 10;

        if ($id != "") :
            $product_count = $this->model->demSPTrongLoai($id);
            $page_total = ceil($product_count / $pageSize);
            $product_list = $this->model->product_select_by_idloai($id, $pageNum, $pageSize);
            $viewlist = "views/admin/product/list-type.php";
        elseif ($sort != "") :
            if ($sort == "dateAsc") :
                $product_count = $this->model->product_count(); //đếm số lượng sản phẩm.

                $page_total = ceil($product_count / $pageSize);
                $product_list = $this->model->product_sort_by_dateAsc($pageNum, $pageSize);
                $viewlist = "views/admin/product/list-sort.php";
            elseif ($sort == "dateDesc") :
                $product_count = $this->model->product_count(); //đếm số lượng sản phẩm.

                $page_total = ceil($product_count / $pageSize);
                $product_list = $this->model->product_sort_by_dateDesc($pageNum, $pageSize);
                $viewlist = "views/admin/product/list-sort.php";
            elseif ($sort == "priceAsc") :
                $product_count = $this->model->product_count(); //đếm số lượng sản phẩm.

                $page_total = ceil($product_count / $pageSize);
                $product_list = $this->model->product_sort_by_priceAsc($pageNum, $pageSize);
                $viewlist = "views/admin/product/list-sort.php";
            elseif ($sort == "priceDesc") :
                $product_count = $this->model->product_count(); //đếm số lượng sản phẩm.

                $page_total = ceil($product_count / $pageSize);
                $product_list = $this->model->product_sort_by_priceDesc($pageNum, $pageSize);
                $viewlist = "views/admin/product/list-sort.php";
            endif;
        else :
            $product_count = $this->model->product_count(); //đếm số lượng sản phẩm.
            $page_total = ceil($product_count / $pageSize);
            $product_list = $this->model->product_select_all($pageNum, $pageSize);
            $viewlist = "views/admin/product/list-all.php";
        endif;

        $titlePage = "Danh sách sản phẩm";
        $viewnoidung = "views/admin/product/product-list.php";
        include "views/admin/layout.php";
    }

    function add()
    {
        $titlePage = "Thêm sản phẩm";
        $viewnoidung = "views/admin/product/product-add.php";
        include "views/admin/layout.php";
    }

    function add_()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $product_name = $this->input_check($_POST['product_name']);
            $product_price = (int) $this->input_check($_POST['product_price']);
            $product_discount = (int) $this->input_check($_POST['product_discount']);
            $product_time = $this->input_check($_POST['product_time']);
            $anhien = (int) $this->input_check($_POST['anhien']);
            $hot = (int) $this->input_check($_POST['hot']);
            $id_loai = (int) $this->input_check($_POST['id_loai']);
            $product_mota = $this->input_check($_POST['product_mota']);
            $image_check = $_FILES['product_image']['size'];

            if (empty($product_name)) : $this->messager_error = "Không được để trống tên sản phẩm";
            elseif (empty($product_price)) : $this->messager_error = "Không được để trống giá";
            elseif (intval($product_price) < 0 || intval($product_discount) < 0) : $this->messager_error = "Giá sản phẩm phải lớn hơn 0";
            else :
                $save_image = save_file("product_image", "product/");
                $product_iamge = $save_image ? $save_image : "";
                $product_id = $this->model->product_insert($id_loai, $product_name, $product_price, $product_discount, $product_time, $anhien, $hot, $product_iamge, $product_mota);
                $this->messager_error = "<p class='color: #1b8a52;'>Thêm sản phẩm thành công $product_id</p>";
            endif;
        }

        $titlePage = "Thêm sản phẩm";
        $viewnoidung = "views/admin/product/product-add.php";
        include "views/admin/layout.php";
    }

    function edit()
    {
        global $params;
        $id = $params['id'];
        $product = $this->model->detail($id);
        $titlePage = "Chỉnh sửa sản phẩm";
        $viewnoidung = "views/admin/product/product-edit.php";
        include "views/admin/layout.php";
    }

    function edit_()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $product_id = $this->input_check($_POST['product_id']);
            $product_name = $this->input_check($_POST['product_name']);
            $product_price = (int) $this->input_check($_POST['product_price']);
            $product_discount = (int) $this->input_check($_POST['product_discount']);
            $product_time = $this->input_check($_POST['product_time']);
            $anhien = (int) $this->input_check($_POST['anhien']);
            $hot = (int) $this->input_check($_POST['hot']);
            $id_loai = (int) $this->input_check($_POST['id_loai']);
            $product_mota = $this->input_check($_POST['product_mota']);

            if (empty($product_name)) : $this->messager_error = "Không được để trống tên sản phẩm";
            elseif (empty($product_price)) : $this->messager_error = "Không được để trống giá";
            elseif (intval($product_price) < 0 || intval($product_discount) < 0) : $this->messager_error = "Giá sản phẩm phải lớn hơn 0";
            else :
                try {
                    $save_image = save_file("product_image", "product/");
                    $product_iamge = $save_image ? $save_image : $_POST['old_product_image'];
                    $this->model->product_update($product_id, $id_loai, $product_name, $product_price, $product_discount, $product_time, $anhien, $hot, $product_iamge, $product_mota);
                    $this->messager_error = "<p class='color: #1b8a52;'>Sửa sản phẩm thành công $product_id</p>";
                    $product = $this->model->detail($product_id);
                } catch (Exception $e) {
                    $this->messager_error = "Sửa thất bại $e";
                }
            endif;
        }
        $titlePage = "Chỉnh sửa sản phẩm";
        $viewnoidung = "views/admin/product/product-edit.php";
        include "views/admin/layout.php";
    }

    function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            global $params;
            $id = $params['id'];
            $product_exist = $this->model->product_exist($id);
            if ($product_exist == false) :
                echo "Id không tồn tại";
            else :
                try {
                    $this->model->product_delete($id);
                } catch (Exception $e) {
                    echo "Lỗi truy vấn data $e";
                }
            endif;
        }
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
    function detail()
    {
        $title = "Thông tin sản phẩm";
        $viewnoidung = "";
        include "views/admin/layout.php";
    }
}

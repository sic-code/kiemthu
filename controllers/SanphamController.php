<?php
require_once "models/sanpham.php";
class SanphamController
{
   private $model = null; //Dùng để gán các dữ liệu vào 
   protected $listloai = null;
   protected $messager_error; // Hàm gán lỗi

   function __construct()
   {
      $this->model = new sanpham(); //tạo ra đối tượng sản phẩm
      $this->listloai = $this->model->layListLoai(); //Dùng để lấy ra các loại
      $this->messager_error = ""; //biến gán lỗi
   }

   function index()
   {
      $sosp = 8;
      $spnb = $this->model->sanphamNoiBat($sosp);
      $spxn = $this->model->sanphamXemNhieu($sosp);
      $titlePage = "Trang Chủ";
      $viewnoidung = "home.php";
      include "views/user/layout.php";
   }

   function detail()
   {
      global $params; //Params chứa các tham số đã phân tách ra thành biến.
      $id = $params['id'];
      $sp = $this->model->detail($id);
      $titlePage = $sp['ten_sp'];
      $viewnoidung = "detail.php";
      include "views/user/layout.php";
   }

   function cat()
   {
      global $params;
      $idloai = $params['idloai'];
      $pageNum = isset($params['page']) == true ? $params['page'] : 1; // true trả về pgae = ?, false =1;
      $pagePrev = $pageNum - 1;
      $pageNext = $pageNum + 1;
      $pageSize = 12;
      $demsoSP = $this->model->demSPTrongLoai($idloai);
      $tongSoTrang = ceil($demsoSP / $pageSize); //ceil làm tròn  số
      $listsp = $this->model->sanPhamTrongLoai($idloai, $pageNum, $pageSize);
      $ten_loai = $this->model->layTenLoai($idloai); //lấy tên loại làm title
      $titlePage = " Sản phẩm $ten_loai";
      $viewnoidung = "sptrongloai.php";
      include "views/user/layout.php";
   }

   function addtocart()
   {
      global $params;
      $id_sp = $params['id'];
      $soluong = (int) $params['soluong']; //1
      //số lượng thêm 1 nếu sản phẩm tồn tại.
      if (isset($_SESSION['cart'][$id_sp]) == true) {
         $soluong = $_SESSION['cart'][$id_sp] + $soluong;
      }
      $_SESSION['cart'][$id_sp] = $soluong; // có 2 ý nghĩa
      header("location:" . ROOT_URL . "showcart");
   }

   function showcart()
   {
      $titlePage = "Cart";
      if (isset($_SESSION['cart']) == false || count($_SESSION['cart']) == 0) {
         $viewnoidung = "showcart_empty.php";
         include "views/user/layout.php";
      } else {
         $viewnoidung = "showcart.php";
         include "views/user/layout.php";
      }
   }

   // Xoa san pham trong cart
   function removecart()
   {
      global $params;
      $id_sp = $params['id'];
      if (isset($id_sp) == true) {
         if (isset($_SESSION['cart'][$id_sp]) == true) {
            unset($_SESSION['cart'][$id_sp]);
         }
      }
      header("location:" . ROOT_URL . "showcart");
   }

   // Check out
   function checkout()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') :
         $name = trim(strip_tags($_POST['name']));
         $phoneNumber = trim(strip_tags($_POST['phoneNumber']));
         $email = trim(strip_tags($_POST['email']));
         $address = trim(strip_tags($_POST['address']));
         if (!isset($_SESSION['user'])) {
            $this->messager_error = "Vui lòng đăng nhập<a href='" . ROOT_URL . "login'>Đăng nhập tại đây</a>";
         } elseif (empty($name) || empty($phoneNumber) || empty($email) || empty($address)) {
            $this->messager_error = "Không được để trống form";
         } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->messager_error = "Email không đúng định dạng";
         } else {
            $id_hd = $this->model->luuDonHang($name, $phoneNumber, $email, $address);
            $this->model->luuSPTrongGioHang($id_hd);
            unset($_SESSION['cart']);
            $viewnoidung = "checkout_success.php";
            include "views/user/layout.php";
         }
      endif;

      $titlePage = "Giỏ hàng";
      $viewnoidung = "showcart.php";
      include "views/user/layout.php";
   }

   function searchform()
   {
      global $params;
      $keyword = $params['search'] == true ? $params['search'] : null;
      $titlePage = "Kết quả tìm kiếm $keyword";
      if ($keyword != null) :
         $searchResult = $this->model->product_search($keyword);
         $searchResult == true ? $viewnoidung = "searchresult.php" : $viewnoidung = "search_empty.php";
      else :
         $viewnoidung = "search_empty.php";
      endif;
      include "views/user/layout.php";
   }
}

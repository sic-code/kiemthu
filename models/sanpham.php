<?php
require_once "database.php";

// class sản phẩm
class sanpham extends database
{
    //Lấy sản phẩm bằng ID
    function detail($id_sp = 0)
    {
        $sql = "SELECT id_loai, id_sp, ten_sp, gia, gia_km, hinh, soluotxem, ngay, hot, anhien, mota FROM sanpham WHERE id_sp = $id_sp";
        return $this->queryOne($sql);
    }

    function sanPhamTrongLoai($id_loai = 0, $pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham WHERE id_loai=$id_loai ORDER BY ngay DESC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }

    // lấy tên loại bằng ID
    function layTenLoai($id_loai = 0)
    {
        $sql = "SELECT ten_loai FROM loai WHERE id_loai= $id_loai";
        $row = $this->queryOne($sql);
        return $row['ten_loai'];
    }

    function demSPTrongLoai($id_loai = 0)
    {
        $sql = "SELECT count(id_sp) as dem FROM sanpham WHERE id_loai = $id_loai";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }

    function layListLoai()
    {
        $sql = "SELECT id_loai, ten_loai, thutu, anhien FROM loai WHERE anhien=1 ORDER BY thutu";
        return $this->query($sql);
    }

    function sanphamXemNhieu($sosp = 9)
    {
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh FROM sanpham ORDER BY soluotxem DESC LIMIT 0, $sosp";
        return $this->query($sql);
    }

    function sanphamNoiBat($sosp = 9)
    {
        $sql = "SELECT id_sp, ten_sp, gia, gia_km, hinh FROM sanpham WHERE hot = 1 ORDER BY ngay DESC LIMIT 0, $sosp";
        return $this->query($sql);
    }

    // Đặt hàng
    function luuDonHang($name, $phoneNumber, $email, $address)
    {
        $sql = "INSERT INTO donhang SET hoten = :ht, dienthoai = :dt ,email = :em, diachi = :dc";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht", $name, PDO::PARAM_STR);
        $stmt->bindParam(":dt", $phoneNumber, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":dc", $address, PDO::PARAM_STR);
        $stmt->execute();
        $idDH = $this->conn->lastInsertId(); //lấy id đơn hàng cuối cùng thực hiện lệnh;
        return $idDH;
    }

    // Lưu sản sẩm trong chi tiết đơn hàng
    function luuSPTrongGioHang($id_dh)
    {
        // Lấy thông tin từ cart
        foreach ($_SESSION['cart'] as $id_sp => $soluong) {
            $sp = $this->detail($id_sp);
            $sql = "INSERT INTO donhangchitiet SET id_dh = :id_dh, id_sp= :id_sp, ten_sp = :ten_sp, soluong = :sl, gia = :gia";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id_dh", $id_dh, PDO::PARAM_INT);
            $stmt->bindParam(":id_sp", $sp['id_sp'], PDO::PARAM_INT);
            $stmt->bindParam(":ten_sp", $sp['ten_sp'], PDO::PARAM_STR);
            $stmt->bindParam(":sl", $soluong, PDO::PARAM_INT);
            $stmt->bindParam(":gia", $sp['gia'], PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    // Thêm sản phẩm
    function product_insert($id_loai, $ten_sp, $gia, $gia_km, $ngay, $anhien, $hot, $hinhanh, $mota)
    {
        $sql = "INSERT INTO sanpham SET id_loai = :id_loai, ten_sp = :ten_sp, gia = :gia, gia_km = :gia_km, ngay = :ngay, anhien = :anhien, hot = :hot, hinh = :hinh, mota = :mota";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt->bindParam(":ten_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->bindParam(":mota", $mota, PDO::PARAM_STR);
        $stmt->execute();
        $id_sp = $this->conn->lastInsertId();
        return $id_sp;
    }

    function product_update($id_sp, $id_loai, $ten_sp, $gia, $gia_km, $ngay, $anhien, $hot, $hinhanh, $mota)
    {
        $sql = "UPDATE sanpham SET id_loai = :id_loai, ten_sp = :ten_sp, gia = :gia, gia_km = :gia_km, ngay = :ngay, anhien = :anhien, hot = :hot, hinh = :hinh, mota = :mota WHERE id_sp = :id_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
        $stmt->bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt->bindParam(":ten_sp", $ten_sp, PDO::PARAM_STR);
        $stmt->bindParam(":gia", $gia, PDO::PARAM_INT);
        $stmt->bindParam(":gia_km", $gia_km, PDO::PARAM_INT);
        $stmt->bindParam(":ngay", $ngay, PDO::PARAM_STR);
        $stmt->bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt->bindParam(":hot", $hot, PDO::PARAM_INT);
        $stmt->bindParam(":hinh", $hinh, PDO::PARAM_STR);
        $stmt->bindParam(":mota", $mota, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    function product_select_all($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham ORDER BY id_sp asc LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }

    function product_count()
    {
        $sql = "SELECT count(id_sp) as product_total FROM sanpham";
        $row = $this->queryOne($sql);
        return $row['product_total']; //trả về số lượng sản phẩm.
    }

    function product_delete($id_sp)
    {
        $sql = "DELETE FROM sanpham WHERE id_sp = :id_sp";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_sp", $id_sp, PDO::PARAM_INT);
        $stmt->execute();
    }

    function product_exist($id_sp)
    {
        $sql = "SELECT count(*) as total_id FROM sanpham WHERE id_sp = $id_sp";
        $result = $this->queryOne($sql);
        return $result['total_id'] > 0;
    }

    function product_select_by_idloai($id_loai = 0, $pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham WHERE id_loai=$id_loai ORDER BY id_sp asc LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }

    // sort
    function product_sort_by_dateAsc($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham ORDER BY ngay ASC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function product_sort_by_dateDesc($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham ORDER BY ngay DESC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function product_sort_by_appear($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham WHERE anhien = 1 DESC ORDER BY id_sp ASC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function product_sort_by_priceAsc($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham DESC ORDER BY gia ASC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function product_sort_by_priceDesc($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM sanpham ORDER BY gia DESC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    // end sort


    function product_search($keyword)
    {
        $keyword = "%$keyword%";
        $sql  = "SELECT id_sp, ten_sp, gia, gia_km, hinh FROM sanpham WHERE ten_sp  like :keyword LIMIT 0, 10";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

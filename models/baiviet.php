<?php
require_once "models/database.php";

class baiviet extends database {

    function detail($id_bv)
    {
        $sql = "SELECT * FROM baiviet WHERE id_bv = $id_bv ";
        return $this->queryOne($sql);
    }
    function baiViet_select_all() {
        $sql = "SELECT * FROM baiviet";
        return $this->query($sql);
    }

    function baiViet_insert($bv_title, $bv_image, $anhien, $bv_date, $bv_content){
        $sql = "INSERT INTO baiviet SET tieu_de = :td , hinh = :hinh, ngay = :ngay, noi_dung = :nd, anhien = :anhien";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("td", $bv_title, PDO::PARAM_STR);
        $stmt->bindParam("hinh", $bv_image, PDO::PARAM_STR);
        $stmt->bindParam("ngay", $bv_date, PDO::PARAM_STR);
        $stmt->bindParam("nd", $bv_content, PDO::PARAM_STR);
        $stmt->bindParam("anhien", $anhien, PDO::PARAM_INT);
        $stmt->execute();
        $id_bv = $this->conn->lastInsertId();
        return $id_bv;
    }

    function baiViet_count() {
        $sql = "SELECT count(id_bv) as dem FROM baiviet";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }

    function baiViet_delete($id_bv)
    {
        $sql = "DELETE FROM baiviet WHERE id_bv = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id_bv, PDO::PARAM_INT);
        $stmt->execute();
    }

    function baiViet_update($bv_title, $bv_image, $anhien, $bv_date, $bv_content)
    {
        $sql = "UPDATE baiviet SET tieu_de = :td , hinh = :hinh, ngay = :ngay, noi_dung = :nd, anhien = :anhien";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam("td", $bv_title, PDO::PARAM_STR);
        $stmt->bindParam("hinh", $bv_image, PDO::PARAM_STR);
        $stmt->bindParam("ngay", $bv_date, PDO::PARAM_STR);
        $stmt->bindParam("nd", $bv_content, PDO::PARAM_STR);
        $stmt->bindParam("anhien", $anhien, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

}
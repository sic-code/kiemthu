<?php
require_once "models/database.php";

class loai extends database
{
    function detail($id_loai)
    {
        $sql = "SELECT * FROM loai WHERE id_loai = $id_loai ";
        return $this->queryOne($sql);
    }

    function loai_select_all($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM loai ORDER BY id_loai ASC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }

    function loai_count()
    {
        $sql = "SELECT count(id_loai) as total_loai FROM loai";
        $result = $this->queryOne($sql);
        return $result['total_loai'];
    }
    function loai_insert($ten_loai, $thu_tu, $an_hien)
    {
        $sql = "INSERT INTO loai SET ten_loai = :tl, thutu = :tt, anhien = :ah";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":tl", $ten_loai, PDO::PARAM_STR);
        $stmt->bindParam(":tt", $thu_tu, PDO::PARAM_INT);
        $stmt->bindParam(":ah", $an_hien, PDO::PARAM_INT);
        $stmt->execute();
        $id_loai = $this->conn->lastInsertId();
        return $id_loai;
    }

    function loai_update($id_loai, $ten_loai, $thu_tu, $an_hien)
    {
        $sql = "UPDATE loai SET ten_loai = :tl, thutu = :tt, anhien = :ah WHERE id_loai = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id_loai, PDO::PARAM_INT);
        $stmt->bindParam(":tl", $ten_loai, PDO::PARAM_STR);
        $stmt->bindParam(":tt", $thu_tu, PDO::PARAM_INT);
        $stmt->bindParam(":ah", $an_hien, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    function loai_delete($id_loai)
    {
        $sql = "DELETE FROM loai WHERE id_loai = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id_loai, PDO::PARAM_INT);
        $stmt->execute();
    }

    function loai_exist($id_loai)
    {
        $sql = "SELECT count(*) as loai_id FROM loai WHERE id_loai = $id_loai";
        $result = $this->queryOne($sql);
        return $result['loai_id'] > 0;
    }
}

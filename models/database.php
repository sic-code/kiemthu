<?php
class database
{
    protected $conn = null;
    function __construct()
    {
        try {
            $host = "mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . "; charset=utf8";
            $this->conn = new PDO($host, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die("Lỗi kết nối db:" . $e->getMessage());
        }
    }

    // Lấy nhiều record
    function query($sql)
    {
        try {
            $result = $this->conn->query($sql);
            return $result;
        } catch (PDOException $e) {
            die("Lỗi truy vấn data: " . $e->getMessage() . "<br>" . $sql);
        }
    }

    // Lấy 1 record
    function queryOne($sql)
    {
        try {
            $kq = $this->conn->query($sql);
            return $kq->fetch();
        } catch (PDOException $e) {
            die("Lỗi truy vấn data: " . $e->getMessage() . "<br>" . $sql);
        }
    }
}

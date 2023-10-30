<?php
require_once "database.php";
class user extends database
{


    function users_select_all($pageNum = 1, $pageSize = 9)
    {
        $startRow = ($pageNum - 1) * $pageSize;
        $sql = "SELECT * FROM users ORDER BY id_user ASC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }

    function select_user_by_id($email)
    {
        $sql = "SELECT * FROM users WHERE email ='$email'";
        return $this->queryOne($sql);
    }

    // Đăng kí tài khoảng
    function register($name, $email, $password_md, $trangthai = 1, $roleid = 0, $image = 'user.webp')
    {
        $sql = "INSERT INTO users SET hoten = :ht, email = :em, matkhau = :mk, hinh = :hinh, trangthai  = :tt, vaitro = :vt";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":ht", $name, PDO::PARAM_STR);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":mk", $password_md, PDO::PARAM_STR);
        $stmt->bindParam(":tt", $trangthai, PDO::PARAM_INT);
        $stmt->bindParam(":vt", $roleid, PDO::PARAM_INT);
        $stmt->bindParam(":hinh", $image, PDO::PARAM_STR);
        $stmt->execute();
        // lấy id của user khi insert
        $id_user = $this->conn->lastInsertId();
        return $id_user;
    }

    function checkuser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :em";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->execute();
        $recordnum = $stmt->rowCount(); // rowCount đếm kết quả trả về
        if ($recordnum != 1) return "Tài khoản hoặc mật khẩu không đúng";
        $user = $stmt->fetch();
        $password_md = $user['matkhau'];
        if (password_verify($password, $password_md) == false) return "Mật khẩu không đúng";
        if ($user['trangthai'] != 1) return "Tài khoảng đã bị vô hiệu hóa"; //kiểm tra trạng thái
        else return $user;
    }

    function changepass($email, $password)
    {
        $sql = "UPDATE users SET matkhau = :mk WHERE email = :em";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":mk", $password, PDO::PARAM_STR);
        $stmt->execute();
    }

    function update($email, $name, $phone, $address, $hinhanh)
    {
        $sql = "UPDATE users SET hoten = :ht, dienthoai = :dt, diachi = :dc, hinhanh = :anh WHERE email = :em";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":em", $email, PDO::PARAM_STR);
        $stmt->bindParam(":ht", $name, PDO::PARAM_STR);
        $stmt->bindParam(":dt", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":dc", $address, PDO::PARAM_STR);
        $stmt->bindParam(":anh", $hinhanh, PDO::PARAM_STR);
        $stmt->execute();
    }

    function user_count()
    {
        $sql = "SELECT count(*) as user_total FROM users";
        $result = $this->queryOne($sql);
        return $result['user_total'] > 0;
    }

    function user_exist($email)
    {
        $sql = "SELECT count(*) as user_exist FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['user_exist'] > 0;
    }
}

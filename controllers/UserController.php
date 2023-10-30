<?php
require_once "models/user.php";
class userController
{
    private $model = null;
    protected $messager_error;
    function __construct()
    {
        $this->model = new user; // khai bao đối tượng user từ models user
        $this->messager_error = null;
    }

    function input_check($input)
    {
        $data = trim(strip_tags($input));
        return $data;
    }


    function register()
    {
        $titlePage = "Đăng kí tài khoản";
        include "views/user/register.php";
    }

    function register_()
    {
        $titlePage = "Đăng kí tài khoản";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $name = trim(strip_tags($_POST['name']));
            $email = trim(strip_tags($_POST['email']));
            $password = trim(strip_tags($_POST['password']));
            $password_rp = trim(strip_tags($_POST['password_rp']));
            $password_md = password_hash($password, PASSWORD_BCRYPT);
            $arr = [
                'Họ tên' => $name,
                'Email' => $email,
                'Mật khẩu' => $password,
                'Nhập lại Mật khẩu' => $password_rp,
            ];

            // Kiểm tra filed trống
            foreach ($arr as $key => $value) :
                if (empty($value)) {
                    $this->messager_error = "Không được để trống $key";
                    include "views/user/register.php";
                    exit;
                }
            endforeach;
            // end kiểm tra trống 

            if (strlen($password) < 6) :
                $this->messager_error = "Mật khẩu phải hơn hơn 6 kí tự ";
            else :
                if ($password != $password_rp) {
                    $this->messager_error = "Nhập lại mật khẩu không đúng";
                } else {
                    $id_user = $this->model->register($name, $email, $password_md);
                    header("location:" . ROOT_URL . "login");
                }
            endif;
        endif;
        include "views/user/register.php";
    }

    function login()
    {
        $titlePage = "Login";
        include "views/user/login.php";
    }

    function login_()
    {
        $titlePage = "Login";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim(strip_tags($_POST['email']));
            $password = trim(strip_tags($_POST['password']));
            $kq = $this->model->checkuser($email, $password);
            if (isset($_POST['remember']) == true) {
                $remember = $_POST['remember'];
            }

            if (empty($email) || empty($password)) {
                $this->messager_error = "Không được để trống";
            } elseif (!is_array($kq) == true) {
                $this->messager_error = $kq;
            } else {
                $_SESSION['user'] = $kq; //lưu thông tin đăng nhập vào session user.
                // Quay trở về trang trước khi đăng nhập
                if (isset($remember)) {
                    add_cookie('email', $email, 7);
                    add_cookie('password', $password, 7);
                } else {
                    delete_cookie('email');
                    delete_cookie('password');
                }
                if (isset($_SESSION['back']) == true) {
                    header("Location:" . $_SESSION['back']);
                    unset($_SESSION['back']);
                    exit;
                } else {
                    // Nếu Session đó không tồn tai thì chuyển đến trong home
                    header("Location:" . ROOT_URL);
                }
            }
        }
        include "views/user/login.php";
    }

    function logout()
    {
        if (isset($_SESSION['user'])) {
            // Xóa thông tin phiên làm việc của người dùng
            session_destroy();
            header("Location:" . ROOT_URL);
        }
    }

    function changepass()
    {
        $titlePage = "Thay đổi mật khẩu";
        include "views/user/changepass.php";
    }

    function changepass_()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $email = $_SESSION['user']['email'];
            $old_password = trim(strip_tags($_POST['old_password']));
            $new_password = trim(strip_tags($_POST['new_password']));
            $new_password_rp = trim(strip_tags($_POST['new_password_rp']));
            $password_md = password_hash($new_password, PASSWORD_BCRYPT);
            if (empty($old_password) || empty($new_password) || empty($new_password_rp)) :
                $this->messager_error = "Không được để trống";
            elseif ($new_password != $new_password_rp) :
                $this->messager_error = "Nhập lại mật khẩu không đúng";
            else :
                $result = $this->model->checkuser($email, $old_password);
                // kiểm tra nếu kết quả trả về string thì sai
                if (is_string($result) == true) {
                    $this->messager_error = $result;
                }
                $result = $this->model->changepass($email, $password_md);
                $this->messager_error = "Đổi mật khẩu thành công";
            endif;
        endif;
        $titlePage = "Thay đổi mật khẩu";
        include "views/user/changepass.php";
    }

    // Update thông tin user
    function update_user()
    {
        $titlePage = "Cập nhập thông tin";
        include "views/user/update_user.php";
    }

    function update_user_()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $email = $_SESSION['user']['email'];
            $numberPhone = trim(strip_tags($_POST['numberPhone']));
            $name = trim(strip_tags($_POST['name']));
            $address = trim(strip_tags($_POST['address']));
            $pattern = '/^(0[1-9][0-9]{8}|[+][8][4][1-9][0-9]{7})$/';

            if (empty($numberPhone) || empty($name) || empty($address)) :
                $this->messager_error = "Không được để trống";
            elseif (!preg_match($pattern, $numberPhone)) :
                $this->messager_error = 'Số điện thoại không hợp lệ';
            else :
                try {
                    $save_image = save_file('new_hinhanh', "users/");
                    $hinhanh = $save_image != null ? $save_image : $_POST['hinhanh'];
                    $result = $this->model->update($email, $name, $numberPhone, $address, $hinhanh);
                    $this->messager_error = "Đổi thông tin thành công";
                    $_SESSION['user'] = $this->model->select_user_by_id($email);
                } catch (Exception $e) {
                    $this->messager_error = "Đổi thông tin thất bại" . $e;
                }
            endif;
        endif;
        $titlePage = "Cập nhập thông tin";
        include "views/user/update_user.php";
    }

    function forgot_password()
    {
        $titlePage = "Quên mật khẩu";
        include "views/user/forgotPass.php";
    }
    function forgot_password_()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') :
            $email = $this->input_check($_POST['email']);
            $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
            if (!preg_match($regex, $email)) {
                $this->messager_error = "Đây không phải email";
            } else {
                $user_exits = $this->model->user_exist($email);
                if ($user_exits == false) {
                    $this->messager_error = "Email không tồn tại";
                } else {
                    $flag = false;
                    $new_password = rand(100000, 999999);
                    $password_md = password_hash($new_password, PASSWORD_BCRYPT);
                    $subject = 'Cấp lại mật khẩu tài khoản Website bán hàng Lil Sic';
                    $noidungthu = "Mật khẩu mới của bạn là: $new_password";
                    require_once "public/phpMailer/mailer.php";
                    if ($flag == true) {
                        $this->model->changepass($email, $password_md);
                        $this->messager_error = 'Mật khẩu mới đã được gửi về ' . $email . ', đăng nhập và đổi mật khẩu mới.';
                    } else {
                        $this->messager_error = "Lỗi";
                    }
                }
            }

        endif;

        $titlePage = "Lấy lại mật khẩu";
        include "views/user/forgotPass.php";
    }
}

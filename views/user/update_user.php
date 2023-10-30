<meta charset="utf8" />
<title><?php echo $titlePage; ?></title>
<link rel="stylesheet" href="<?= PUBLIC_URL ?>bootstrap/css/bootstrap.min.css">
<script src="<?= PUBLIC_URL ?>bootstrap/js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="<?= PUBLIC_URL ?>Font-Awesome-640/css/all.css">
<link href="<?= PUBLIC_URL ?>css/c1.css" rel="stylesheet">
<style>
.background-radial-gradient {
    background-color: hsl(218, 41%, 15%);
    background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
}

#radius-shape-1 {
    height: 220px;
    width: 220px;
    top: -60px;
    left: -130px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
}

#radius-shape-2 {
    border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
    bottom: -60px;
    right: -110px;
    width: 300px;
    height: 300px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
}

.bg-glass {
    background-color: hsla(0, 0%, 100%, 0.9) !important;
    backdrop-filter: saturate(200%) blur(25px);
}

.btn {
    box-shadow: 0 2px 2px#1f2f4a90;
}

.status-form>p {
    font-size: 14px;
    font-weight: 400;
    color: red;
}

.changepass-info>img {
    border-radius: 50%;
    border: 5px solid #0d6efd;
}

.changepass-info>p {
    margin-top: 5px;
    color: hsl(218, 81%, 85%);
    font-size: 20px;
}

.card-back a {
    text-decoration: none;
    color: #000;
}

.card-back a:hover {
    color: #0d6efd;
}
</style>
<section class="background-radial-gradient overflow-hidden">

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center">
            <div class="changepass-info col-lg-6 mb-5 mb-lg-0 text-center" style="z-index: 10">
                <img src="<?= IMAGE_URL . 'users/' . $_SESSION['user']['hinh'] ?>" width="200px" alt="">
                <p><?= $_SESSION['user']['hoten'] ?></p>
            </div>
            <div class="col-lg-5 mb-6 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body py-5 px-md-5">
                        <!-- form -->
                        <form action="update_user_" method="post" enctype="multipart/form-data">
                            <h3 class="mb-4 text-center text-uppercase">Cập nhập thông tin</h3>
                            <div class="form-outline mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" name="change_email" class="form-control" disabled
                                    value="<?= $_SESSION['user']['email'] ?>" />
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">Họ tên</label></label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?= $_SESSION['user']['hoten'] ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="number" name="numberPhone" class="form-control"
                                            value="<?= $_SESSION['user']['dienthoai'] ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control"
                                    value="<?= $_SESSION['user']['diachi'] ?>" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Hình ảnh</label>
                                <input type="file" name="new_hinhanh" class="form-control" />
                                <input type="hidden" name="hinhanh" class="form-control"
                                    value="<?= $_SESSION['user']['hinh'] ?>" />
                            </div>
                            <!-- status form -->
                            <div class="status-form">
                                <?php if (strlen($this->messager_error)) echo "<p>" . $this->messager_error . "</p>" ?>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Cập nhập thông tin</button>
                        </form>
                        <div class="card-back text-center">
                            <a href="<?= ROOT_URL ?>"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Trởi về trang
                                chủ</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
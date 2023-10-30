<meta charset="utf8" />
<title><?php echo $titlePage; ?></title>
<link rel="stylesheet" href="<?= PUBLIC_URL ?>bootstrap/css/bootstrap.min.css">
<script src="<?= PUBLIC_URL ?>bootstrap/js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="<?= PUBLIC_URL ?>Font-Awesome-640/css/all.css">
<link href="<?= PUBLIC_URL ?>css/c1.css" rel="stylesheet">

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden h-100">
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
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Đăng kí tài khoản <br />
                    <span style="color: hsl(218, 81%, 75%)">của bạn cho website</span>
                </h1>
                <p class="opacity-70" style="color: hsl(218, 81%, 85%)">
                    Đăng kí tài khoản để có thể trải ngiệm mua sắm tốt nhất. Có cơ hội trúng được nhiều phần quà hấp dẫn
                    từ chúng tôi!!!
                </p>
            </div>

            <div class="col-lg-5 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="<?= ROOT_URL . 'forgot_password_' ?>" method="post">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <!-- Email input -->
                                <label for="">Nhập email để nhận lại mật khẩu</label>
                                <div class="form-outline mb-2">
                                    <label class="form-label">Email</label>
                                    <input name="email" class="form-control" />
                                </div>

                                <!-- status -->
                                <div class=" status-form mb-3 d-flex justify-content-between">
                                    <?php if (strlen($this->messager_error))
                                        echo "<p>$this->messager_error</p>"
                                    ?>
                                    <a class="text-nowrap ms-3 text-end" href="<?= ROOT_URL . 'login' ?>">Đăng nhập</a>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-2 btn-register">
                                    Đăng nhập
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="heading row justify-content-between px-2">
    <div class="col-md-8 order-md-last">
        <div class="row">
            <div class="col-md-6 text-center mb-sm-4">
                <a class="navbar-brand" href="<?= ROOT_URL ?>">Lil Sic<span>Architecture Agency</span></a>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center mb-sm-2">
                <div class="heading-cart me-2 position-relative">
                    <a href="<?= ROOT_URL . 'showcart' ?>"><i class="fa-regular fa-cart-shopping icon-cart"></i></a>
                    <span class="position-absolute d-flex justify-content-center align-items-center">
                        <?php if (isset($_SESSION['soluong'])) {
                            echo $_SESSION['soluong'];
                        } else echo 0; ?>
                    </span>
                </div>
                <form action="<?= ROOT_URL . 'searchForm' ?>" method="get" class="searchform m-0">
                    <div class="form-group d-flex ">
                        <input type="text" class="form-control search-input" name="search" placeholder="Search">
                        <button type="submit" class="form-control search"><span class="fa fa-search"></span></button>
                    </div>
                </form>
                <div class="heading-user order-lg-last ms-2 d-flex align-items-center">

                    <!-- Đã login -->
                    <?php if (isset($_SESSION['user'])) : ?>
                        <div class="dropdown dropdown-user">
                            <span>Chào! <?= $_SESSION['user']['hoten'] ?></span>
                            <i data-bs-toggle="dropdown" class="fa-regular fa-user ms-2"></i>
                            <ul class="dropdown-menu">
                                <?php if ($_SESSION['user']['vaitro'] == 1) : ?>
                                    <li><a class="dropdown-item" href="<?= ROOT_URL . "admin" ?>">Đến trang quản trị</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="<?= ROOT_URL . 'changepass' ?>">Đổi mật khẩu</a></li>
                                <li><a class="dropdown-item" href="<?= ROOT_URL . 'update-user' ?>">Cập nhập thông tin</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= ROOT_URL . 'logout' ?>">Đăng xuất</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="<?= ROOT_URL . 'login' ?>"><i class="fa-regular fa-user"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex">
        <div class="social-media">
            <p class="mb-0 d-flex">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa-brands fa-facebook-f icon-social"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa-brands fa-instagram icon-social"></i></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa-brands fa-youtube icon-social"></i></a>
            </p>
        </div>
    </div>
</div>
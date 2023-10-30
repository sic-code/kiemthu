<ul>
    <li><a href="<?= ROOT_URL . 'admin' ?>" class="logo">
            <img src="<?= PUBLIC_URL . 'images/users/'. ($_SESSION['user']?$_SESSION['user']['hinh']:'user.webp')?>" alt="">
            <span class="nav-item">DashBoard</span>
        </a></li>


    <li class="dropmenu">
        <a class="d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-home"></i>
                <span class="nav-item">Loại hàng</span>
            </div>
            <div>
                <i class="fa-solid fa-caret-down pe-4"></i>
            </div>
        </a>
        <ul class="drop-list">
            <li><a href="<?= ROOT_URL . 'admin/loai' ?>">
                    <span class="drop-item">Danh sách loại hàng</span>
                </a></li>
            <li><a href="<?= ROOT_URL . 'admin/loai_add' ?>">
                    <span class="drop-item">Thêm loại hàng</span>
                </a></li>
        </ul>
    </li>
    <li class="dropmenu">
        <a class="d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-home"></i>
                <span class="nav-item">Sản phẩm</span>
            </div>
            <div>
                <i class="fa-solid fa-caret-down pe-4"></i>
            </div>
        </a>
        <ul class="drop-list">
            <li><a href="<?= ROOT_URL . "admin/product" ?>">
                    <span class="drop-item">Danh sách sản phẩm</span>
                </a></li>
            <li><a href="<?= ROOT_URL . "admin/product_add" ?>">
                    <span class="drop-item">Thêm sản phẩm</span>
                </a></li>
        </ul>
    </li>
    <li class="dropmenu">
        <a class="d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-user"></i>
                <span class="nav-item">Người dùng</span>
            </div>
            <div>
                <i class="fa-solid fa-caret-down pe-4"></i>
            </div>
        </a>
        <ul class="drop-list">
            <li><a href="<?= ROOT_URL . 'admin/user' ?>">
                    <span class="drop-item">Danh sách người dùng</span>
                </a></li>
            <li><a href="<?= ROOT_URL . 'admin/user_add' ?>">
                    <span class="drop-item">Thêm người dùng</span>
                </a></li>
        </ul>
    </li>
    <li class="dropmenu">
        <a class="d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-user"></i>
                <span class="nav-item">Bài viết</span>
            </div>
            <div>
                <i class="fa-solid fa-caret-down pe-4"></i>
            </div>
        </a>
        <ul class="drop-list">
            <li><a href="<?= ROOT_URL . 'admin/baiviet' ?>">
                    <span class="drop-item">Danh sách bài viết</span>
                </a></li>
            <li><a href="<?= ROOT_URL . 'admin/baiviet_add' ?>">
                    <span class="drop-item">Thêm bài viết</span>
                </a></li>
        </ul>
    </li>
    <li><a href="">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Đơn hàng</span>
        </a></li>
    <li><a href="">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Thống kê</span>
        </a></li>
    <li><a href="">
            <i class="fas fa-question-circle"></i>
            <span class="nav-item">Help</span>
        </a></li>
</ul>
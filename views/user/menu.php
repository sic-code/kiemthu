
<div class="navbar navbar-expand-lg p-0">
    <div class="container-fluid">
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" style="color: #fff;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-list navbar-nav m-auto">
                <li class="nav-item navbar-item">
                    <a class="nav-link active px-4" aria-current="page" href="<?= ROOT_URL ?>">Trang Chủ</a>
                </li>
                <li class="nav-item navbar-item dropdown">
                    <a class="nav-link active px-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sản Phẩm
                    </a>
                    <ul class="dropdown-menu p-0 m-0">
                        <?php foreach ($this->listloai as $loai) { ?>
                        <li >
                            <a class="ps-2 d-block" href="<?=ROOT_URL . "loai?idloai=".$loai['id_loai']?>"><?=$loai['ten_loai']?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item navbar-item">
                    <a class="nav-link active px-4" aria-current="page" href="#">Chính Sách</a>
                </li>
                <li class="nav-item navbar-item">
                    <a class="nav-link active px-4" aria-current="page" href="#">Liên Hệ</a>
                </li>
                <li class="nav-item navbar-item">
                    <a class="nav-link active px-4" aria-current="page" href="#">Tin tức</a>
                </li>
            </ul>
        </div>
    </div>
</div>
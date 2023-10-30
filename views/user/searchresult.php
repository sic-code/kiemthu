<div id="sanphamTrongLoai" class="container-fluid text-center my-4">
    <div class="sanpham-title text-start my-4">
        <h4><?= "Kết quả tìm kiếm " . $keyword ?></h4>
    </div>
    <div class="row">
        <?php foreach ($searchResult as $item) : ?>
            <div class="col-md-6 col-lg-3 px-4 pb-4">
                <div class="card product-item">
                    <div class="card-head">
                        <a href="<?= ROOT_URL . "sp?id=" . $item['id_sp'] ?>">
                            <img src="<?= $item['hinh'] ?>" class="card-img-top" alt="<?= $item['ten_sp'] ?>">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="item-name d-flex justify-content-between">
                            <a href="<?= ROOT_URL . "sp?id=" . $item['id_sp'] ?>"><?= $item['ten_sp'] ?></a>
                        </div>
                        <div class="item-price my-3 d-flex justify-content-evenly">
                            <del><?= number_format($item['gia_km'], 0, "", ".") ?>VNĐ</del>
                            <span><?= number_format($item['gia'], 0, "", ".") ?> VNĐ</span>
                        </div>
                        <div class="btn-buy my-2">
                            <a href="<?= ROOT_URL . "addtocart?id=" . $item['id_sp'] . "&soluong=1" ?>">Thêm giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
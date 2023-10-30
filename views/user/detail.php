<div class="container-fluid detail-box">
    <div class="row product-detail">
        <div class="col-lg-5 box-image">
            <img src="<?= $sp['hinh'] ?>" width="100%" alt="<?= $sp['hinh'] ?>">
        </div>
        <div class="col-lg-7 box-info">
            <p class="box-id">Mã: <?=$sp['id_sp']?></p>
            <h1 class="box-name my-2"><?= $sp['ten_sp']; ?></h1>
            <div class="box-price d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <del class="price me-4"><?= number_format($sp['gia'], 0, "", "."); ?> VNĐ</del>
                    <h4 class="discount"><?= number_format($sp['gia_km'], 0, "", "."); ?> VNĐ</h4>
                </div>
                <span class="view-number"><i class="fa-solid fa-eye fa-shake me-2"></i><?=$sp['soluotxem']?></span>
            </div>
            <hr>
            <p class="description">Không có mô tả</p>
        <form class="box-callaction" method="get">
            <!-- <input type="number" name="soluong" value="1"> -->
            <a class="btn-buy" href="<?= ROOT_URL . "addtocart?id=" . $sp['id_sp'] . "&soluong=1" ?>"><i class="fa-regular fa-cart-shopping fa-shake me-2"></i>Thêm giỏ hàng</a>
            <a class="btn-back ms-4" type="button" onclick="history.back()"><i class="fa-solid fa-arrow-left fa-bounce me-2"></i>Quay lại</a>
        </form>
        </div>
    </div>
</div>
<hr>
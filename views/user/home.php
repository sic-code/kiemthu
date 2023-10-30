
<!-- Nhứng slidershow -->
<section><?php include "slider.php"?></section>
<!-- end slider -->

<!-- Free ship -->
<div class="freeship row w-100 m-auto">
    <div class="freeship-box d-flex align-items-center justify-content-center col-4">
        <div class="freeship-icon">
            <i class="fa-light fa-truck-moving"></i>
        </div>
        <div class="freeship-content">
            <p class="title">Miễn phí vẫn chuyển toàn quốc</p>
            <p>Miễn phí vẫn chuyển khi đơn hàng trên 500.000 đ</p>
        </div>
    </div>

    <div class="freeship-box d-flex align-items-center justify-content-center col-4">
        <div class="freeship-icon">
            <i class="fa-light fa-clock"></i>
        </div>
        <div class="freeship-content">
            <p class="title">Thủ tục đổi trả</p>
            <p>Nhanh chóng 24h</p>
        </div>
    </div>

    <div class="freeship-box d-flex align-items-center justify-content-center col-4">
        <div class="freeship-icon">
            <i class="fa-light fa-shield"></i>
        </div>
        <div class="freeship-content">
            <p class="title">Bảo hành 12 tháng</p>
            <p>Tất cả sản phẩm được bảo hành 12 tháng</p>
        </div>
    </div>
</div>
<!-- end freeship -->

<!-- List sản phẩm -->
<div id="sanphamNoiBat" class="container-fluid text-center my-4">
    <hr>
    <div class="sanpham-title text-start my-4">
        <h3>Sản phẩm nổi bật</h3>
    </div>
    <div class="row">
        <?php foreach($spnb as $item): ?>
        <div class="col-md-6 col-lg-3 px-4 pb-4">
            <div class="card product-item" style="width: 100%;">
                <div class="card-head">
                    <a href="<?=ROOT_URL . "sp?id=" .$item['id_sp']?>">
                        <img src="<?=$item['hinh']?>" class="card-img-top" alt="<?=$item['ten_sp']?>">
                    </a>
                </div>
                <div class="card-body">
                    <div class="item-name d-flex justify-content-between">
                        <a href="<?=ROOT_URL . "sp?id=" .$item['id_sp']?>"><?=$item['ten_sp']?></a>
                    </div>
                    <div class="item-price my-3 d-flex justify-content-evenly">
                        <del><?=number_format($item['gia_km'],0,"",".")?>VNĐ</del>
                        <span><?=number_format($item['gia'],0,"",".")?> VNĐ</span>
                    </div>
                    <div class="btn-buy my-2">
                        <a href="<?=ROOT_URL ."addtocart?id=".$item['id_sp']."&soluong=1"?>">Thêm giỏ hàng </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<section>
    <img src="https://support.apple.com/content/dam/edam/applecare/images/en_BY/psp_heros/hero-banner-macbook-pro.image.large_2x.jpg" width="100%" alt="">
</section>
<div id="sanphamXemNhieu" class="container-fluid text-center my-4">
    <hr>
    <div class="sanpham-title text-start my-4">
        <h3>Sản phẩm Xem nhiều</h3>
    </div>
    <div class="row">
        <?php foreach($spxn as $item): ?>
        <div class="col-md-6 col-lg-3 px-4 pb-4">
            <div class="card product-item">
                <div class="card-head">
                    <a href="<?=ROOT_URL . "sp?id=" .$item['id_sp']?>">
                        <img src="<?=$item['hinh']?>" class="card-img-top" alt="<?=$item['ten_sp']?>">
                    </a>
                </div>
                <div class="card-body">
                    <div class="item-name d-flex justify-content-between">
                        <a href="<?=ROOT_URL . "sp?id=" .$item['id_sp']?>"><?=$item['ten_sp']?></a>
                    </div>
                    <div class="item-price my-3 d-flex justify-content-evenly">
                        <del><?=number_format($item['gia_km'],0,"",".")?>VNĐ</del>
                        <span><?=number_format($item['gia'],0,"",".")?> VNĐ</span>
                    </div>
                    <div class="btn-buy my-2">
                        <a href="<?=ROOT_URL ."addtocart?id=".$item['id_sp']."&soluong=1"?>">Thêm giỏ hàng </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
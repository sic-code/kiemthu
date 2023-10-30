
    <style>
        .btn-back {
            border: none;
            background: none;
            font-size: 16px;
            font-weight: 500;
            color: #000;
        }

        .btn-back:hover {
            color: blue;
            scale: 1.1;
        }

        .cart-item {
            flex: 1;
        }

        .total-name {
            font-size: 16px;
            color: #000;
            font-weight: 600;
            text-transform: uppercase;
        }

        .total-value {
            font-size: 14px;
            color: #000;
            font-weight: 500;
        }

        .btn-checkout {
            padding: 10px 32px;
            background: #00BFB2;
            color: #fff;
            border: none;
            border-radius: 10px;

        }

        .btn-checkout:hover {
            background: #000;
            transition: 0.6s;
        }
        .status-form p {
            color: #FF0000;
        }
    </style>
    <section class="container-cart h-custom" style="background-color: #eee;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <button class="btn-back" onclick="history.back()" class="text-body">
                                        <i class="fa-solid fa-arrow-left-to-line me-2"></i>Tiếp tục mua hàng
                                    </button>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <h3 class="mb-1">Giỏ hàng</h3>
                                        </div>
                                    </div>

                                    <?php $thanhtien = $tongsoluong = 0; ?>
                                    <?php foreach ($_SESSION['cart'] as $id_sp => $soluong) : ?>
                                        <?php
                                        $sp = $this->model->detail($id_sp);
                                        $tien = $sp['gia'] * $soluong;
                                        $thanhtien += $tien;
                                        $vat = $thanhtien * 0.02;
                                        $total = $thanhtien + $vat;
                                        $_SESSION['soluong'] = $tongsoluong += $soluong;
                                        ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="list-cart d-flex justify-content-between">
                                                    <div class="cart-item d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="<?= $sp['hinh'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <strong><?= $sp['ten_sp'] ?></strong>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center me-4">
                                                        <input style="width: 30px;" type="number" class="fw-normal mb-0 float-end" disabled name="soluong[]" value="<?= $soluong ?>">
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">

                                                        <div style="width: 100px;">
                                                            <strong class="mb-0"><?= number_format($tien, 0, "", "."); ?></strong>
                                                        </div>
                                                        <a href="<?= ROOT_URL . "removecart?id=" . $sp['id_sp'] ?>">
                                                            <i style="color:#000" class="fa-solid fa-trash-xmark ms-2"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <!-- Form -->
                                </div>
                                <div class="col-lg-5">
                                    <div class="card text-black rounded-3" style="background: #f8f8f8;">
                                        <div class="card-body ">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Thông tin đặt hàng</h5>
                                                <hr>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span>Sản phẩm:</span>
                                                    <span><?= $tongsoluong ?></span>
                                                </div>
                                                <div>
                                                    <strong><?= number_format($thanhtien, 0, "", ".") ?> VNĐ</strong>
                                                </div>
                                            </div>
                                            <!-- Form order -->
                                            <form action="checkout" method="post" class="mt-4">
                                                <div class="status-form">
                                                <?php if (strlen($this->messager_error)) : ?>
                                                    <p class="success"><?= $this->messager_error ?></p>
                                                    <?php endif;?>
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <input type="text" name="name" class="form-control" placeholder="Your Name...">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <input type="number" name="phoneNumber" class="form-control" maxlength="11" placeholder="098...">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="abc@gmail.com">
                                                </div>
                                                <div class="mb-3 form-group">
                                                    <input type="text" name="address" class="form-control" placeholder="Address...">
                                                </div>


                                                <hr class="my-4">
                                                <div class="total">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2 total-name">Tạm tính</p>
                                                        <p class="mb-2 total-value">
                                                            <?= number_format($thanhtien, 0, "", ".") ?> VNĐ</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2 total-name">Thuế VAT 2%</p>
                                                        <p class="mb-2 total-value">
                                                            <?= number_format($vat, 0, "", ".") ?> VNĐ</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-2">
                                                        <p class="mb-2 total-name">Tổng tiền :</p>
                                                        <p class="mb-2 total-value">
                                                            <?= number_format($total, 0, "", ".") ?> VNĐ</p>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn-checkout">Đặt hàng<i class="fas fa-long-arrow-alt-right ms-2"></i> </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
    font-weight: 600;
    text-transform: uppercase;
}

.total-value {
    font-size: 14px;
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
.btn-gohome a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    padding: 10px 32px;
    background: #2EC07A;
    border-radius: 20px;
    font-weight: 500;
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
                                    <i class="fa-solid fa-arrow-left-to-line me-2"></i>Quay lại mua hàng
                                </button>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <h3 class="mb-1">Giỏ hàng</h3>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="https://img.freepik.com/premium-vector/shopping-cart-with-cross-mark-wireless-paymant-icon-shopping-bag-failure-paymant-sign-online-shopping-vector_662353-912.jpg" width="300px" alt="IMG">
                                    <div class="btn-gohome">
                                        <a href="<?=ROOT_URL?>">Mua hàng</a>
                                    </div>
                                </div>

                                <!-- Form -->
                            </div>
                            <div class="col-lg-5">
                                <div class="card text-black rounded-3" style="background: #f8f8f8;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Thông tin đặt hàng</h5>
                                            <hr>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span>Sản phẩm:</span>
                                                <span>0</span>
                                            </div>
                                            <div>
                                                <strong>0 VNĐ</strong>
                                            </div>
                                        </div>

                                        <!-- Form order -->
                                        <form action="checkout" method="post" class="mt-4">
                                            <div class="mb-3 form-group">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Họ tên...">
                                            </div>
                                            <div class="mb-3 form-group">
                                                <input type="number" name="phoneNumber" class="form-control"
                                                    maxlength="11" placeholder="098...">
                                            </div>
                                            <div class="mb-3 form-group">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="abc@gmail.com">
                                            </div>
                                            <div class="mb-3 form-group">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Địa chỉ...">
                                            </div>


                                            <hr class="my-4">
                                            <div class="total">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2 total-name">Tạm tính</p>
                                                    <p class="mb-2 total-value">0 VNĐ</p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2 total-name">Thuế VAT 2%</p>
                                                    <p class="mb-2 total-value">0 VNĐ</p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-2">
                                                    <p class="mb-2 total-name">Tổng tiền :</p>
                                                    <p class="mb-2 total-value">0 VNĐ</p>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-checkout" disabled >Đặt hàng<i
                                                    class="fas fa-long-arrow-alt-right ms-2"></i> </button>
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
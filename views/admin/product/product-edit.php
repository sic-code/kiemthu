<div class="container form-container p-4">
    <h5>Sửa thông tin sản phẩm</h5>
    <form action="<?= ROOT_URL . "admin/product_edit_" ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="product_name" value="<?= $product['ten_sp'] ?>">
            </div>
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Giá</label>
                <input type="number" class="form-control" name="product_price" value="<?= $product['gia'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Giá khuyến mãi</label>
                <input type="number" class="form-control" name="product_discount" value="<?= $product['gia_km'] ?>">
            </div>
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Thời gian</label>
                <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" name="product_time">
            </div>
        </div>
        <div class="row">
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Trạng thái</label>
                <div class="">
                    <input type="radio" value="0" name="anhien" <?= $product['anhien'] == 0 ? 'checked' : '' ?>> Ẩn
                    <input type="radio" value="1" name="anhien" <?= $product['anhien'] == 1 ? 'checked' : '' ?>> Hiện
                </div>
            </div>
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Nổi bật</label>
                <div class="">
                    <input type="radio" value="0" name="hot" <?= $product['hot'] == 0 ? 'checked' : '' ?>> Bình thường
                    <input type="radio" value="1" name="hot" <?= $product['hot'] == 1 ? 'checked' : '' ?>> Nổi bật
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="product_image">
                <input type="hidden" value="<?= $product['hinh'] ?>" class="form-control" name="old_product_image">
                <i><?= 'Tên hình: ' . $product['hinh'] ?></i>
            </div>
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Mã loại</label>
                <select class="form-select" name="id_loai">
                    <?php foreach ($this->listloai as $loai) : ?>
                        <option value="<?= $loai['id_loai'] ?>" <?= $loai['id_loai'] == $product['id_loai'] ? 'selected' : '' ?>>
                            <?= $loai['ten_loai'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-outline mb-2">
            <label class="form-label">Mô tả</label>
            <textarea class="form-control" id="mota" name="product_mota" cols="30" rows="2"><?= $product['mota'] ?></textarea>
        </div>
        <div class="status-form ">
            <?php if (strlen($this->messager_error)) echo "<p>" . $this->messager_error . "</p>" ?>
        </div>
        <input type="hidden" name="product_id" value="<?= $product['id_sp'] ?>">
        <button class="btn mt-3" type="submit">Thêm sản phẩm</button>
    </form>
</div>
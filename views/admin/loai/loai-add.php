<div class="container form-container p-4">
    <h5>Thêm sản phẩm</h5>
    <form action="<?= ROOT_URL . "admin/loai_add_" ?>" method="post">
        <div class="row">
            <div class="form-outline col-md-6 mb-4 mb-2">
                <label class="form-label">Tên loại</label>
                <input class="form-control" type="text" name="ten_loai">
            </div>
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Thứ tự</label>
                <input class="form-control" type="text" name="thu_tu">
            </div>
        </div>
        <div class="form-outline mb-2">
            <label class="form-label">Ẩn hiện</label>
            <div class="">
                <input type="radio" value="1" name="an_hien" checked> Hiện
                <input type="radio" value="0" name="an_hien"> Ẩn
            </div>
        </div>
        <div class="status-form ">
            <?php if (strlen($this->messager_error)) echo "<p>" . $this->messager_error . "</p>" ?>
        </div>
        <button class="btn mt-3" type="submit">Thêm loại</button>
    </form>
</div>
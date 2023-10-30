<div class="container form-container p-4">
    <h5>Sửa bài viết</h5>
    <form action="<?= ROOT_URL . "admin/baiviet_edit_" ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" name="bv_title" value="<?=$baiviet['tieu_de']?>">
            </div>
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="bv_image">
                <input type="hidden" class="form-control" name="bv_image_old" value="<?=$baiviet['hinh']?>">
            </div>
        </div>
        <div class="row">
        <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Ngày</label>
                <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" name="bv_date">
            </div>
            <div class="form-outline col-md-6 mb-4">
                <label class="form-label">Trạng thái</label>
                <div class="">
                    <input type="radio" value="1" <?= $baiviet['anhien'] == 1 ? 'checked' : '' ?> name="anhien" checked> Hiện
                    <input type="radio" value="0" <?= $baiviet['anhien'] == 0 ? 'checked' : '' ?> name="anhien"> Ẩn
                </div>
            </div>
        </div>
        <div class="form-outline mb-2">
            <label class="form-label">Nội dung</label>
            <textarea class="form-control" id="mota" name="bv_content" cols="30" rows="2"><?= $baiviet['noi_dung']?></textarea>
        </div>
        <div class="status-form ">
            <?php if (strlen($this->messager_error)) echo "<p>" . $this->messager_error . "</p>" ?>
        </div>
        <input type="hidden" name="id_bv" value="<?= $baiviet['id_bv']?>">
        <button class="btn mt-3" type="submit">Sửa bài viết</button>
    </form>
</div>
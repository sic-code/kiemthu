<table class="table table-light table-hover table-bordered w-100">
    <thead class="table-dark">
        <th></th>
        <th>#</th>
        <th class="product_name">Tên Sản phẩm</th>
        <th>Loại</th>
        <th>Giá</th>
        <th>Giá Khuyến mãi</th>
        <th>Ngày</th>
        <th>Lượt Xem</th>
        <th>Hot</th>
        <th>Trạng thái</th>
        <th>Mô tả</th>
        <th>Tác vụ</th>
    </thead>
    <tbody>
        <?php foreach ($product_list as $item) : ?>
        <tr>
            <th><input type="checkbox"></th>
            <th><?= $item['id_sp'] ?></th>
            <td><?= $item['ten_sp'] ?></td>
            <td><?= $this->model->layTenLoai($item['id_loai']) ?></td>
            <td><?= number_format($item['gia'], "0", "", "."); ?></td>
            <td><?= number_format($item['gia_km'], "0", "", "."); ?></td>
            <td><?= date('d-m-Y', strtotime($item['ngay'])) ?></td>
            <td><?= $item['soluotxem'] ?></td>
            <td><?= $item['hot'] == 0 ? "Bình thường" : "Hot" ?></td>
            <td><?= $item['anhien'] == 0 ? "Ẩn" : "Hiện" ?></td>
            <td title="<?= $item['mota'] ?>" class="text-compact"><?= $item['mota'] ?></td>
            <td>
                <div class="tacvu d-flex justify-content-sm-between p-1">
                    <a href="<?= ROOT_URL . "admin/product_edit?id=" . $item['id_sp'] ?>"><i
                            class="fa-edit fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm('Bạn có chắc muốn xóa')"
                        href="<?= ROOT_URL . "admin/product_delete?id=" . $item['id_sp'] ?>"><i
                            class="fa-delete fa-solid fa-trash"></i></i></a>

                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="pagination">
    <?php if ($pageNum >= 2) { ?>
    <a href="<?= ROOT_URL . "admin/product?page=1" ?>"><i class="fa-solid fa-chevrons-left"></i></a>
    <?php } ?>
    <?php if ($pagePrev >= 1) { ?>
    <a href="<?= ROOT_URL . "admin/product?page=$pagePrev" ?>"><i class="fa-solid fa-chevron-left"></i></a>
    <?php } ?>

    <!-- xử lý số lượng page  -->
    <?php
    $maxVisiblePages = 12; // Số lượng trang tối đa bạn muốn hiển thị
    $halfMaxVisiblePages = floor($maxVisiblePages / 2); //6 page cho mỗi bên
    // 
    for ($i = max(1, $pageNum - $halfMaxVisiblePages); $i <= min($page_total, $pageNum + $halfMaxVisiblePages); $i++) {
    ?>
    <a href="<?= ROOT_URL . "admin/product?page=$i" ?>"><?= $i ?></a>
    <?php } ?>
    <!-- sử lý số lượng page  -->

    <?php if ($pageNext < $page_total) { ?>
    <a href="<?= ROOT_URL . "admin/product?page=$pageNext" ?>"><i class="fa-solid fa-chevron-right"></i></a>
    <?php } ?>
    <?php if ($pageNum < $page_total) { ?>
    <a href="<?= ROOT_URL . "admin/product?page=$page_total" ?>"><i class="fa-solid fa-chevrons-right"></i></a>
    <?php } ?>
</div>
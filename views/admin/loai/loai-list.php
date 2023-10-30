<style>
table>thead,
tbody {
    font-size: 14px;
    white-space: nowrap;
}

.text-compact {
    max-width: 150px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.tacvu .fa-delete {
    color: red;
}

#pagination {
    max-width: 500px;
    overflow: hidden;
    margin: 10px auto;
    text-align: center;
    font-size: 12px;
}

#pagination a {
    text-decoration: none;
    color: #000;
    font-weight: 500;
    margin: 2px;
    padding: 2px;
}

#pagination a:hover {
    color: darkblue;
    text-decoration: underline;
}

.dropdown .btn-dropdown {
    text-decoration: none;
    background: #fff;
    width: 200px;
    height: 34px;
    border: 1px solid gray;

}

.dropdown-menu {
    width: 200px;
}

#myDropdown {
    display: none;
    background: #fff;
    width: 200px;
    top: 36px;
}

#myDropdown a:hover {
    background: #ddd;
}

.tacvu-column,
.checkbox {
    width: 100px;
}
</style>
<table class="table table-light table-hover table-bordered w-100">
    <h5>Danh sách loại</h5>
    <hr>
    <thead class="table-dark">
        <th class="checkbox text-center"></th>
        <th>#</th>
        <th class="product_name">Tên loại</th>
        <th>Thứ tự</th>
        <th>Ẩn hiện</th>
        <th class="tacvu-column">Tác vụ</th>
    </thead>
    <tbody>
        <?php foreach ($list_loai as $item) : ?>
        <tr>
            <th><input type="checkbox"></th>
            <th><?= $item['id_loai'] ?></th>
            <td><?= $item['ten_loai'] ?></td>
            <td><?= $item['thutu'] ?></td>
            <td><?= $item['anhien'] == 0 ? "Ẩn" : "Hiện"; ?></td>
            <td>
                <div class="tacvu d-flex justify-content-evenly p-1">
                    <a href="<?= ROOT_URL . "admin/loai_edit?id=" . $item['id_loai'] ?>"><i
                            class="fa-edit fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm('Bạn có chắc muốn xóa')"
                        href="<?= ROOT_URL . "admin/loai_delete?id=" . $item['id_loai'] ?>"><i
                            class="fa-delete fa-solid fa-trash"></i></i></a>

                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="pagination">
    <?php if ($pageNum >= 2) { ?>
    <a href="<?= ROOT_URL . "admin/loai?page=1" ?>"><i class="fa-solid fa-chevrons-left"></i></a>
    <?php } ?>
    <?php if ($pagePrev >= 1) { ?>
    <a href="<?= ROOT_URL . "admin/loai?page=$pagePrev" ?>"><i class="fa-solid fa-chevron-left"></i></a>
    <?php } ?>

    <!-- xử lý số lượng page  -->
    <?php
    $maxVisiblePages = 12; // Số lượng trang tối đa bạn muốn hiển thị
    $halfMaxVisiblePages = floor($maxVisiblePages / 2); //6 page cho mỗi bên
    // 
    for ($i = max(1, $pageNum - $halfMaxVisiblePages); $i <= min($page_total, $pageNum + $halfMaxVisiblePages); $i++) {
    ?>
    <a href="<?= ROOT_URL . "admin/loai?page=$i" ?>"><?= $i ?></a>
    <?php } ?>
    <!-- sử lý số lượng page  -->

    <?php if ($pageNext < $page_total) { ?>
    <a href="<?= ROOT_URL . "admin/loai?page=$pageNext" ?>"><i class="fa-solid fa-chevron-right"></i></a>
    <?php } ?>
    <?php if ($pageNum < $page_total) { ?>
    <a href="<?= ROOT_URL . "admin/loai?page=$page_total" ?>"><i class="fa-solid fa-chevrons-right"></i></a>
    <?php } ?>
</div>
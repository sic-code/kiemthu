<table class="table table-light table-hover table-bordered w-100">
    <thead class="table-dark">
        <th>#</th>
        <th class="product_name">Tiêu đề</th>
        <th >Hình</th>
        <th >Ngày</th>
        <th >Số lượt xem</th>
        <th >Nội Dung</th>
        <th >Ẩn hiện</th>
        <th >Tác vụ</th>

    </thead>
    <tbody>
        <?php foreach ($list_bv as $item) : ?>
        <tr>
            <th><?= $item['id_bv'] ?></th>
            <th><?= $item['tieu_de'] ?></th>
            <th><?= $item['hinh'] ?></th>
            <th><?= $item['ngay'] ?></th>
            <th><?= $item['so_luot_xem'] ?></th>
            <td><?= $item['anhien'] == 0 ? "Ẩn" : "Hiện" ?></td>
            <td title="<?= $item['noi_dung'] ?>" class="text-compact"><?= $item['noi_dung'] ?></td>
            <td>
                <div class="tacvu d-flex justify-content-sm-between p-1">
                    <a href="<?= ROOT_URL . "admin/baiviet_edit?id=" . $item['id_bv'] ?>"><i
                            class="fa-edit fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm('Bạn có chắc muốn xóa')"
                        href="<?= ROOT_URL . "admin/baiviet_delete?id=" . $item['id_bv'] ?>"><i
                            class="fa-delete fa-solid fa-trash"></i></i></a>

                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
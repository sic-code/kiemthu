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
    <h5>Danh sách người dùng</h5>
    <hr>
    <thead class="table-dark">
        <th>#</th>
        <th class="product_name">Họ tên</th>
        <th>Mật khẩu</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Hình ảnh</th>
        <th>Vai trò</th>
        <th>Trạng thái</th>
        <th class="tacvu-column">Tác vụ</th>
    </thead>
    <tbody>
        <?php foreach ($user_list as $item) : ?>
        <tr>
            <td><?= $item['id_user'] ?></td>
            <td><?= $item['hoten'] ?></td>
            <td class="text-compact"><?= $item['matkhau'] ?></td>
            <td><?= $item['email'] ?></td>
            <td><?= $item['diachi'] ?></td>
            <td><?= $item['dienthoai'] ?></td>
            <td><?= $item['hinh'] ?></td>
            <td><?= $item['vaitro'] == 1 ? "Admin" : "Người dùng" ?></td>
            <td><?= $item['trangthai'] == 1 ? "Kích hoạt" : "Chưa kích hoạt" ?></td>
            <td>
                <div class="tacvu d-flex justify-content-evenly p-1">
                    <a href="<?= ROOT_URL . "admin/user_edit?id=" . $item['id_user'] ?>"><i
                            class="fa-edit fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm('Bạn có chắc muốn xóa')"
                        href="<?= ROOT_URL . "admin/user_delete?id=" . $item['id_user'] ?>"><i
                            class="fa-delete fa-solid fa-trash"></i></i></a>

                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
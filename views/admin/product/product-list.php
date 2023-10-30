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
</style>
<div id="product-list">
    <h5>Danh sách sản phẩm</h5>
    <hr>
    <div class="filter d-flex justify-content-between mb-3">
        <div class="filter-left">
            <div class="dropdown">
                <button class="dropdown-toggle btn-dropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Xếp theo loại
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= ROOT_URL . "admin/product" ?>">Tất cả</a></li>
                    <?php foreach ($this->listloai as $loai) : ?>
                    <li><a class="dropdown-item"
                            href="<?= ROOT_URL . "admin/product?id=" . $loai['id_loai'] ?>"><?= $loai['ten_loai'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="filter-right">
            <div class="dropdown">
                <button class="btn-dropdown" id="dropdownButton">Sắp xếp <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content text-center position-absolute" id="myDropdown">
                    <a class="dropdown-item py-2" href="<?= ROOT_URL . "admin/product?sort=dateAsc" ?>">Cũ nhất</a>
                    <a class="dropdown-item py-2" href="<?= ROOT_URL . "admin/product?sort=dateDesc" ?>">Mới nhất</a>
                    <a class="dropdown-item py-2" href="<?= ROOT_URL . "admin/product?sort=priceDesc" ?>">Giá
                        giảmdần</a>
                    <a class="dropdown-item py-2" href="<?= ROOT_URL . "admin/product?sort=priceAsc" ?>">Giá tăng
                        dần</a>
                </div>
            </div>
        </div>
    </div>
    <?php include "$viewlist" ?>

</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const dropdownButton = document.getElementById("dropdownButton");
    const myDropdown = document.getElementById("myDropdown");

    myDropdown.addEventListener("click", function(e) {
        if (e.target.tagName === "A") {
            const selectedOption = e.target;
            const selectedValue = selectedOption.getAttribute("data-value");

            // Di chuyển tùy chọn đã chọn lên đầu
            myDropdown.removeChild(selectedOption);
            myDropdown.insertBefore(selectedOption, myDropdown.firstChild);

            // Đóng dropdown sau khi chọn
            dropdownButton.textContent = selectedOption.textContent;
            myDropdown.style.display = "none";
        }
    });

    dropdownButton.addEventListener("click", function() {
        myDropdown.style.display = (myDropdown.style.display === "none") ? "block" : "none";
    });
});
</script>
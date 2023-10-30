document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownButton");
    const myDropdown = document.getElementById("myDropdown");

    myDropdown.addEventListener("click", function (e) {
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

    dropdownButton.addEventListener("click", function () {
        myDropdown.style.display = (myDropdown.style.display === "block") ? "none" : "block";
    });
});

// tinymce
tinymce.init({
    selector: 'textarea#mota',
    width: '100%',
    height: 300,
    plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons',
    menu: {
        favs: { title: 'menu', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
});
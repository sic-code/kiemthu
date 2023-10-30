<!DOCTYPE html>
<html lang="en">
<?php
if ($_SESSION['user']['vaitro'] == 0) {
    header("location:" . ROOT_URL . "login");
}
?>

<head>
    <meta charset="UTF-8" />
    <title><?= $titlePage ?></title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>bootstrap/css/bootstrap.min.css">
    <script src="<?= PUBLIC_URL ?>bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>Font-Awesome-640/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>css/admin.css">

</head>


<body>
    <div ìd="container" class="container-fluid">
        <nav><?= include "menu.php"; ?></nav>

        <main class="main">
            <div class="main-top d-flex justify-content-between align-items-center w-100">
                <i class="fa-solid fa-magnifying-glass"></i>
                <div class="top-right">
                    <i class="fa-solid fa-user me-2"></i>Xin chào! <?= $_SESSION['user']?$_SESSION['user']['hoten']:''?>
                    <i class="fa-solid fa-right-from-bracket me-2"></i><a href="<?=ROOT_URL. 'logout'?>">Logout</a>
                </div>
            </div>
            <section class="main-content">
                <?php include "$viewnoidung" ?>
            </section>
        </main>
    </div>
</body>
<script src="<?= PUBLIC_URL ?>tinymce/tinymce.min.js"></script>
<script src="<?= PUBLIC_URL ?>js/admin.js"></script>

</html>
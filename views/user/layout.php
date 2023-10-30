<head>
    <meta charset="utf8" />
    <title><?php echo $titlePage; ?></title>
    <link rel="stylesheet" href="<?=PUBLIC_URL?>bootstrap/css/bootstrap.min.css">
    <script src="<?=PUBLIC_URL?>bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="<?=PUBLIC_URL?>Font-Awesome-640/css/all.css">
    <link href="<?= PUBLIC_URL ?>css/c1.css" rel="stylesheet">
</head>

<body>
    <div id="container" class="container-fluid" >
        <header> <?php include "header.php"; ?> </header>
        <nav> <?php include "menu.php"; ?> </nav>
        <main>
            <article><?php include $viewnoidung; ?></article>
        </main>
        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </div>
</body>
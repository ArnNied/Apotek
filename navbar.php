<?php

$id = $_SESSION['user']['id'];

$current_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `role` FROM `users` WHERE `id` = $id"));

?>

<nav class="navbar navbar-expand-lg navbar-dark blue fixed-top">
    <img src="img/Apotek Logo.png" class="navbar-brand" width=50>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="produk.php?page=1">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profil.php">Profil</a>
            </li>
            <?php if($current_user['role'] == 1): ?>
            <li class="nav-item">
                <a class="nav-link" href="tambah_produk.php">+ Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="system/switch.php">Switch to
                    <?php if($_SESSION['user']['role'] == 1): ?>
                    USER
                    <?php else: ?>
                    ADMIN
                    <?php endif; ?>
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="system/user/logout.php">Logout</a>
            </li>
        </ul>
        <a class="btn btn-success btn-md ml-auto mr-5 px-5" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
    </div>
</nav>
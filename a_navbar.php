<?php

session_start();

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
} else if($_SESSION['role'] != 1) {
    header('Location: produk.php');
}

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
                <a class="nav-link" href="a_produk.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tambah_produk.php">+ Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="system/logout.php">Logout</a>
            </li>
        </ul>
        <button class="btn btn-success btn-md ml-auto mr-5 px-5">CART</button>
    </div>
</nav>
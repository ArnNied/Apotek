<?php

session_start();

if($_SESSION['user']['role'] == 1){
    $_SESSION['user']['role'] = 0;
} else {
    $_SESSION['user']['role'] = 1;
}

header("Location: ../produk.php")

?>
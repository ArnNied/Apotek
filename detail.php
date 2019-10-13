<?php

require "system/conn.php";

session_start();

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
}

$id = $_GET['id'];
$items = query("SELECT * FROM produk WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css">

    <title>Apotek | Detail</title>
</head>

<body>

</body>
<?php include "navbar.php" ?>
<div class="pt-3">
    <div class="container-fluid mt-5 aqua-gradient">
        <div class="row">
            <div class="col-11 pb-3 mx-auto bg-white">
                <div class="col-12 p-0">
                    <?php foreach( $items as $item ): ?>
                    <div class="card col-12">
                        <img class="card-img-top mx-auto" src="img/<?= $item['gambar'] ?>"
                            alt="<?= $item['nama_produk'] ?>" style="width: 300px;">
                        <div class="card-body text-center">
                            <h4 class="card-title"><?= $item['nama_produk'] ?></h4>
                            <ul class="list-unstyled">
                                <li class="nav-item font-weight-bold">Deskripsi:</li>
                                <li class="nav-item"><?= $item['deskripsi'] ?></li>
                                <li class="nav-item font-weight-bold">Takaran:</li>
                                <li class="nav-item"><?= $item['takaran'] ?></li>
                                <li class="nav-item font-weight-bold">Harga:</li>
                                <li class="nav-item"><?= $item['harga'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include "footer.php" ?>

</html>
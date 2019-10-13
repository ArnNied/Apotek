<?php

require "system/conn.php";

session_start();

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
} else if($_SESSION['role'] != 1) {
    header('Location: produk.php');
}

$id = $_GET['id'];
$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id = $id"));


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

    <title>Apotek | Update</title>
</head>

<body class="aqua-gradient">
    <?php include "a_navbar.php" ?>
    <div class="pt-3">
        <div class="container-fluid mt-1">
            <div class="row">
                <div class="col-11 py-3 mx-auto bg-white">
                    <div class="row">
                        <div class="col-6 p-0">
                            <div class="card col-12 shadow-none">
                                <img class="card-img-top mx-auto" src="img/<?= $item['gambar'] ?>"
                                    alt="<?= $item['nama_produk'] ?>" style="width: 300px;">
                                <div class="card-body">
                                    <h4 class="card-title text-center"><?= $item['nama_produk'] ?></h4>
                                    <ul class="list-unstyled">
                                        <li class="nav-item font-weight-bold">Deskripsi:</li>
                                        <li class="nav-item"><?= $item['deskripsi'] ?></li>
                                        <li class="nav-item font-weight-bold">Takaran:</li>
                                        <li class="nav-item"><?= $item['takaran'] ?></li>
                                        <li class="nav-item font-weight-bold">Harga:</li>
                                        <li class="nav-item"><?= $item['harga'] ?></li>
                                        <li class="nav-item font-weight-bold">QTY:</li>
                                        <li class="nav-item"><?= $item['qty'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-5">
                            <h2 class="text-center">UPDATE</h2>
                            <form action="system/update.php" method="post" enctype="multipart/form-data">
                                <div class="form-group my-4 mx-auto">
                                    <input class="form-control my-3" type="text" placeholder="Nama Produk"
                                        name="nama_produk" value="<?= $item['nama_produk'] ?>" required>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01" name="gambar">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                    <textarea class="form-control my-3" type="text" placeholder="Deskripsi"
                                        name="deskripsi" autocomplete="off"
                                        required><?= $item['deskripsi'] ?></textarea>
                                    <input class="form-control my-3" type="text" placeholder="Takaran" name="takaran"
                                        autocomplete="off" value="<?= $item['takaran'] ?>" required>
                                    <input class="form-control my-3" type="text" placeholder="Harga" name="harga"
                                        autocomplete="off" value="<?= $item['harga'] ?>" required>
                                    <input class="form-control my-3" type="number" placeholder="QTY" name="qty"
                                        autocomplete="off" value="<?= $item['qty'] ?>" required>
                                    <button class="btn btn-danger mx-auto mt-3 w-100" type="submit" name="update"
                                        value="<?= $item['id'] ?>">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include "footer.php" ?>
</body>

</html>
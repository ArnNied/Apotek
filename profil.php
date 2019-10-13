<?php

require 'system/conn.php';

session_start();

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
}

$email = $_SESSION['email'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js">
    </script>

    <title>Apotek | Profil</title>
</head>

<body class="aqua-gradient">
    <?php include "navbar.php" ?>
    <div class="pt-3">
        <div class="container-fluid mt-1">
            <div class="row">
                <div class="col-11 py-3 mx-auto bg-white">
                    <div class="row">
                        <div class="col-6 p-0">
                            <div class="card col-12 mt-5 shadow-none">
                                <img class="card-img-top mx-auto" src="img/<?= $user['gambar'] ?>"
                                    alt="<?= $user['nama'] ?>" style="width: 300px;">
                                <div class="card-body">
                                    <h4 class="card-title text-center"><?= $user['nama'] ?></h4>
                                    <ul class="list-unstyled">
                                        <li class="nav-item font-weight-bold">Umur:</li>
                                        <li class="nav-item"><?= $user['umur'] ?></li>
                                        <li class="nav-item font-weight-bold">Jenis Kelamin:</li>
                                        <li class="nav-item"><?= $user['jenis_kelamin'] ?></li>
                                        <li class="nav-item font-weight-bold">Alamat:</li>
                                        <li class="nav-item"><?= $user['alamat'] ?></li>
                                        <li class="nav-item font-weight-bold">E-mail:</li>
                                        <li class="nav-item"><?= $user['email'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-5">
                            <h2 class="text-center">UPDATE</h2>
                            <form action="system/update.php" method="post" enctype="multipart/form-data">
                                <div class="form-group my-4 mx-auto">
                                    <input class="form-control my-3" type="text" placeholder="Nama Lengkap" name="nama"
                                        value="<?= $user['nama'] ?>" required>

                                    <input class="form-control my-3" type="number" placeholder="Umur" name="umur"
                                        autocomplete="off" value="<?= $user['umur'] ?>" required>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="defaultInline1"
                                            name="jenis_kelamin" value="Laki-laki" checked>
                                        <label class="custom-control-label" for="defaultInline1">Laki-laki</label>
                                    </div>

                                    <!-- Default inline 2-->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="defaultInline2"
                                            name="jenis_kelamin" value="Perempuan">
                                        <label class="custom-control-label" for="defaultInline2">Perempuan</label>
                                    </div>

                                    <input class="form-control my-3" type="text" placeholder="Alamat" name="alamat"
                                        autocomplete="off" value="<?= $user['alamat'] ?>" required>
                                    <input class="form-control my-3" type="text" placeholder="E-mail" name="email"
                                        autocomplete="off" value="<?= $user['email'] ?>" required>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01" name="gambar">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                    </div>
                                    <button class="btn btn-danger mx-auto mt-3 w-100" type="submit" name="update"
                                        value="<?= $user['id'] ?>">UPDATE</button>
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
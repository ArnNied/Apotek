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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">

    <title>Apotek | Profil</title>
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="container-fluid aqua-gradient mt-1">
        <div class="row">
            <div class="col-11 py-5 mx-auto bg-white">
                <div class="row">
                    <div class="col-6 p-0">
                        <div class="card col-12 mt-5 shadow-none">
                            <img class="card-img-top mx-auto" src="img/users/<?= $user['gambar'] ?>"
                                alt="<?= $user['nama'] ?>" style="width: 300px; height: 300px;">
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
                        <h2 class="text-center">PROFILE</h2>
                        <form action="system/profil_update.php" method="post" enctype="multipart/form-data">
                            <div class="form-group my-4 mx-auto">
                                <input class="form-control my-3" type="text" placeholder="Nama Lengkap" name="nama"
                                    value="<?= $user['nama'] ?>">

                                <input class="form-control my-3" type="number" placeholder="Umur" name="umur"
                                    autocomplete="off" value="<?= $user['umur'] ?>">

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
                                    autocomplete="off" value="<?= $user['alamat'] ?>">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" name="gambar">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                </div>
                                <button class="btn btn-danger mx-auto mt-3 w-100" type="submit" name="update"
                                    value="<?= $user['id'] ?>">UPDATE</button>
                            </div>
                        </form>
                        <h3 class="text-center">EMAIL & PASSWORD</h3>
                        <form action="system/cred_update.php" method="post">
                            <div class="form-group my-4 mx-auto">
                                <input class="form-control my-3" type="text" placeholder="E-mail" name="email"
                                    autocomplete="off" value="<?= $user['email'] ?>" required>
                                <input class="form-control my-3" type="password" placeholder="New password (Optional)"
                                    name="new_password" autocomplete="off">
                                <input class="form-control my-3" type="password" placeholder="Confirm new password"
                                    name="cnew_password" autocomplete="off">
                                <input class="form-control my-3" type="password"
                                    placeholder="Current password (Required)" name="cur_password" autocomplete="off"
                                    required>
                                <button class="btn btn-danger mx-auto mt-3 w-100" type="submit" name="update"
                                    value="<?= $user['id'] ?>">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>

</html>
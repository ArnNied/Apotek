<?php

require "system/conn.php";

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

    <title>Apotek</title>
</head>

<body class="aqua-gradient">

    <div class="container-fluid">

        <!-- <div class="row">
            <div class="purple-bg">
                <img src="img/Apotek.jpg" class="col-12 vh-100 p-5">
            </div>
        </div> -->

        <div class="row my-3">

            <div class="card-deck mx-auto text-center">
                <div class="card shadow-sm pt-5">
                    <img src="img/coins.png" class="mx-auto" width="200">
                    <div class="card-body">
                        <h4 class="card-title"><b>CHEAP</b></h4>
                        <p class="card-text">
                            Produk kami dijual dengan harga yang terjangkau bagi semua masyarakat
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm pt-5">
                    <img src="img/clock.png" class="mx-auto" width="200">
                    <div class="card-body">
                        <h4 class="card-title"><b>FAST</b></h4>
                        <p class="card-text">
                            Produk kami akan diantar dengan waktu sesingkat mungkin dengan personel
                            yang ahli sehingga kualitas produk terjaga
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm pt-5">
                    <img src="img/reliability.png" class="mx-auto" width="200">
                    <div class="card-body">
                        <h4 class="card-title"><b>RELIABLE</b></h4>
                        <p class="card-text">
                            Customer service kami siap membantu 24/7 dengan personel yang handal menangani segala
                            masalah
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-12">
                <div class="card-group text-center">

                    <div class="card p-3 shadow-none">
                        <div class="card-body">
                            <h2>REGISTRASI</h2>
                            <form action="system/register.php" method="post">
                                <div class="form-group my-4 mx-auto">
                                    <input class="form-control my-3" type="email" placeholder="E-Mail" name="email" autocomplete="off" required>
                                    <input class="form-control my-3" type="password" placeholder="Password"
                                        name="password" autocomplete="off" required>
                                    <input class="form-control my-3" type="password" placeholder="Confirm Password"
                                        name="cpassword" autocomplete="off" required>
                                    <button class="btn btn-primary mx-auto mt-3 w-100" type="submit">DAFTAR</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card p-3 shadow-none">
                        <div class="card-body">
                            <h2>LOGIN</h2>
                            <form action="system/login.php" method="post">
                                <div class="form-group my-4 mx-uto">
                                    <input class="form-control my-3" type="email" placeholder="E-Mail" name="email" autocomplete="off" required>
                                    <input class="form-control my-3" type="password" placeholder="Password"
                                        name="password" autocomplete="off" required>
                                    <button class="btn btn-primary mx-auto mt-3 w-100" type="submit" name="login">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <h2 class="text-center my-2">
                <i>
                    “Medicine is not a science; it is empiricism founded on a network of blunders.” - Emmet Densmore
                </i>
                <h2>
        </div>
        
    </div>
    <?php include "footer.php" ?>
</body>

</html>

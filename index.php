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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css">

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

    <title>Apotek</title>
</head>

<body>
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="purple-bg">
                <img src="img/Apotek.jpg" class="col-12 vh-100 p-5">
            </div>
        </div> -->
        <div class="row my-3">
            <div class="card-deck mx-auto text-center">
                <div class="card shadow-sm">
                    <img src="img/coins.png" class="card-img-top mx-auto h-50 w-50 p-5">
                    <div class="card-body">
                        <h4 class="card-title"><b>CHEAP</b></h4>
                        <p class="card-text">
                            Produk kami dijual dengan harga yang terjangkau bagi semua masyarakat
                        </p>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <img src="img/clock.png" class="card-img-top mx-auto h-50 w-50 p-5">
                    <div class="card-body">
                        <h4 class="card-title"><b>FAST</b></h4>
                        <p class="card-text">
                            Produk kami akan diantar dengan waktu sesingkat mungkin dengan personel
                            yang ahli sehingga kualitas produk terjaga
                        </p>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <img src="img/reliability.png" class="card-img-top mx-auto h-50 w-50 p-5">
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
                            <form>
                                <div class="form-group my-4 mx-auto">
                                    <input class="form-control my-3" type="text" placeholder="E-Mail" name="username">
                                    <input class="form-control my-3" type="password" placeholder="Password"
                                        name="password">
                                    <input class="form-control my-3" type="password" placeholder="Confirm Password"
                                        name="cpassword">
                                    <!-- <input class="form-control my-3" type="text" placeholder="Alamat" name="alamat">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                            class="custom-control-input" value="<?= "laki-laki" ?>" checked>
                                        <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                            class="custom-control-input" value="<?= "perempuan" ?>">
                                        <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                    </div> -->
                                    <button class="btn btn-primary mx-auto mt-3 w-100">DAFTAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card p-3 shadow-none">
                        <div class="card-body">
                            <h2>LOGIN</h2>
                            <form>
                                <div class="form-group my-4 mx-uto">
                                    <input class="form-control my-3" type="text" placeholder="E-Mail" name="username">
                                    <input class="form-control my-3" type="password" placeholder="Password"
                                        name="password">
                                    <button class="btn btn-primary mx-auto mt-3 w-100">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="text-center mb-3">
                <i>
                    “Medicine is not a science; it is empiricism founded on a
                    network
                    of blunders.” -
                    Emmet Densmore
                </i>
            <h2>
        </div>
        <?php include "footer.html" ?>
    </div>
</body>

</html>
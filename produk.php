<?php

require 'system/conn.php';

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: index.php');
}

$limit = 16;
$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk"));
$totalPage = ceil($total / $limit);
if(!isset($_GET['page'])){
    $_GET['page'] = 1;
}
$activePage = $_GET['page'];
$start = $limit * $activePage - $limit;

$items = query("SELECT * FROM `produk` LIMIT $start, $limit");

if( isset($_GET['keyword']) ) {
    $items = search($_GET['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css">

    <!-- JQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <!-- Popper.js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script> -->
    <!-- Bootstrap core JS-->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> -->
    <!-- MDB core JavaScript -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js">
    </script> -->

    <title>Apotek | Produk</title>
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="pt-3">
        <div class="container-fluid mt-5 aqua-gradient">
            <div class="row">
                <div class="col-11 pb-3 mx-auto bg-white">
                    <div class="col-12 mt-4">
                        <form class="form-inline my-2 my-lg-0" action="" method="get">
                            <input class="form-control ml-auto" type="search" placeholder="Search" aria-label="Search"
                                name="keyword">
                            <button class="btn btn-primary btn-md my-2 my-sm-0 ml-3" type="submit"
                                autocomplete="off">Search</button>
                        </form>
                    </div>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php if($_GET['page'] != 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <!-- <li class="page-item">
                                <a class="page-link" href="?page=<?= $activePage - 1?>" aria-label="Previous">
                                    <span aria-hidden="true">&lt;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li> -->
                            <?php endif; ?>

                            <?php for($i = 1; $i <= $totalPage; $i++): ?>
                            <?php if($i == $activePage): ?>
                            <li class="page-item active"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php else: ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php endif; ?>
                            <?php endfor; ?>
                            <?php if($_GET['page'] != $totalPage): ?>
                            <!-- <li class="page-item">
                                <a class="page-link" href="?page=<?= $activePage + 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&rt;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li> -->
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $totalPage ?>" aria-label="Previous">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <div class="col-12 p-0">
                        <?php foreach( $items as $item ): ?>
                        <div class="card col-sm-12 col-md-4 col-lg-3 mt-4 mx-1 float-left"
                            style="width: 18.0rem;">
                            <a class="btn btn-link p-0 mb-0 shadow-sm" href="detail.php?id=<?= $item['id'] ?>">
                                <img class="card-img-top" src="img/produk/<?= $item['gambar'] ?>"
                                    alt="<?= $item['nama_produk'] ?>" style="width: 250px; height: 250px;">
                                <div class="mask rgba-white-light"></div>
                            </a>
                            <div class="card-body">
                                <h4 class="card-title my-1"><?= $item['nama_produk'] ?></h4>
                                <ul class="list-unstyled">
                                    <li class="nav-item">Takaran: <?= $item['takaran'] ?></li>
                                    <li class="nav-item">Harga: Rp. <?= $item['harga'] ?></li>
                                    <li class="nav-item">QTY: <?= $item['qty'] ?></li>
                                </ul>
                                <?php if($_SESSION['user']['role'] == 1): ?>
                                <form action="system/product/delete.php" method="get">
                                    <button type="submit" class="btn btn-danger btn-md mx-auto" name="id"
                                        value="<?= $item['id'] ?>"
                                        onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                </form>
                                <?php else: ?>
                                <form action="system/product/cart.php" method="post">
                                    <input class="form-control mx-auto" type="number" placeholder="Jumlah" name="jumlah"
                                    autocomplete="off">
                                    <button type="submit" class="btn btn-success btn-md mx-auto w-100" name="cart"
                                        value="<?= $item['id'] ?>"><i class="fa fa-cart-plus"></i></button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include "footer.php" ?>
</body>

</html>
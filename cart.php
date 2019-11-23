<?php

require 'system/conn.php';

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: index.php');
    die;
}
// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
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
                    <table class="table table-striped table-hover">
                        <?php if(isset($_SESSION['cart'])): ?>
                        <thead class="black white-text">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($_SESSION['cart']['item'] as $item): ?>
                            <?php $i = 1 ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><img src="img/produk/<?= $item['gambar'] ?>" style="width: 60px; height: 60px;"></td>
                                <td><?= $item['nama_produk'] ?></td>
                                <td class="harga <?=$item['id']?>"><?= $item['harga'] ?></td>
                                <td class="qty <?=$item['id']?>"><?= $item['qty'] ?></td>
                                <td class="jumlah <?=$item['id']?>"><?= $item['total'] ?>
                                <!-- SCRIPT 1 -->
                                </td>
                            </tr>
                            <?php $i++ ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3"></td>
                                <td class="font-weight-bold">Total</td>
                                <td id="totalQty" class="font-weight-bold"><?= $_SESSION['cart']['total']['qty'] ?>
                                <!-- SCRIPT 2 -->
                                </td>
                                <td id="totalHarga" class="font-weight-bold"><?= $_SESSION['cart']['total']['harga'] ?>
                                <!-- SCRIPT 3 -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php else: ?>
                    
                    <script>
                    alert("No item have been added");
                    document.location.href = 'produk.php';
                    </script>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>

</body>

</html>

<!-- SCRIPT 1 -->
<!-- <script>
    var harga = document.getElementsByClassName('harga <?=$item['id']?>')[0].innerHTML;
    var qty = document.getElementsByClassName('qty <?=$item['id']?>')[0].innerHTML;
    document.getElementsByClassName('jumlah <?=$item['id']?>')[0].innerHTML = parseInt(harga)*parseInt(qty);
    </script> -->

<!-- SCRIPT 2 -->
<!-- <script>
    var produkQty = document.getElementsByClassName('qty');
    var item = [];
    for(var i = 0; i < produkQty.length; i++){
        item[i] = parseInt(produkQty[i].innerHTML);
    }
    totalQty = item.reduce((a,b) => a + b, 0);
    document.getElementById('totalQty').innerHTML = totalQty;
    </script> -->
                        
<!-- SCRIPT 3 -->
<!-- <script>
    var produkHarga = document.getElementsByClassName('jumlah');
    var item = [];
    for(var i = 0; i < produkHarga.length; i++){
        item[i] = parseInt(produkHarga[i].innerHTML);
    }
    totalHarga = item.reduce((a,b) => a + b, 0);
    document.getElementById('totalHarga').innerHTML = totalHarga;
</script> -->
<?php 

$conn = new mysqli('localhost', 'root', '', 'apotek_ol');

if($conn->connect_error){
    echo "Error: ".$conn->connect_error;
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function search($data) {
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$data%'";

    return query($query);
}
?>
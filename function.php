<?php

$conn = mysqli_connect("localhost", "root", "", "apotek_ol");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah_produk($data) {
    global $conn;

    $nama_produk = htmlspecialchars($data['nama_produk']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $takaran = htmlspecialchars($data['takaran']);
    $harga = htmlspecialchars($data['harga']);
    $qty = htmlspecialchars($data['qty']);

    $gambar = upload();

    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO produk VALUES ('', '$nama_produk', '$gambar', '$deskripsi', '$takaran', '$harga', '$qty')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data, $admin) {
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $umur = htmlspecialchars($data['umur']);
    $kelamin = htmlspecialchars($data['kelamin']);
    $alamat = htmlspecialchars($data['alamat']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $query = "INSERT INTO user VALUES ('', '$admin', '$nama', '$umur', '$kelamin', '$alamat', '$email', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function login($data) {
    global $conn;

    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    mysqli_query($conn, $query);
    
    $users = query($query);

    foreach( $users as $user ) {
        if( $user['admin'] == 1 ) {
            return 1;
        } else if( $user['admin'] == 0) {
            return -1;
        } else {
            return 0;
        }
    }
}

function update($id, $data) {

    global $conn;

    $nama_produk = htmlspecialchars($data['nama_produk']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $takaran = htmlspecialchars($data['takaran']);
    $harga = htmlspecialchars($data['harga']);
    $qty = htmlspecialchars($data['qty']);

    $query = "UPDATE produk SET nama_produk = '$nama_produk', gambar = '$gambar', deskripsi = '$deskripsi', takaran = '$takaran', harga = '$harga', qty = '$qty' WHERE id = $id";
    
    mysqli_query($conn, $query);
}
function delete($db, $data) {

    global $conn;

    $id = $data['delete'];
    mysqli_query($conn, "DELETE FROM $db WHERE id = '$id'");

}

function search($data) {
    global $conn;

    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$data%'";

    return query($query);
}

function upload() {

    $name = $_FILES['gambar']['name'];
    $error = $_FILES['gambar']['error'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if( $error === 4){

    }

    $ekstensi = ['jpg', 'jpeg', 'png'];
    $gambar = explode('.', $name);
    $gambar = end($gambar);

    if( !in_array($gambar, $ekstensi) ) {
        echo "<script> alert('File bukan gambar')";
        return false;
    }

    $name = uniqid() . "." . $gambar;

    move_uploaded_file($tmp, "img/".$name);

    return $name;

}

function logout() {

    session_start();
    session_unset();
    session_destroy();

}

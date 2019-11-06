<?php 

require 'conn.php';

$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

if(mysqli_affected_rows($conn) > 0) {
    
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));

    if(password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['role'] = $user['role'];
        header("Location: ../produk.php");
    } else {
        echo "<script> alert('Incorrect password'); document.location.href = '../profil.php' </script>";
    }
} else {
    echo "<script> alert('User not found!'); document.location.href = '../index.php' </script>";
}

?>

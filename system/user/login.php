<?php 

require '../conn.php';

session_start();
if(isset($_SESSION['user'])) {
    header("Location: ../../produk.php");
}

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

    mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'");

    if(mysqli_affected_rows($conn) > 0) {
    
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'"));

        if(password_verify($password, $user['password'])) {
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['email'] = $user['email'];
            $_SESSION['user']['role'] = $user['role'];
            header("Location: ../../produk.php");
        } else {
            echo "<script> alert('Incorrect password'); document.location.href = '../../index.php' </script>";
        }
    } else {
        echo "<script> alert('User not found!'); document.location.href = '../../index.php' </script>";
    }
} else {
    header("Location: ../../index.php");
}
?>

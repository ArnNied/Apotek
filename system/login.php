<?php 

require 'conn.php';

$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

$query = "SELECT * FROM users WHERE email = '$email'";
mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) > 0) {
    session_start();
    $user = mysqli_fetch_assoc(mysqli_query($conn, $query));

    if(password_verify($password, $user['password']) && $user['role'] == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $user['role'];
        header("Location: ../a_produk.php");
    } else if(password_verify($password, $user['password']) && $user['role'] == 0) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $user['role'];
        header("Location: ../produk.php");
    } else {
        echo "<script> alert('Incorrect password'); document.location.href = '../profil.php' </script>";
    }

} else {
    echo "<script> alert('User not found!'); document.location.href = '../index.php' </script>";
}

?>

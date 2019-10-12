<?php 

require 'conn.php';

global $conn;

$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

$query = "SELECT * FROM users WHERE email = '$email'";
mysqli_query($conn, $query);

// $stmt = $conn->prepare($query);
// // var_dump($conn->prepare($query)); die;
// $stmt->bind_param("s", $email);
// $stmt->execute();

if(mysqli_affected_rows($conn) > 0) {
    $users = query($query);

    foreach($users as $user) {
        if(password_verify($password, $user['password']) && $user['role'] == 1) {
            header("Location: ../a_produk.php");
        } else if(password_verify($password, $user['password']) && $user['role'] == 0) {
            header("Location: ../produk.php");
        }
    }    
} else {
    echo "<script> alert('User not found!'); document.location.href = '../index.php' </script>";
}

?>

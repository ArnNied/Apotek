<?php 

include 'conn.php';

global $conn;

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
// var_dump($conn->prepare($query)); die;
$stmt->bind_param("s", $email);
$stmt->execute();

if(mysqli_affected_rows($conn) > 0) {
    $users = query($query);
    foreach($users as $user) {
        if($password == $user['password'] && $user['role'] == 1) {
            header("Location: ../a_produk.php");
        } else if($password == $user['password'] && $user['role'] == 0) {
            header("Location: ../produk.php");
        }
    }    
} else {
    echo "<script> alert('User not found!'); document.location.href = '../index.php' </script>";
}

?>

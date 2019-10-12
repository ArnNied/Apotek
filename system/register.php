<?php 

require 'conn.php';

global $conn;

$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
$cpassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cpassword']));

if($password != $cpassword) {
    echo "<script> alert('Confirm password is blank or false'); document.location.href = '../index.php' </script>";
}

if(strlen($password) > 72){
    echo "<script> alert('Password must be 72 or less characters'); document.location.href = '../index.php' </script>";
    die;
} else if(strlen($password) < 8) {
    echo "<script> alert('Password must be 8 or more characters'); document.location.href = '../index.php' </script>";
    die;
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
}

$query = "SELECT * FROM users WHERE email = '$email'";
mysqli_query($conn, $query);

// $query = "SELECT * FROM users WHERE email = ?";
// // $stmt = $conn->prepare($query);
// // $stmt->bind_param('s', $email);
// // $stmt->execute();
// $stmt = $conn->prepare($query);
// if($stmt) {
//     $stmt->bind_param('s', $email);
//     $stmt->execute();
// } else {
//     $conn->error;
// }

// $result = $stmt->num_rows

// var_dump($password); die;

if(mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Email already registered'); document.location.href = '../index.php' </script>";
} else {
    // $query = "INSERT INTO `users` (`role`, `email`, `password`) VALUES ('0', '$email', '$password')";
    // mysqli_query($conn, $query);

    $query2 = "INSERT INTO users (email, password) VALUES (?,?)";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('ss', $email, $password);
    $stmt2->execute(); 
    // if($stmt2) {
    //     $stmt2->bind_param('ss', $email, $password);
    //     $stmt2->execute();
    // } else {
    //     $conn->error;
    // }

    header('Location: ../produk.php');
}
?>


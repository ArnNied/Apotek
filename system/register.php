<?php 

require 'conn.php';

$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
$cpassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cpassword']));

$allowedEmail = ['yahoo.com',
                'gmail.com',
                'yahoo.co.id',
                'gmail.co.id'
            ];
$email_ver = explode('@', $email);
$email_ver = end($email_ver);

if(!in_array($email_ver, $allowedEmail)) {
    echo "<script> alert('Please enter a valid email'); document.location.href = '../index.php' </script>";
    die;
}


if($password != $cpassword) {
    echo "<script> alert('Confirm password is blank or false'); document.location.href = '../index.php' </script>"; 
    die;
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
    die;
} else {
    // $query = "INSERT INTO `users` (`role`, `email`, `password`) VALUES ('0', '$email', '$password')";
    // mysqli_query($conn, $query);
    $empty = "EMPTY";
    $query2 = "INSERT INTO users (nama, jenis_kelamin, alamat, email, password) VALUES (?,?,?,?,?)";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('sssss', $empty, $empty, $empty, $email, $password);
    $stmt2->execute(); 
    // if($stmt2) {
    //     $stmt2->bind_param('ss', $email, $password);
    //     $stmt2->execute();
    // } else {
    //     $conn->error;
    // }
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['role'] = 0;
    header('Location: ../produk.php');
}
?>


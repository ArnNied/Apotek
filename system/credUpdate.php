<?php

require 'conn.php';

session_start();
if(!isset($_SESSION['email'])) {
    header('Location: ../produk.php');
    die;
}

$id = $_POST['update'];
$new_email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
$cur_password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cur_password']));

$new_password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['new_password']));
$cnew_password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cnew_password']));

$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'"));

if(password_verify($cur_password, $user['password'])) {

    // Email change
    if($new_email != $user['email']) {
        $allowedEmail = ['yahoo.com',
                        'gmail.com',
                        'yahoo.co.id',
                    ];
        $email_ver = end(explode('@', $new_email));

        if(!in_array($email_ver, $allowedEmail)) {
            echo "<script> alert('Please enter a valid email'); document.location.href = '../index.php' </script>";
            die;
        }

        // Email availability check
        mysqli_query($conn, "SELECT * FROM users WHERE email = '$new_email'");
        
        if(mysqli_affected_rows($conn) > 0) {
            echo "<script> alert('Email already used! Please use another email'); document.location.href = '../profil.php' </script>";
            die;
        } else {
            // Execute email change
            $query = "UPDATE users SET email = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $new_email, $id);
            $stmt->execute();
            $stmt->close();
    
            $_SESSION['email'] = $new_email;
    
            echo "<script> alert('E-mail changed!') </script>";
        }        
    }
    
    if($new_password != "") {
        // Password check
        if($new_password != $cnew_password) {
            echo "<script> alert('Incorrect confirm password!') </script>";
            die;
        } else if(strlen($new_password) > 72 || strlen($new_password) < 8) {
            echo "<script> alert('Password must be between 8 - 72 characters'); document.location.href = '../profil.php' </script>";
            die;
        } else {
            // Execute change password
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);

            $query = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $new_password, $id);
            $stmt->execute();
            $stmt->close();

            echo "<script> alert('Password successfully changed!'); document.location.href = '../profil.php' </script>";
        }        
    }
    echo "<script> document.location.href = '../profil.php' </script>";
} else {
    echo "<script> alert('Incorrect password!'); document.location.href = '../profil.php' </script>";
}


?>
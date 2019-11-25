<?php 

require '../conn.php';

session_start();
if(!isset($_SESSION['user'])) {
    header('Location: ../../produk.php');
    die;
}

if(isset($_POST['profil1'])) {
    $id = $_POST['profil1'];
    $nama = mysqli_real_escape_string($conn, htmlspecialchars($_POST['nama']));
    $umur = mysqli_real_escape_string($conn, htmlspecialchars($_POST['umur']));
    $jenis_kelamin = mysqli_real_escape_string($conn, htmlspecialchars($_POST['jenis_kelamin']));
    $alamat = mysqli_real_escape_string($conn, htmlspecialchars($_POST['alamat']));

    if($nama == "" || $alamat == "") {
        echo "<script> alert('Field is empty'); document.location.href = '../../profil.php' </script>";
        die;
    }

    if($umur <= 0) {
        echo "<script> alert('Please enter a valid age'); document.location.href = '../../profil.php' </script>";
        die;
    }

    $cur_gambar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `gambar` FROM `users` WHERE id = '$id'"));
    if($_FILES['gambar']['error'] == 4) {
        $stringGambar = $cur_gambar['gambar'];
    } else {
        $namaGambar = $_FILES['gambar']['name'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        $allowedExt = ['jpg', 'jpeg', 'png'];
        $extGambar = end(explode(".", $namaGambar));

        if(!in_array(strtolower($extGambar), $allowedExt)) {
            echo "<script> alert('Uploaded file is not an image'); document.location.href = '../../profil.php' </script>";
            die;
        }
    
        unlink("../../img/users/".$cur_gambar['gambar']);
    
        $stringGambar = random_str(16).".".$extGambar;
        move_uploaded_file($tmpName, '../../img/users/'.$stringGambar);
    }

// $query = "UPDATE `produk` (`nama`, `umur`, `takaran`, `alamat`, `email`) SET ('$nama_produk', '$umur', '$takaran' '$alamat','$email') WHERE id = '$id'";
// mysqli_query($conn, $query);

    $query = "UPDATE `users` SET `nama` = ?, `umur` = ?, `jenis_kelamin` = ?, `alamat` = ?, `gambar` = ? WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisssi", $nama, $umur, $jenis_kelamin, $alamat, $stringGambar, $id);
    $stmt->execute();

    echo "<script> document.location.href = '../../profil.php' </script>";
}

if(isset($_POST['profil2'])) {
    $id = $_POST['profil2'];
    $new_email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $cur_password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cur_password']));

    $new_password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['new_password']));
    $cnew_password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cnew_password']));

    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = '$id'"));

    if(password_verify($cur_password, $user['password'])) {

        // Email change
        if($new_email != $user['email']) {
            $allowedEmail = ['yahoo.com',
                            'gmail.com',
                            'yahoo.co.id',
                        ];
            $email_ver = end(explode('@', $new_email));

            if(!in_array($email_ver, $allowedEmail)) {
                echo "<script> alert('Please enter a valid email'); document.location.href = '../../index.php' </script>";
                die;
            }

            // Email availability check
            mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$new_email'");
        
            if(mysqli_affected_rows($conn) > 0) {
                echo "<script> alert('Email already registered! Please use another email'); document.location.href = '../../profil.php' </script>";
                die;
            } else {
                // Execute email change
                $query = "UPDATE `users` SET `email` = ? WHERE `id` = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("si", $new_email, $id);
                $stmt->execute();
                $stmt->close();
    
                $_SESSION['email'] = $new_email;
    
                echo "<script> alert('E-mail succesfully updated!') </script>";
            }        
        }
    
        if($new_password != "") {
            // Password check
            if($new_password != $cnew_password) {
                echo "<script> alert('Incorrect confirm password!'); document.location.href = '../../profil.php' </script>";
                die;
            } else if(strlen($new_password) > 72 || strlen($new_password) < 8) {
                echo "<script> alert('Password must be between 8 - 72 characters'); document.location.href = '../../profil.php' </script>";
                die;
            } else {
                // Execute change password
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);

                $query = "UPDATE `users` SET `password` = ? WHERE `id` = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("si", $new_password, $id);
                $stmt->execute();
                $stmt->close();

                echo "<script> alert('Password successfully changed!') </script>";
            }        
        }
        echo "<script> document.location.href = '../../profil.php' </script>";
    } else {
        echo "<script> alert('Incorrect password!'); document.location.href = '../../profil.php' </script>";
    }
}

echo "<script> document.location.href = '../../profil.php' </script>";
?>
<?php
session_start();

require '../koneksi.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Mohon maaf, anda belum login!')
            window.location = '../login/index.php';
        </script>";
}

if($_SESSION['role'] !="customer"){
    echo "
    <script type='text/javascript'>
        alert('anda bukan customer')
        window.location = '../login/index.php';
    </script>";
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Customer</title>
</head>
<body>
<h1>halo <?= $_SESSION['name']; ?>,ini halaman customer</h1>
    <a href="../logout.php">logut</a>
</body>
</html>
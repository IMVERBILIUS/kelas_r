<?php
    require '../koneksi.php';

    $username =$_POST['username'];
    $password =$_POST['password'];

    $query =mysqli_query($conn, "SELECT * FROM user where username ='$username' AND password = '$password'");
    $cek=mysqli_num_rows($query);

    if($cek > 0 ){
        $data = mysqli_fetch_array($query);

        if ($data['role'] == "admin")
        {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['role'] = $data['role'];
            header("Location: ../admin/index.php");

        }else if ($data['role'] == "customer")
        {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['role'] = $data['role'];
            header("Location: ../customer/index.php");

        }
    }else 
    {
        echo "
        <script type='text/javascript'>
            alert('Mohon maaf, salah pw atau user gagal!')
            window.location = 'index.php';
        </script>
        ";}
        
    



?>
<?php
session_start();

require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
        <script type='text/javascript'>
            alert('Mohon maaf, anda belum login!')
            window.location = '../login/index.php';
        </script>";

        
}
if($_SESSION['role'] !="admin"){
    echo "
    <script type='text/javascript'>
        alert('anda bukan admin')
        window.location = '../login/index.php';
    </script>";
}

if(isset($_POST["submit"])){
    if(tambahProduk($_POST) > 0){
        echo"<script type='text/javascript'>
        alert('data produk berhasil ditambahkan')
        window.location ='produk.php'
        </script>
        ";
    }else{
        echo"<script type='text/javascript'>
        alert('data produk gagal ditambahkan')
        window.location ='produk.php'
        </script>
        ";
    }
}




?>



<?php

include '../layout/sidebar.php';?>
        <div class="main">
            <h3>tambah data produk</h3>

            <div class="container-form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>nama produk</label>
                    <input type="text" name="nama_produk" class="form-produk"><br><br>

                    <label>foto produk</label>
                    <input type="file" name="foto" class="form-produk"><br><br>

                    <label>Harga produk</label>
                    <input type="text" name="harga" class="form-produk"><br><br>

                    <label>Stock barang</label>
                    <input type="text" name="stok_barang" class="form-produk"><br><br>

                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-produk" cols="20" rows="8"></textarea><br><br>

                    <button type="submit" name="submit" class="btn-produk">Tambah Produk</button>
                    
                </form>
            </div>
        </div>

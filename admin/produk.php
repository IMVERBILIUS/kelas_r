<?php
session_start();


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

require '../function.php';
$produk = query("SELECT * FROM produk")

?>




<?php

include '../layout/sidebar.php';?>
        <div class="main">
            <h3>Data Produk</h3>
            <a href="tambah_produk.php" class="tambah">tambah data produk</a>
            <table>
                <tr>
                    <th>NO</th>
                    <th>Nama Produk</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Stok Barang</th>
                    <th>aksi</th>
                </tr>


                <?php $i = 1;?>
                <?php foreach($produk as $data) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['nama_produk']; ?></td>
                    <td><img src="../foto/<?= $data['foto']; ?>" width="88px" alt=""></td>
                    <td><?= number_format($data['harga']); ?></td>
                    <td><?= $data['stok_barang']; ?></td>
                    <td>
                        <a href="" class="edit">Edit</a>
                        <a href="hapus_produk.php?id=<?= $data['id_produk'] ; ?>"
                        class="hapus" onclick="return confirm('are you sure to do that?')">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach;?>
            </table>
        </div>
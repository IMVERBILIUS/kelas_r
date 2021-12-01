<?php

require '../koneksi.php';

function query($query){

    global $conn;
    $result =mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
return $rows;
}


function tambahProduk($data){

    global $conn;

    $nama_produk =htmlspecialchars( $data["nama_produk"]);
    $foto =$_FILES["foto"]["name"];
    $files =$_FILES["foto"]["tmp_name"];
    $harga =htmlspecialchars( $data["harga"]);
    $stok_barang =htmlspecialchars($data["stok_barang"]);
    $deskripsi =htmlspecialchars($data["deskripsi"]);

    $query ="INSERT INTO produk VALUES(NULL , '$nama_produk' , '$foto' , '$harga' , '$stok_barang' , '$deskripsi')";
    move_uploaded_file($files, "../foto/" .$foto);

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


    
}


function hapusProduk($id){
    
    global $conn;

    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");
    return mysqli_affected_rows($conn);

}


?>
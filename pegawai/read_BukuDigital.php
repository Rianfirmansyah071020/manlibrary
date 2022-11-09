<?php 
    
    require_once ('../functions/functions.php');

    $id = $_GET['id'];
    $dataBuku = mysqli_query($koneksi, "SELECT * FROM tb_buku_digital WHERE id_bd='$id'");
    $dataBuku = mysqli_fetch_assoc($dataBuku);
    $namaFile = $dataBuku['file'];
    header("content-type: application/pdf");
    readfile("../assets/file/".$namaFile);



?>
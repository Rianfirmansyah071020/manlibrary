<?php 

    require_once "../functions/functions.php";

    $id = $_GET['id'];

    if(batalPumumSiswa($id) > 0 ) {
        echo "<script> 
        alert('Peminjaman berhasil di batalkan');
        document.location.href='peminjaman_siswa.php';
        </script>";
    }else {
        echo "<script> 
        alert('Peminjaman gagal di batalkan');
        document.location.href='peminjaman_siswa.php';
        </script>";
    }

?>
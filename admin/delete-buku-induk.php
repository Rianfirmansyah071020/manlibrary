<?php 

    require_once "../functions/functions.php";
    $id = $_GET['id'];

    if (deleteBukuInduk($id) > 0) {
        echo "<script>
        alert('Data buku berhasil di hapus !');
        document.location.href='buku-induk.php';
        </script>";
    }else{
        echo "<script>
        alert('Data buku gagal di hapus !');
        document.location.href='buku-induk.php';
        </script>";
    }

?>
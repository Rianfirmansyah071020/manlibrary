<?php 

    require_once "../functions/functions.php";
    $id = $_GET['id'];

    if (delete_buku_umum($id) > 0) {
        echo "<script>
        alert('Data buku berhasil di hapus !');
        document.location.href='stok-buku-umum.php';
        </script>";
    }else{
        echo "<script>
        alert('Data buku gagal di hapus !');
        document.location.href='stok-buku-umum.php';
        </script>";
    }

?>
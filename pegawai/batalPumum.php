<?php 

    require_once "../functions/functions.php";

    $id = $_GET['id'];

    if(batalPumum($id) > 0 ) {
        echo "<script>
        alert('Peminjaman Berhasil di batalkan');
        document.location.href='peminjaman_pegawai.php';
        </script>";
    }else {
        echo "<script>
        alert('Peminjaman gagal di batalkan');
        document.location.href='peminjaman_pegawai.php';
        </script>";
    }

?>
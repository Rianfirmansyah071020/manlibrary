<?php 

    require_once "../functions/functions.php";

    if (deleteAllPumumSiswa() > 0 ) {
        echo "<script>
        alert('Data berhasil di hapus');
        document.location.href='peminjaman_umum_siswa.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di hapus');
        document.location.href='peminjaman_umum_siswa.php';
        </script>";
    }

?>
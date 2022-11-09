<?php 

    require_once "../functions/functions.php";

    if(deleteAllPkoleksiSiswa() > 0 ) {
        echo "<script>
        alert('Data berhasil di hapus');
        document.location.href='peminjaman_koleksi_siswa.php';
        </script>";
    }else {
        echo "<script>
        alert('Data gagal di hapus');
        document.location.href='peminjaman_koleksi_siswa.php';
        </script>";
    }

?>
<?php 

    require_once "../functions/functions.php";
    
    if (deleteAllPkoleksiPegawai() > 0 ) {
        echo "<script>
        alert('Data berhasil di hapus');
        document.location.href='peminjaman_koleksi_pegawai.php';
        </script>";
    }else {
        echo "<script>
        alert('Data gagal di hapus');
        document.location.href='peminjaman_koleksi_pegawai.php';
        </script>";
    }

?>
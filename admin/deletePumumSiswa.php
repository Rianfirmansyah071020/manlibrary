<?php 
    require_once '../functions/functions.php';
    $id = $_GET['id'];
    
    if(DeletePumumSiswa($id) > 0 ) {
        echo "<script>
        alert('Data berhasil di hapus');
        document.location.href='peminjaman_umum_siswa.php';
        </script>";
    }else {
        echo "<script>
        alert('Data gagal di hapus');
        document.location.href='peminjaman_umum_siswa.php';
        </script>";
    }

?>
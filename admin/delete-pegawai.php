<?php 

    session_start();
    $idpegawai = $_SESSION['login_pegawai'];
    require_once "../functions/functions.php";
    $id = $_GET['id'];

    if (delete_pegawai($id, $idpegawai) > 0) {
        echo "<script>
        alert('Data pegawai berhasil di hapus !');
        document.location.href='pegawai.php';
        </script>";
    }else{
        echo "<script>
        alert('Data pegawai gagal di hapus !');
        document.location.href='pegawai.php';
        </script>";
    }

?>
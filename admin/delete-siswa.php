<?php 

    session_start();
    $idsiswa = $_SESSION['login_siswa'];

    require_once "../functions/functions.php";
    $id = $_GET['id'];

    if (delete_siswa($id, $idsiswa) > 0) {
        echo "<script>
        alert('Data siswa berhasil di hapus !');
        document.location.href='siswa.php';
        </script>";
    }else{
        echo "<script>
        alert('Data siswa gagal di hapus !');
        document.location.href='siswa.php';
        </script>";
    }

?>
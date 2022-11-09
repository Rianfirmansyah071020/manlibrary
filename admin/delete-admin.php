<?php 
    session_start();
    $idadmin = $_SESSION['login'];
    
    require_once "../functions/functions.php";
    $id = $_GET['id'];

    if (delete_admin($id, $idadmin) > 0) {
        echo "<script>
        alert('Data admin berhasil di hapus !');
        document.location.href='admin.php';
        </script>";
    }else{
        echo "<script>
        alert('Data admin gagal di hapus !');
        document.location.href='admin.php';
        </script>";
    }

?>
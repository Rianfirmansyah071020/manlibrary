<?php 

    require_once ('../functions/functions.php');
    
    $id = $_GET['id'];
        
    if (kembaliUmumPegawai($id) > 0){
        echo "<script>
        alert('Berhasil diajukan untuk dikembalikan');
        document.location.href='peminjaman_pegawai.php';
        </script>";
    }else{
        echo "<script>
        alert('Gagal diajukan untuk dikembalikan');
        document.location.href='peminjaman_pegawai.php';
        </script>";
    }

?>
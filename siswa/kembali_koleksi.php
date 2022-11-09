<?php 

    require_once ('../functions/functions.php');
    
    $id = $_GET['id'];
        
        
    if (kembaliKoleksi($id) > 0){
        echo "<script>
        alert('Berhasil diajukan untuk dikembalikan');
        document.location.href='peminjaman_koleksi_siswa.php';
        </script>";
    }else{
        echo "<script>
        alert('Gagal diajukan untuk dikembalikan');
        document.location.href='peminjaman_koleksi_siswa.php';
        </script>";
    }

?>
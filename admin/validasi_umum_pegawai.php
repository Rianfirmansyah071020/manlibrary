<?php 
    
    include_once('../functions/functions.php');

    $id = $_GET['id'];
    $dataBuku = mysqli_query($koneksi, "SELECT * FROM tb_pinjam_umum_pegawai WHERE id_pumum='$id'");
    $dataBuku = mysqli_fetch_assoc($dataBuku);
    $idBuku = $dataBuku['id_buku_umum'];
    $jumlah = $dataBuku['jumlah'];
    
    if(validasiUmumPegawai($id, $idBuku, $jumlah)){
        echo "<script>
        alert('Peminjaman berhasil di validasi');
        document.location.href='peminjaman_umum_pegawai.php';
        </script>";
    }else{
        echo "<script>
        alert('Peminjaman gagal di validasi');
        document.location.href='peminjaman_umum_pegawai.php';
        </script>";
    }



?>
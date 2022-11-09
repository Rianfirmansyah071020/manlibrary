<?php 
    
    include_once('../functions/functions.php');

    $id = $_GET['id'];
    $dataPinjam = mysqli_query($koneksi, "SELECT jumlah FROM tb_pinjam_umum_pegawai WHERE id_pumum='$id'");
        $dataPinjam = mysqli_fetch_assoc($dataPinjam);
        $jumlah = $dataPinjam['jumlah'];

    $dataBuku = mysqli_query($koneksi, "SELECT id_buku_umum FROM tb_pinjam_umum_pegawai WHERE id_pumum='$id'");
    $dataBuku = mysqli_fetch_assoc($dataBuku);
    $idBuku = $dataBuku['id_buku_umum'];
    
    if(validasiKembaliUmumPegawai($id, $jumlah, $idBuku)){
        echo "<script>
        alert('Pengembalian berhasil di validasi');
        document.location.href='peminjaman_umum_pegawai.php';
        </script>";
    }else{
        echo "<script>
        alert('Pengembalian gagal di validasi');
        document.location.href='peminjaman_umum_pegawai.php';
        </script>";
    }



?>
<?php 

    include_once('../functions/functions.php');

    $id = $_GET['id'];
    
    $dataBuku = mysqli_query($koneksi, "SELECT * FROM tb_pinjam_koleksi_pegawai WHERE id_pkoleksi='$id'");
    $dataBuku = mysqli_fetch_assoc($dataBuku);
    $idBuku = $dataBuku['id_buku_koleksi'];
    $jumlah = $dataBuku['jumlah'];

    
    if(validasiKembaliKoleksiPegawai($id, $jumlah, $idBuku)){
        echo "<script>
        alert('Pengembalian berhasil di validasi');
        document.location.href='peminjaman_koleksi_pegawai.php';
        </script>";
    }else{
        echo "<script>
        alert('Pengembalian gagal di validasi');
        document.location.href='peminjaman_koleksi_pegawai.php';
        </script>";
    }


?>
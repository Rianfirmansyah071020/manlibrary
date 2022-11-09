<?php 

    // koneksi ke database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "man_library";

    $koneksi = mysqli_connect($host, $user, $pass, $db);

    if ($koneksi == false) {
        echo "<script>
        alert('koneksi gagal');
        </script>";
    }

    // function upload gambar
   function uploadGambar() {
        $direktory = '../assets/gambar/';
        $namaFile = $_FILES['gambar']['name'];
        $error = $_FILES['gambar']['error'];
        $size = $_FILES['gambar']['size'];

        if ($error === 4) {
            echo "<script>
            alert('Harap Upload Foto Terlebih Dahulu');
            </script>";
            return false;
        }
    

    $ekstensiValid = ['jpg','jpeg','png','oip'];
    $ekstensi = explode('.', $namaFile);
    $ekstensi = strtolower(end($ekstensi));
    
    if (!in_array($ekstensi, $ekstensiValid)){
        echo "<script>
        alert('Maaf Yang Anda Upload Bukan Gambar Mohon Periksa Kembali');
        </script>";
        return false;
    }

    if ($size >= 30000000000){
        echo "<script>
        alert('Maaf Gambar Yang Anda Upload Ukurannya Terlalu Besar, Ukuran Gambar Maksimal Hanya 3 MB');
        </script>";
        return false;
    }

    move_uploaded_file($_FILES['gambar']['tmp_name'], $direktory. $namaFile);

    return $namaFile;

}

    //  upload file buku
    function uploadFile() {
        $direktory = '../assets/file/';
        $namaFile = $_FILES['file']['name'];
        $error = $_FILES['file']['error'];

        if ($error === 4) {
            echo "<script>
            alert('Harap Upload File Terlebih Dahulu');
            </script>";
            return false;
        }
    

    $ekstensiValid = ['pdf'];
    $ekstensi = explode('.', $namaFile);
    $ekstensi = strtolower(end($ekstensi));
    
    if (!in_array($ekstensi, $ekstensiValid)){
        echo "<script>
        alert('Maaf Yang Anda Upload Bukan pdf Mohon Periksa Kembali');
        </script>";
        return false;
    }

    move_uploaded_file($_FILES['file']['tmp_name'], $direktory. $namaFile);

    return $namaFile;

}


    // -----------------------------------------------------------------------------
    // insert data admin
    function insertAdmin($data){
        global $koneksi;

        $id = htmlspecialchars($data['idadmin']);
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = htmlspecialchars($data['password']);
        $bidang = htmlspecialchars($data['bidang']);
        $jekel = htmlspecialchars($data['jekel']);
        $alamat = htmlspecialchars($data['alamat']);
        $nohp = htmlspecialchars($data['nohp']);
        $gambar = uploadGambar();
        if (!$gambar) {
            return false;
        }

        $dataadmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
        if (mysqli_num_rows($dataadmin) == 1 ) {
            echo "<script>
            alert('Maaf username yang anda masukan sudah digunakan silahkan coba yang lain !');
            </script>";
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO admin (id_admin, username, password, nama, bidang, jekel, alamat, nohp,gambar) VALUES ('$id','$username','$password','$nama','$bidang','$jekel','$alamat','$nohp','$gambar');");

        return mysqli_affected_rows($koneksi);
    }

    // update admin
    function update_admin($data){
        global $koneksi;

        $id = htmlspecialchars($data['idadmin']);
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = htmlspecialchars($data['password']);
        $bidang = htmlspecialchars($data['bidang']);
        $jekel = htmlspecialchars($data['jekel']);
        $alamat = htmlspecialchars($data['alamat']);
        $nohp = htmlspecialchars($data['nohp']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        }else {
            $gambar = uploadGambar();
        }

        $query = mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password', nama='$nama', bidang='$bidang', jekel='$jekel', alamat='$alamat', nohp='$nohp', gambar='$gambar' WHERE id_admin='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // delete admin
    function delete_admin($id , $idadmin){
        global $koneksi;

        if($id === $idadmin) {
            echo "<script>
            alert('Anda tidak bisa menghapus pengguna yang sedang aktif');
            </script>";

            return false;
        }

        $query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin='$id'");

        return mysqli_affected_rows($koneksi);
    }



    
    // ------------------------------------------------------------------
    // insert siswa
    function insertSiswa($data){
        global $koneksi;

        $id = htmlspecialchars($data['idsiswa']);
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = htmlspecialchars($data['password']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $kelas = htmlspecialchars($data['kelas']);
        $jekel = htmlspecialchars($data['jekel']);
        $alamat = htmlspecialchars($data['alamat']);
        $nohp = htmlspecialchars($data['nohp']);
        $gambar = uploadGambar();
        if (!$gambar) {
            return false;
        }

        $cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE username='$username'");
        if(mysqli_num_rows($cek) == 1){
            echo "<script>
            alert('Maaf username yang anda masukan sudah digunakan silahkan coba yang lain !');
            </script>";
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO siswa (id_siswa, username, password, nama, jurusan,kelas, jekel, alamat, nohp, gambar) VALUES ('$id', '$username', '$password', '$nama', '$jurusan','$kelas', '$jekel', '$alamat', '$nohp', '$gambar');");

        return mysqli_affected_rows($koneksi);
    }


    // update siswa
    function update_siswa($data){
        global $koneksi;

        $id = htmlspecialchars($data['idsiswa']);
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = htmlspecialchars($data['password']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $kelas = htmlspecialchars($data['kelas']);
        $jekel = htmlspecialchars($data['jekel']);
        $alamat = htmlspecialchars($data['alamat']);
        $nohp = htmlspecialchars($data['nohp']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        }else {
            $gambar = uploadGambar();
        }

        $query = mysqli_query($koneksi, "UPDATE siswa SET username='$username', password='$password', nama='$nama', jurusan='$jurusan', kelas='$kelas', jekel='$jekel', alamat='$alamat', nohp='$nohp', gambar='$gambar' WHERE id_siswa='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // delete siswa
    function delete_siswa($id, $idsiswa){
        global $koneksi;

        if($id === $idsiswa) {
            echo "<script> 
            alert('Anda tidak bisa menghapus pengguna yang sedang login');
            </script>";

            return false;
        }

        $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id'");

        return mysqli_affected_rows($koneksi);
    }



    // --------------------------------------------------------------------------
    // insert pegawai
    function insertPegawai($data){
        global $koneksi;

        $id = htmlspecialchars($data['idpegawai']);
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = htmlspecialchars($data['password']);
        $bidang = htmlspecialchars($data['bidang']);
        $jekel = htmlspecialchars($data['jekel']);
        $alamat = htmlspecialchars($data['alamat']);
        $nohp = htmlspecialchars($data['nohp']);
        $gambar = uploadGambar();
        if (!$gambar) {
            return false;
        }

        $cek = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username='$username'");
        if(mysqli_num_rows($cek) == 1){
            echo "<script>
            alert('Maaf username yang anda masukan sudah digunakan silahkan coba yang lain !');
            </script>";
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO pegawai (id_pegawai, username, password, nama, bidang, jekel, alamat, nohp, gambar) VALUES ('$id', '$username', '$password', '$nama', '$bidang', '$jekel', '$alamat', '$nohp', '$gambar');");

        return mysqli_affected_rows($koneksi);
    }

    // update pegawai
    function update_pegawai($data){
        global $koneksi;

        $id = htmlspecialchars($data['idpegawai']);
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = htmlspecialchars($data['password']);
        $bidang = htmlspecialchars($data['bidang']);
        $jekel = htmlspecialchars($data['jekel']);
        $alamat = htmlspecialchars($data['alamat']);
        $nohp = htmlspecialchars($data['nohp']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        }else {
            $gambar = uploadGambar();
        }

        $query = mysqli_query($koneksi, "UPDATE pegawai SET username='$username', password='$password', nama='$nama', bidang='$bidang', jekel='$jekel', alamat='$alamat', nohp='$nohp', gambar='$gambar' WHERE id_pegawai='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // delete pegawai
    function delete_pegawai($id, $idpegawai){
        global $koneksi;

        if($id === $idpegawai) {
            echo "<script> 
            alert('Anda tidak bisa menghapus pengguna yang sedang aktif');
            </script>";

            return false;
        }

        $query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id'");

        return mysqli_affected_rows($koneksi);
    }




    // ---------------------------------------------------------------------------------
    // stok buku umum
    function insertStokBukuUmum($data){
        global $koneksi;

        $id = htmlspecialchars($data['id']);
        $no_rak = htmlspecialchars($data['no_rak']);
        $judul = htmlspecialchars($data['judul']);
        $kelas = htmlspecialchars($data['kelas']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $penulis = htmlspecialchars($data['penulis']);
        $lokasi = htmlspecialchars($data['lokasi']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['tahun']);
        $bibliografi = htmlspecialchars($data['bibliografi']);
        $isbn = htmlspecialchars($data['isbn']);
        $indeks = htmlspecialchars($data['indeks']);
        $jumlah = htmlspecialchars($data['jumlah']);
        if ($jurusan == "IPA"){
            $noKlasifikasi = 574;
        }elseif($jurusan == "IPS"){
            $noKlasifikasi = 900;
        }elseif($jurusan == "IPK"){
            $noKlasifikasi = 429;
        }
        
        $gambar = uploadGambar();
        if (!$gambar){
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO stok_buku_umum (id_buku_umum, no_klasifikasi, no_rak, judul, kelas, jurusan, penulis, lokasi_penerbit, penerbit, tahun_terbit, bibliografi, isbn, indeks, jumlah, gambar) VALUES ('$id', '$noKlasifikasi', '$no_rak','$judul', '$kelas', '$jurusan', '$penulis', '$lokasi', '$penerbit', '$tahun', '$bibliografi', '$isbn', '$indeks', '$jumlah', '$gambar')"); 

        return mysqli_affected_rows($koneksi);
    }
    // delete buku umum
    function delete_buku_umum($id){
        global $koneksi;

        $query = mysqli_query($koneksi, "DELETE FROM stok_buku_umum WHERE id_buku_umum='$id'");
        return mysqli_affected_rows($koneksi);

    }
    // update buku umum
    function update_buku_umum($data){
        global $koneksi;

        $id = htmlspecialchars($data['id']);
        $no_rak = htmlspecialchars($data['no_rak']);
        $judul = htmlspecialchars($data['judul']);
        $kelas = htmlspecialchars($data['kelas']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $penulis = htmlspecialchars($data['penulis']);
        $lokasi = htmlspecialchars($data['lokasi']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['tahun']);
        $bibliografi = htmlspecialchars($data['bibliografi']);
        $isbn = htmlspecialchars($data['isbn']);
        $indeks = htmlspecialchars($data['indeks']);
        $jumlah = htmlspecialchars($data['jumlah']);
        if ($jurusan == "IPA"){
            $noKlasifikasi = 574;
        }elseif($jurusan == "IPS"){
            $noKlasifikasi = 900;
        }elseif($jurusan == "IPK"){
            $noKlasifikasi = 429;
        }
        $gambarlama = htmlspecialchars($data['gambarlama']);
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        }else {
            $gambar = uploadGambar();
        }

        $query = mysqli_query($koneksi, "UPDATE stok_buku_umum SET no_klasifikasi='$noKlasifikasi',no_rak='$no_rak', judul='$judul', kelas='$kelas', jurusan='$jurusan', penulis='$penulis', lokasi_penerbit='$lokasi', penerbit='$penerbit', tahun_terbit='$tahun', bibliografi='$bibliografi', isbn='$isbn', indeks='$indeks', jumlah='$jumlah', gambar='$gambar' WHERE id_buku_umum='$id'");

        return mysqli_affected_rows($koneksi);
    }
    

    // buku induk -----------------------------------------------------------------------------------------------
    function insertBukuInduk($data) {
        global $koneksi;


        $id = htmlspecialchars($data['idbuku']);
        $tgl_masuk = htmlspecialchars($data['tglmasuk']);
        $judul = htmlspecialchars($data['judul']);
        $nourut = htmlspecialchars($data['nourut']);
        $pengarang = htmlspecialchars($data['pengarang']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['tahun']);
        $bahasa = htmlspecialchars($data['bahasa']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $sumber = htmlspecialchars($data['sumber']);
        $harga = htmlspecialchars($data['harga']);
        $keterangan = htmlspecialchars($data['keterangan']);
        $gambar = uploadGambar();
        if (!$gambar){
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO buku_induk (id_buku, tgl_masuk, judul, nourut, pengarang, penerbit, th_terbit, bahasa, jumlah, sumber, harga, keterangan, gambar) VALUES ('$id','$tgl_masuk', '$judul', '$nourut', '$pengarang', '$penerbit','$tahun','$bahasa','$jumlah','$sumber','$harga','$keterangan','$gambar')");

        return mysqli_affected_rows($koneksi);
    }

    // delete buku induk
    function deleteBukuInduk($id){
        global $koneksi;

        $query= mysqli_query($koneksi, "DELETE FROM buku_induk WHERE id_buku='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // update buku induk
    function updateBukuInduk($data){
        global $koneksi;

        $id = htmlspecialchars($data['id']);
        $tgl_masuk = htmlspecialchars($data['tgl_masuk']);
        $judul = htmlspecialchars($data['judul']);
        $nourut = htmlspecialchars($data['nourut']);
        $pengarang = htmlspecialchars($data['pengarang']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $tahun = htmlspecialchars($data['th_terbit']);
        $bahasa = htmlspecialchars($data['bahasa']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $sumber = htmlspecialchars($data['sumber']);
        $harga = htmlspecialchars($data['harga']);
        $keterangan = htmlspecialchars($data['keterangan']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        }else {
            $gambar = uploadGambar();
        }

        $query = mysqli_query($koneksi, "UPDATE buku_induk SET tgl_masuk='$tgl_masuk', judul='$judul', nourut='$nourut', pengarang='$pengarang', penerbit='$penerbit', th_terbit='$tahun', bahasa='$bahasa', jumlah='$jumlah', sumber='$sumber', harga='$harga', keterangan='$keterangan', gambar='$gambar' WHERE id_buku='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // buku koleksi--------------------------------------------------------------------------------------------------------------------------------------
    function insertStokBukuKoleksi($data){
        global $koneksi;

        $id = htmlspecialchars($data['id']);
        $no_rak = htmlspecialchars($data['no_rak']);
        $judul = htmlspecialchars($data['judul']);
        $pengarang = htmlspecialchars($data['pengarang']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $jenis = htmlspecialchars($data['jenis']);
        $hal = htmlspecialchars($data['hal']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $gambar = uploadGambar();
        if (!$gambar){
            return false;
        }
        

        $query = mysqli_query($koneksi, "INSERT INTO stok_buku_koleksi (id_buku_koleksi,no_rak, judul, pengarang, penerbit, jenis_koleksi, hal, jumlah, gambar)  VALUES ('$id','$no_rak', '$judul','$pengarang','$penerbit','$jenis','$hal', '$jumlah', '$gambar')");

        return mysqli_affected_rows($koneksi);
    }

    // delete buku koleksi
    function delete_buku_koleksi($id){
        global $koneksi;

        $query = mysqli_query($koneksi, "DELETE FROM stok_buku_koleksi WHERE id_buku_koleksi='$id'");
        return mysqli_affected_rows($koneksi);

        
    }

    // update buku koleksi
    function update_buku_koleksi($data){
        global $koneksi; 

        $id = htmlspecialchars($data['id']);
        $no_rak = htmlspecialchars($data['no_rak']);
        $judul = htmlspecialchars($data['judul']);
        $pengarang = htmlspecialchars($data['pengarang']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $jenis = htmlspecialchars($data['jenis']);
        $hal = htmlspecialchars($data['hal']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        }else {
            $gambar = uploadGambar();
        }

        $query = mysqli_query($koneksi, "UPDATE stok_buku_koleksi SET judul='$judul', no_rak='$no_rak', pengarang='$pengarang',penerbit='$penerbit', jenis_koleksi='$jenis', hal='$hal', jumlah='$jumlah', gambar='$gambar' WHERE id_buku_koleksi='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // function siswa------------------------------------------------------------------------------------------------------------------------------------
    // insert data peminjaman

    function insertPinjamUmum($data){
        global $koneksi;
        
        $id_pumum = htmlspecialchars($data['id_pumum']);
        $id_buku = htmlspecialchars($data['id_buku']);

        $dataBuku = mysqli_query($koneksi, "SELECT * FROM stok_buku_umum WHERE id_buku_umum='$id_buku'");
        $dataBuku = mysqli_fetch_assoc($dataBuku);
        $jumlah2 = $dataBuku['jumlah'];

        $id_siswa = htmlspecialchars($data['id_siswa']);
        $judul = htmlspecialchars($data['judul']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $tanggal = htmlspecialchars($data['tanggal']);
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);

        if($jumlah > $jumlah2 ) {
            echo "<script>alert('Buku yang anda pinjam melebihi stok buku yang ada');</script>";
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO tb_pinjam_umum_siswa(id_pumum, id_buku_umum, id_siswa, judul, jumlah, tanggal, tgl_kembali, status) VALUES ('$id_pumum', '$id_buku', '$id_siswa', '$judul', '$jumlah', '$tanggal', '$tgl_kembali', 'Diajukan')");

        return mysqli_affected_rows($koneksi); 
        
    }

    // kembali umum
    function kembaliUmum($id){
        global $koneksi;
        
        $query = mysqli_query($koneksi, "UPDATE tb_pinjam_umum_siswa SET pengembalian='Diajukan Dan Belum Di Validasi' WHERE id_pumum='$id'");
        
        return mysqli_affected_rows($koneksi);
        
    }

    // function data peminjaman koleksi
    // insert data peminjaman koleksi
    function insertPinjamKoleksi($data){
        global $koneksi;
        
        $id_pkoleksi = htmlspecialchars($data['id_pkoleksi']);
        $id_buku = htmlspecialchars($data['id_buku']);

        $dataBuku = mysqli_query($koneksi, "SELECT * FROM stok_buku_koleksi WHERE id_buku_koleksi='$id_buku'");
        $dataBuku = mysqli_fetch_assoc($dataBuku);
        $jumlah2 = $dataBuku['jumlah'];

        $id_siswa = htmlspecialchars($data['id_siswa']);    
        $judul = htmlspecialchars($data['judul']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $tanggal = htmlspecialchars($data['tanggal']);
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);

        if($jumlah > $jumlah2) {
            echo "<script>alert('Buku yang anda pinjam melebihi stok buku yang ada');</script>";
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO tb_pinjam_koleksi_siswa(id_pkoleksi, id_buku_koleksi, id_siswa, judul, jumlah, tanggal, tgl_kembali, status) VALUES ('$id_pkoleksi', '$id_buku', '$id_siswa', '$judul', '$jumlah', '$tanggal', '$tgl_kembali','Diajukan')");

        return mysqli_affected_rows($koneksi); 
        
    }

    // validasi peminjaman buku umum siswa-------------------------------------------------------------------------------------------------------------
    function validasiUmumSiswa($id, $idBuku, $jumlah){
        global $koneksi;

        $tanggal = date('Y-m-d');
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_umum_siswa SET status='Disetujui', tanggal='$tanggal', tgl_kembali='$tgl_kembali' WHERE id_pumum='$id'");

        mysqli_query($koneksi, "UPDATE stok_buku_umum set jumlah=jumlah-'$jumlah' WHERE id_buku_umum='$idBuku'");

        return mysqli_affected_rows($koneksi);
    }


    // validasi pengembalian siswa---------------------------------------------------------------------------------------------------------------------
    function validasiKembaliUmumSiswa($id, $jumlah, $idBuku){
        global $koneksi;
        
        $updateJumlahBuku = mysqli_query($koneksi, "UPDATE stok_buku_umum SET jumlah=jumlah+'$jumlah' WHERE id_buku_umum='$idBuku'");
        
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_umum_siswa SET pengembalian='Disetujui' WHERE id_pumum='$id'");


        return mysqli_affected_rows($koneksi);
    }


    // validasi peminjaman buku koleksi siswa-------------------------------------------------------------------------------------------------------------
    function validasiKoleksiSiswa($id, $idBuku, $jumlah){
        global $koneksi;

        $tanggal = date('Y-m-d');
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);        
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_koleksi_siswa SET status='Disetujui', tanggal='$tanggal', tgl_kembali='$tgl_kembali' WHERE id_pkoleksi='$id'");
        
        mysqli_query($koneksi, "UPDATE stok_buku_koleksi set jumlah=jumlah-'$jumlah' WHERE id_buku_koleksi='$idBuku'");

        return mysqli_affected_rows($koneksi);
    }

    // kembali umum siswa
    function kembaliKoleksi($id){
        global $koneksi;
        
        $query = mysqli_query($koneksi, "UPDATE tb_pinjam_koleksi_siswa SET pengembalian='Diajukan Dan Belum Di Validasi' WHERE id_pkoleksi='$id'");
        
        return mysqli_affected_rows($koneksi);
        
    }

    // function validasi pengembalian buku koleksi siswa
    function validasiKembaliKoleksiSiswa($id, $jumlah, $idBuku){
        global $koneksi;
        
        $updateJumlahBuku = mysqli_query($koneksi, "UPDATE stok_buku_koleksi SET jumlah=jumlah+'$jumlah' WHERE id_buku_koleksi='$idBuku'");
        
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_koleksi_siswa SET pengembalian='Disetujui' WHERE id_pkoleksi='$id'");


        return mysqli_affected_rows($koneksi);
    }


    // Pegawai 
    // insert peminjaman buku umum pegawai
    function insertPinjamUmumPegawai($data){
        global $koneksi;
        
        $id_pumum = htmlspecialchars($data['id_pumum']);
        $id_buku = htmlspecialchars($data['id_buku']);

        $dataBuku = mysqli_query($koneksi, "SELECT * FROM stok_buku_umum WHERE id_buku_umum='$id_buku'");
        $dataBuku = mysqli_fetch_assoc($dataBuku);
        $jumlah2 = $dataBuku['jumlah'];

        $id_pegawai = htmlspecialchars($data['id_pegawai']);
        $judul = htmlspecialchars($data['judul']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $tanggal = htmlspecialchars($data['tanggal']);
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);

        if($jumlah > $jumlah2) {
            echo "<script>alert('Buku yang anda pinjam melebihi stok buku yang ada');</script>";
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO tb_pinjam_umum_pegawai(id_pumum, id_buku_umum, id_pegawai, judul, jumlah, tanggal,tgl_kembali, status) VALUES ('$id_pumum', '$id_buku', '$id_pegawai', '$judul', '$jumlah', '$tanggal', '$tgl_kembali', 'Diajukan')");

        return mysqli_affected_rows($koneksi); 
        
    }


    // insert pinjam koleksi pegawai
    function insertPinjamKoleksiPegawai($data){
        global $koneksi;
        
        $id_pkoleksi = htmlspecialchars($data['id_pkoleksi']);
        $id_buku = htmlspecialchars($data['id_buku']);

        $dataBuku = mysqli_query($koneksi, "SELECT * FROM stok_buku_koleksi WHERE id_buku_koleksi='$id_buku'");
        $dataBuku = mysqli_fetch_assoc($dataBuku);
        $jumlah2 = $dataBuku['jumlah'];

        $id_pegawai = htmlspecialchars($data['id_pegawai']);
        $judul = htmlspecialchars($data['judul']);
        $jumlah = htmlspecialchars($data['jumlah']);
        $tanggal = htmlspecialchars($data['tanggal']);
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);

        if($jumlah > $jumlah2) {
            echo "<script>alert('Buku yang anda pinjam melebihi stok buku yang ada');</script>";
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO tb_pinjam_koleksi_pegawai(id_pkoleksi, id_buku_koleksi, id_pegawai, judul, jumlah, tanggal, tgl_kembali, status) VALUES ('$id_pkoleksi', '$id_buku', '$id_pegawai', '$judul', '$jumlah', '$tanggal', '$tgl_kembali', 'Diajukan')");

        return mysqli_affected_rows($koneksi); 
        
    } 

    // kembali pegawai
    function kembaliUmumPegawai($id){
        global $koneksi;
        
        $query = mysqli_query($koneksi, "UPDATE tb_pinjam_umum_pegawai SET pengembalian='Diajukan Dan Belum Di Validasi' WHERE id_pumum='$id'");
        
        return mysqli_affected_rows($koneksi);
        
    }

    // kembali koleksi
    function kembaliKoleksiPegawai($id){
        global $koneksi;
        
        $query = mysqli_query($koneksi, "UPDATE tb_pinjam_koleksi_pegawai SET pengembalian='Diajukan Dan Belum Di Validasi' WHERE id_pkoleksi='$id'");
        
        return mysqli_affected_rows($koneksi);
        
    }

    // validasi koleksi pegawai
    function validasiKoleksiPegawai($id, $idBuku, $jumlah){
        global $koneksi;

        $tanggal = date('Y-m-d');
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_koleksi_pegawai SET status='Disetujui', tanggal='$tanggal', tgl_kembali='$tgl_kembali' WHERE id_pkoleksi='$id'");
        
        mysqli_query($koneksi, "UPDATE stok_buku_koleksi set jumlah=jumlah-'$jumlah' WHERE id_buku_koleksi='$idBuku'");

        return mysqli_affected_rows($koneksi);
    }

    // validasi umum pegawai
    function validasiUmumPegawai($id, $idBuku, $jumlah){
        global $koneksi;

        $tanggal = date('Y-m-d');
        $tgl_kembali = strtotime("+7 day", strtotime($tanggal)); 
        $tgl_kembali = date('Y-m-d', $tgl_kembali);
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_umum_pegawai SET status='Disetujui', tanggal='$tanggal', tgl_kembali='$tgl_kembali' WHERE id_pumum='$id'");

        mysqli_query($koneksi, "UPDATE stok_buku_umum set jumlah=jumlah-'$jumlah' WHERE id_buku_umum='$idBuku'");

        return mysqli_affected_rows($koneksi);
    }

    // validasi kembali umum pegawai
    function validasiKembaliUmumPegawai($id, $jumlah, $idBuku){
        global $koneksi;
        
        $updateJumlahBuku = mysqli_query($koneksi, "UPDATE stok_buku_umum SET jumlah=jumlah+'$jumlah' WHERE id_buku_umum='$idBuku'");
        
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_umum_pegawai SET pengembalian='Disetujui' WHERE id_pumum='$id'");


        return mysqli_affected_rows($koneksi);
    }

    // validasi kembali koleksi pegawai
    function validasiKembaliKoleksiPegawai($id, $jumlah, $idBuku){
        global $koneksi;
        
        $updateJumlahBuku = mysqli_query($koneksi, "UPDATE stok_buku_koleksi SET jumlah=jumlah+'$jumlah' WHERE id_buku_koleksi='$idBuku'");
        
        $validasi = mysqli_query($koneksi, "UPDATE tb_pinjam_koleksi_pegawai SET pengembalian='Disetujui' WHERE id_pkoleksi='$id'");


        return mysqli_affected_rows($koneksi);
    }


    // buku digital --------------------------------------------------------------------------------------------------------------------------------

    function insertStokBukuDigital($data){
        global $koneksi;

        $id = htmlspecialchars($data['id']);
        $judul = htmlspecialchars($data['judul']);
        $kategori = htmlspecialchars($data['kategori']);
        $gambar = uploadGambar();
        if(!$gambar){
            return false;
        }
        $file = uploadFile();
        if(!$file){
            return false;
        }

        $query = mysqli_query($koneksi, "INSERT INTO tb_buku_digital(id_bd, judul, kategori, gambar, file) VALUES ('$id', '$judul', '$kategori', '$gambar', '$file')");

        return mysqli_affected_rows($koneksi);
                
    }

    // delete buku digital
    function delete_buku_digital($id){
        global $koneksi;

        $query = mysqli_query($koneksi, "DELETE FROM tb_buku_digital WHERE id_bd='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // update buku digital
    function update_buku_digital($data){
        global $koneksi;

        $id = htmlspecialchars($data['id']);
        $judul = htmlspecialchars($data['judul']);
        $kategori = htmlspecialchars($data['kategori']);
        $gambarlama = htmlspecialchars($data['gambarlama']);
        $filelama = htmlspecialchars($data['filelama']);
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarlama;
        }else{
            $gambar = uploadGambar();
        }

        if($_FILES['file']['error'] === 4) {
            $file = $filelama;
        }else{
            $file = uploadFile();
        }

        $query = mysqli_query($koneksi,"UPDATE tb_buku_digital SET judul='$judul', kategori='$kategori', gambar='$gambar', file='$file' WHERE id_bd='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // hapus peminjaman buku umum siswa--------------------------
    function DeletePumumSiswa($id) {
        global $koneksi;
        $query =  mysqli_query($koneksi, "DELETE FROM tb_pinjam_umum_siswa WHERE id_pumum='$id'");

        return mysqli_affected_rows($koneksi);
    }

    //  hapus peminjaman buku koleksi siswa
    function deletePkoleksiSiswa($id) {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_koleksi_siswa WHERE id_pkoleksi='$id'");
        
        return mysqli_affected_rows($koneksi);
    }

    // hapus peminjaman buku umum pegawai
    function deletePumumPegawai($id) {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_umum_pegawai WHERE id_pumum='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // hapus peminjaman buku koleksi pegawai
    function deletePkoleksiPegawai($id) {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_koleksi_pegawai WHERE id_pkoleksi='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // hapus semua data peminjaman buku umum siswa
    function deleteAllPumumSiswa() {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_umum_siswa");

        return mysqli_affected_rows($koneksi);
    }

    // delete semua data peminjaman buku koleksi siswa
    function deleteAllPkoleksiSiswa() {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_koleksi_siswa");

        return mysqli_affected_rows($koneksi);
    }

    // hapus semua data peminjaman buku umum pegawai
    function deleteAllPumumPegawai() {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_umum_pegawai");

        return mysqli_affected_rows($koneksi);
    }

    // hapus semua data peminjaman buku koleksi pegawai
    function deleteAllPkoleksiPegawai() {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_koleksi_pegawai");

        return mysqli_affected_rows($koneksi);
    }


    // batalkan peminjaman buku umum pegawai
    function batalPumum($id) {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_umum_pegawai WHERE id_pumum='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // batalkan peminjaman buku koleksi pegawai
    function batalPkoleksi($id) {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_koleksi_pegawai WHERE id_pkoleksi='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // batalkan peminjaman buku umum siswa
    function batalPumumSiswa($id) {
        global $koneksi;
        
        mysqli_query($koneksi, "DELETE FROM tb_pinjam_umum_siswa WHERE id_pumum='$id'");

        return mysqli_affected_rows($koneksi);
    }

    // batalkan peminjaman buku koleksi siswa
    function batalPkoleksiSiswa($id) {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tb_pinjam_koleksi_siswa WHERE id_pkoleksi='$id'");

        return mysqli_affected_rows($koneksi);
    }
?>
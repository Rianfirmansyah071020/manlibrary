<?php  

    session_start();
    if(!isset($_SESSION['login'])){
        header('location:login-admin.php');
        exit;
    }
    require_once('../functions/functions.php');    

        error_reporting(0);  

    $id = $_SESSION['login'];
    $dataAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'");
    $dataAdmin = mysqli_fetch_assoc($dataAdmin);


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Man 1 Padang Pariaman</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include('sidebar.php');
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dataAdmin['nama'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/gambar/<?= $dataAdmin['gambar']  ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="setting.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <style>
                .header {
                    box-shadow: 1px 1px 5px grey;
                    background-position: center;
                    background-size: cover;
                }

                .jam-digital {
                    color: blue;
                    font-weight: bold;
                }

                #jam,
                #menit,
                #detik,
                .logo {
                    display: inline-block;
                }
                </style>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="alert bg-light header" role="alert">
                        <h5 class="mb-1 mt-1 text-black">Dasboard</h5>
                        <div class="jam-digital">
                            <i class="fas fa-clock logo"></i>
                            <p id="jam"></p> :
                            <p id="menit"></p> :
                            <p id="detik"></p>
                        </div>
                    </div>
                    <script>
                    window.setTimeout("waktu()", 1000);

                    function waktu() {
                        var waktu = new Date();
                        setTimeout("waktu()", 1000);
                        document.getElementById("jam").innerHTML = waktu.getHours();
                        document.getElementById("menit").innerHTML = waktu.getMinutes();
                        document.getElementById("detik").innerHTML = waktu.getSeconds();
                    }
                    </script>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="admin.php">Jumlah Admin Yang Login</a>
                                            </div>
                                            <?php
                                            $tgl_login = date('Y-m-d');
                                            $adminLogin = mysqli_query($koneksi, "SELECT * FROM history_login WHERE level='admin' AND tgl_login='$tgl_login'");
                                            $adminLogin = mysqli_num_rows($adminLogin);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="admin.php"><?= $adminLogin ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="admin.php">
                                                <i class="fas fa-user-secret fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="pegawai.php">Jumlah Pegawai Yang login</a>
                                            </div>
                                            <?php
                                            $tgl_login = date('Y-m-d');
                                            $pegawaiLogin = mysqli_query($koneksi, "SELECT * FROM history_login WHERE level='pegawai' AND tgl_login='$tgl_login'");
                                            $pegawaiLogin = mysqli_num_rows($pegawaiLogin);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="admin.php"><?= $pegawaiLogin ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="pegawai.php">
                                                <i class="fas fa-user-secret fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="siswa.php">Jumlah Siswa Yang Login</a>
                                            </div>
                                            <?php
                                            $tgl_login = date('Y-m-d');
                                            $siswaLogin = mysqli_query($koneksi, "SELECT * FROM history_login WHERE level='siswa' AND tgl_login='$tgl_login'");
                                            $siswaLogin = mysqli_num_rows($siswaLogin);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="admin.php"><?= $siswaLogin ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="siswa.php">
                                                <i class="fas fa-user-secret fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="admin.php">Jumlah Admin</a>
                                            </div>
                                            <?php
                                            $jlmAdmin = mysqli_query($koneksi, "SELECT * FROM admin");
                                            $jlmAdmin = mysqli_num_rows($jlmAdmin);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="admin.php"><?= $jlmAdmin ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="admin.php">
                                                <i class="fas fa-user-secret fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="pegawai.php">Jumlah Pegawai</a>
                                            </div>
                                            <?php
                                            $jlmPegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");
                                            $jlmPegawai = mysqli_num_rows($jlmPegawai);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="pegawai.php"><?= $jlmPegawai ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="pegawai.php">
                                                <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="siswa.php">Jumlah Siswa</a>
                                            </div>
                                            <?php
                                            $jlmSiswa = mysqli_query($koneksi, "SELECT * FROM siswa");
                                            $jlmSiswa = mysqli_num_rows($jlmSiswa);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="siswa.php"><?= $jlmSiswa ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="siswa.php">
                                                <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="stok-buku-umum.php">Jumlah Stok Buku Umum</a>
                                            </div>
                                            <?php
                                            $jlmStok = mysqli_query($koneksi, "SELECT sum(jumlah) as jumlah FROM stok_buku_umum");
                                            $jlmStok = mysqli_fetch_array($jlmStok);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="stok-buku-umum.php"><?= $jlmStok['jumlah'] ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="stok-buku-umum.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="stok-buku-koleksi.php">jumlah Stok Buku Koleksi</a>
                                            </div>
                                            <?php
                                            $jlmStok = mysqli_query($koneksi, "SELECT sum(jumlah) as jumlah FROM stok_buku_koleksi");
                                            $jlmStok = mysqli_fetch_array($jlmStok);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="stok-buku-koleksi.php"><?= $jlmStok['jumlah'] ?></a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="stok-buku-koleksi.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="buku-induk.php">Jumlah Buku Induk</a>
                                            </div>
                                            <?php
                                            $jlminduk = mysqli_query($koneksi, "SELECT sum(jumlah) as jumlah FROM buku_induk");
                                            $jlminduk = mysqli_fetch_array($jlminduk);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="buku-induk.php">
                                                    <?= $jlminduk['jumlah'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="buku-induk.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="peminjaman_umum_siswa.php">Jumlah Buku Umum Yang Di Pinjam
                                                    Siswa</a>
                                            </div>
                                            <?php
                                            $jlmPinjamUmum = mysqli_query($koneksi, "SELECT sum(jumlah) as jumlah FROM tb_pinjam_umum_siswa WHERE status='Disetujui' AND pengembalian='Belum' OR pengembalian='Diajukan Dan Belum Di Validasi'");
                                            $jlmPinjamUmum = mysqli_fetch_array($jlmPinjamUmum);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="peminjaman_umum_siswa.php">
                                                    <?= $jlmPinjamUmum['jumlah'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="peminjaman_umum_siswa.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Buku Koleksi Yang Di Pinjam Siswa</div>
                                            <?php
                                            $jlmPinjamKoleksi = mysqli_query($koneksi, "SELECT sum(jumlah) as jumlah FROM tb_pinjam_koleksi_siswa WHERE status='Disetujui' AND pengembalian='Belum' OR pengembalian='Diajukan Dan Belum Di Validasi'");
                                            $jlmPinjamKoleksi = mysqli_fetch_array($jlmPinjamKoleksi);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="peminjaman_koleksi_siswa.php">
                                                    <?= $jlmPinjamKoleksi['jumlah'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="peminjaman_koleksi_siswa.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="peminjaman_umum_pegawai.php">Jumlah Buku Umum Yang Di Pinjam
                                                    Pegawai</a>
                                            </div>
                                            <?php
                                            $jlmPinjamUmumP = mysqli_query($koneksi, "SELECT sum(jumlah) as jumlah FROM tb_pinjam_umum_pegawai WHERE status='Disetujui' AND pengembalian='Belum' OR pengembalian='Diajukan Dan Belum Di Validasi'");
                                            $jlmPinjamUmumP = mysqli_fetch_array($jlmPinjamUmumP);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="peminjaman_umum_pegawai.php">
                                                    <?= $jlmPinjamUmumP['jumlah'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="peminjaman_umum_pegawai.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="peminjaman_koleksi_pegawai.php">Jumlah Buku Koleksi Yang Di
                                                    Pinjam Pegawai</a>
                                            </div>
                                            <?php
                                            $jlmPinjamKoleksiP = mysqli_query($koneksi, "SELECT sum(jumlah) as jumlah FROM tb_pinjam_koleksi_pegawai WHERE status='Disetujui' AND pengembalian='Belum' OR pengembalian='Diajukan Dan Belum Di Validasi'");
                                            $jlmPinjamKoleksiP = mysqli_fetch_array($jlmPinjamKoleksiP);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="peminjaman_koleksi_pegawai.php">
                                                    <?= $jlmPinjamKoleksiP['jumlah'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="peminjaman_koleksi_pegawai.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="buku_digital.php">Jumlah Buku Digital Yang Tersedia</a>
                                            </div>
                                            <?php
                                            $jlmdigital = mysqli_query($koneksi, "SELECT count(id_bd) as jumlah FROM tb_buku_digital");
                                            $jlmdigital = mysqli_fetch_array($jlmdigital);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="buku_digital.php">
                                                    <?= $jlmdigital['jumlah'] ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="buku_digital.php">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MAN 1 Padang Pariaman</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik Logout Jika Anda Ingin Keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
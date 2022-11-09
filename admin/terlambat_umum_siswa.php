<?php 

    session_start();
    if(!isset($_SESSION['login'])){
        header('location:login-admin.php');
        exit;
    }
    require_once "../functions/functions.php";
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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

                <!-- membuat id otomatis -->
                <style>
                .header {
                    box-shadow: 1px 1px 5px grey;
                    background-position: center;
                    background-size: cover;
                }
                </style>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="col-12">
                        <!-- Page Heading -->
                        <div class="alert bg-light header" role="alert">
                            <h5 class="mb-1 mt-1 text-black">Tabel Data Terlambat Pengembalian Buku Umum Siswa</h1>
                        </div>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-black">Tabel Data Terlambat Pengembalian Buku
                                    Umum Siswa</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead class="text-center text-black">
                                            <tr class="bg-light">
                                                <th>No</th>
                                                <th>Nama_Siswa</th>
                                                <th>Judul_Buku</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal_Peminjaman</th>
                                                <th>Tanggal_Pengembalian</th>
                                                <th>Terlambat(Hari)</th>
                                                <th>Denda</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- data admin -->
                                            <?php 
                                            $no = 1;
                                            $dataPeminjaman = mysqli_query($koneksi, "SELECT * FROM tb_pinjam_umum_siswa INNER JOIN siswa ON siswa.id_siswa=tb_pinjam_umum_siswa.id_siswa WHERE CURDATE() > tgl_kembali AND status='Disetujui' AND pengembalian!='Disetujui' ORDER BY id_pumum DESC");
                                            foreach ($dataPeminjaman as $data) {
                                                
                                            $t = date_create($data['tgl_kembali']);
                                            $n = date_create(date('Y-m-d'));
                                            $terlambat = date_diff($t, $n);
                                            $hari = $terlambat->format("%a");

                                            // menghitung denda
                                            $denda = ($hari * $data['jumlah']) * 500;    
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no; ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['judul']; ?></td>
                                                <td class="text-center"><?= $data['jumlah']; ?></td>
                                                <td><?= $data['tanggal']; ?></td>
                                                <td><?= $data['tgl_kembali']; ?></td>
                                                <td class="text-center"><?= $hari ?></td>
                                                <td class="text-center"><?= $denda ?></td>

                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
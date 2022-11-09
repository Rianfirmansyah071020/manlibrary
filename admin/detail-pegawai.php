<?php 
    session_start();
    require_once "../functions/functions.php";
    $id = $_SESSION['login'];
    $dataAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'");
    $dataAdmin = mysqli_fetch_assoc($dataAdmin);
    $id = $_GET['id'];
    $dataPegawai = mysqli_query($koneksi, "SELECT* FROM pegawai WHERE id_pegawai='$id'");
    $dataPegawai = mysqli_fetch_array($dataPegawai);
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

                <!-- Begin Page Content -->
                <style>
                .header {
                    box-shadow: 1px 1px 5px grey;
                    background-position: center;
                    background-size: cover;
                }
                </style>
                <div class="container-fluid">
                    <div class="alert bg-light header" role="alert">
                        <h5 class="mb-1 mt-1 text-black text-capitalize">detail data pegawai</h5>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- form tambah admin -->
                        <div class="col-12">
                            <div class="p-5 shadow" style="background-color: white;">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <img style="border-radius: 20px;"
                                            src="../assets/gambar/<?= $dataPegawai['gambar'] ?>"
                                            alt="<?= $dataPegawai['nama'] ?>" class="image w-75 align-items-center ">
                                    </div>
                                    <div class="col-4 text-sm-left col-lg-5" style="text-align: left;">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>ID</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['id_pegawai'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Username</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['username'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Password</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['password'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>bidang</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['bidang'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['jekel'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['alamat'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Handphone</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['nohp'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Buat</th>
                                                <td>:</td>
                                                <td><?= $dataPegawai['tgl_buat'] ?></td>
                                            </tr>
                                        </table>
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
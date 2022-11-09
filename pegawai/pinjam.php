<?php 
    session_start();
    if(!isset($_SESSION['login_pegawai'])){
        header('location:login_pegawai.php');
        exit;
    }
    require_once "../functions/functions.php";
    $id_pegawai = $_SESSION['login_pegawai'];
    $dataUser = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
    $dataUser = mysqli_fetch_array($dataUser);

    $idBuku = $_GET['id'];
    $dataBuku = mysqli_query($koneksi, "SELECT * FROM stok_buku_umum WHERE id_buku_umum='$idBuku'");
    $dataBuku = mysqli_fetch_array($dataBuku);

    if(isset($_POST['kirim'])){
        if(insertPinjamUmumPegawai($_POST) > 0 ) {
            echo "<script>
            alert('Peminjaman berhasil diajukan silahkan ditunggu admin untuk memvalidasi peminjaman yang anda lakukan');
            document.location.href='peminjaman_pegawai.php';
            </script>";
        }else{
            echo "<script>
            alert('Peminjaman gagal diajukan');
            document.location.href='buku_umum_pegawai.php';
            </script>";
        }
    }
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
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dataUser['nama'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/gambar/<?= $dataUser['gambar']  ?>">
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

                <!-- membuat id otomatis -->
                <?php 
                $data = mysqli_query($koneksi, "SELECT MAX(id_pumum) AS ID FROM tb_pinjam_umum_pegawai");
                $data = mysqli_fetch_array($data);
                $kode = $data['ID'];
                $urutan = (int)substr($kode, 2, 5);
                $urutan++;
                $keterangan = "PU";
                $kodeAuto = $keterangan . sprintf("%05s", $urutan);
                ?>
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
                        <h5 class="mb-1 mt-1 text-black">Form Peminjaman Buku Umum</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center align-content-center">
                                            <img src="../assets/gambar/<?= $dataBuku['gambar'] ?>"
                                                alt="<?= $dataBuku['judul'] ?>" width="200">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="mt-3 mb-4">
                                                <tr>
                                                    <th>Judul </th>
                                                    <td>:</td>
                                                    <td><?= $dataBuku['judul'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Penulis </th>
                                                    <td>:</td>
                                                    <td><?= $dataBuku['penulis'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Kelas</th>
                                                    <td>:</td>
                                                    <td><?= $dataBuku['kelas'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jurusan</th>
                                                    <td>:</td>
                                                    <td><?= $dataBuku['jurusan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tahun Terbit</th>
                                                    <td>:</td>
                                                    <td><?= $dataBuku['tahun_terbit'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jumlah Buku Yang Tersedia</th>
                                                    <td>:</td>
                                                    <td><?= $dataBuku['jumlah'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="hidden" name="id_pumum" value="<?= $kodeAuto ?>">
                                            <input type="hidden" name="id_buku"
                                                value="<?= $dataBuku['id_buku_umum'] ?>">
                                            <input type="hidden" name="id_pegawai" value="<?= $id_pegawai ?>">
                                            <input type="hidden" name="judul" value="<?= $dataBuku['judul'] ?>">
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah Peminjaman</label>
                                                <input type="number" name="jumlah" id="jumlah"
                                                    placeholder="masukan jumlah buku yang dipinjam" required
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Peminjaman</label>
                                                <input type="text" name="tanggal" readonly value="<?= date('Y/m/d'); ?>"
                                                    id="tanggal" required class="form-control">
                                            </div>
                                            <div class=" row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-danger w-100 d-inline"
                                                        name="kirim">kirim</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                    <br><br>
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
        <script src="../admin/vendor/jquery/jquery.min.js"></script>
        <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../admin/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../admin/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../admin/js/demo/datatables-demo.js"></script>
</body>

</html>
<?php 
    session_start();
    require_once "../functions/functions.php";
    $id = $_SESSION['login'];
    $dataAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'");
    $dataAdmin = mysqli_fetch_assoc($dataAdmin);
    
    $id = $_GET['id'];
    $dataBuku = mysqli_query($koneksi, "SELECT* FROM stok_buku_koleksi WHERE id_buku_koleksi='$id'");
    $dataBuku = mysqli_fetch_array($dataBuku);

    if (isset($_POST['save'])){
        if (update_buku_koleksi($_POST) > 0 ) {
            echo "<script>
            alert('Data berhasil di update !');
            document.location.href='stok-buku-koleksi.php';
            </script>";
        }else {
            echo "<script>
            alert('Data gagal di update !');
            document.location.href='stok-buku-koleksi.php';
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
                <style>
                .header {
                    box-shadow: 1px 1px 5px grey;
                    background-position: center;
                    background-size: cover;
                }
                </style>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="alert bg-light header " role="alert">
                        <h5 class="mb-1 mt-1 text-black text-capitalize">update data buku koleksi</h5>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- form update buku -->
                        <div class="col-12">
                            <div class="p-5 shadow" style="background-color: white;">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <img style="border-radius: 20px;"
                                            src="../assets/gambar/<?= $dataBuku['gambar'] ?>"
                                            alt="<?= $dataBuku['judul'] ?>" class="image w-75 align-items-center ">
                                    </div>
                                    <div class="col-12 text-sm-left col-lg-5" style="text-align: left;">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $dataBuku['id_buku_koleksi'] ?>">
                                            <div class="form-group">
                                                <label for="no_rak">No Rak</label>
                                                <input type="text" name="no_rak" id="no_rak"
                                                    placeholder="masukan nomor atau nama rak" required
                                                    class="form-control" value="<?= $dataBuku['no_rak'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">JUDUL BUKU</label>
                                                <input type="text" name="judul" id="judul"
                                                    placeholder="masukan judul buku" value="<?= $dataBuku['judul'] ?>"
                                                    autocomplete="off" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="pengarang">PENGARANG</label>
                                                <input type="text" name="pengarang" id="pengarang" required
                                                    placeholder="masukan nama pengarang"
                                                    value="<?= $dataBuku['pengarang'] ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="penerbit">NAMA PENERBIT</label>
                                                <input type="text" name="penerbit" id="penerbit"
                                                    placeholder="masukan nama penerbit"
                                                    value="<?= $dataBuku['penerbit'] ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis">jenis</label> <br>
                                                <input type="radio" name="jenis" id="jenis"
                                                    <?php if($dataBuku['jenis_koleksi'] === "TEXT") echo "checked===checked" ?>
                                                    value="TEXT">
                                                TEXT
                                                <br>
                                                <input type="radio" name="jenis"
                                                    <?php if($dataBuku['jenis_koleksi'] === "FIKSI") echo "checked===checked" ?>
                                                    id="jenis" value="FIKSI"> FIKSI <br>
                                                <input type="radio" name="jenis" id="jenis"
                                                    <?php if($dataBuku['jenis_koleksi'] === "NON FIKSI") echo "checked===checked" ?>
                                                    value="NON FIKSI"> NON FIKSI
                                            </div>
                                            <div class="form-group">
                                                <label for="hal">JUMLAH HALAMAN</label>
                                                <input type="number" name="hal" id="hal"
                                                    placeholder="masukan halalaman buku" value="<?= $dataBuku['hal'] ?>"
                                                    required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">JUMLAH</label>
                                                <input type="number" name="jumlah" id="jumlah"
                                                    placeholder="masukan jumlah buku" value="<?= $dataBuku['jumlah'] ?>"
                                                    required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">GAMBAR</label>
                                                <input type="hidden" name="gambarlama"
                                                    value="<?= $dataBuku['gambar'] ?>" id="gambar">
                                                <input type="file" name="gambar" id="gambar" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button name="save" type="submit"
                                                    class="btn btn-info w-100">save</button>
                                            </div>
                                        </form>
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
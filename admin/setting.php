<?php 
    session_start();
    require_once "../functions/functions.php";
    $id = $_SESSION['login'];
    $dataAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id'");
    $dataAdmin = mysqli_fetch_assoc($dataAdmin);


    if (isset($_POST['save'])){
        if (update_admin($_POST) > 0 ) {
            echo "<script>
            alert('Data berhasil di update !');
            document.location.href='profile.php';
            </script>";
        }else {
            echo "<script>
            alert('Data gagal di update !');
            document.location.href='profile.php';
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
                    <div class="alert bg-light header" role="alert">
                        <h5 class="mb-1 mt-1 text-black text-capitalize">update data <?= $dataAdmin['nama'] ?></h5>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- form tambah admin -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <img style="border-radius: 50%; width:150px; height:150px;"
                                                src="../assets/gambar/<?= $dataAdmin['gambar'] ?>"
                                                alt="<?= $dataAdmin['nama'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-sm-left col-lg-7" style="text-align: left;">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" name="idadmin"
                                                        value="<?= $dataAdmin['id_admin'] ?>" id="id" readonly
                                                        class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="username">USERNAME</label>
                                                    <input type="text" name="username"
                                                        value="<?= $dataAdmin['username'] ?>" id="username"
                                                        placeholder="masukan username" required class="form-control"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">PASSWORD</label>
                                                    <input type="text" name="password"
                                                        value="<?= $dataAdmin['password'] ?>" id="password"
                                                        class="form-control" placeholder="masukan password" required
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama">NAMA</label>
                                                    <input type="text" name="nama" value="<?= $dataAdmin['nama'] ?>"
                                                        id="nama" class="form-control" placeholder="masukan nama"
                                                        required autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="bidang">BIDANG</label>
                                                    <input type="text" name="bidang" value="<?= $dataAdmin['bidang'] ?>"
                                                        id="bidang" class="form-control" placeholder="masukan bidang"
                                                        required autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="jekel">JENIS KELAMIN</label> <br>
                                                    <input type="radio" name="jekel" value="pria"
                                                        <?php if ($dataAdmin['jekel'] === 'pria') echo "checked=='checked'" ?>>PRIA
                                                    <input type="radio" name="jekel" value="wanita"
                                                        <?php if ($dataAdmin['jekel'] === 'wanita')  echo "checked=='checked'" ?>>WANITA
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamat">ALAMAT</label>
                                                    <input type="text" name="alamat" value="<?= $dataAdmin['alamat'] ?>"
                                                        id="alamat" class="form-control" placeholder="masukan alamat"
                                                        required autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nohp">NOMOR HP</label>
                                                    <input type="text" name="nohp" value="<?= $dataAdmin['nohp'] ?>"
                                                        id="nohp" placeholder="masukan nomor hp" class="form-control"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gambar">GAMBAR</label>
                                                    <input type="hidden" name="gambarlama"
                                                        value="<?= $dataAdmin['gambar'] ?>" id="gambar">
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
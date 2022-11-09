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
    if (isset($_POST['save'])) {
        if (insertBukuInduk($_POST) > 0 ) {
            echo "<script>
            alert('Data buku berhasil di simpan');
            document.location.href='buku-induk.php';
            </script>";
        }
        else {
            echo "<script> 
            alert('data buku gagal di simpan');
            document.location.href = 'buku-induk.php';
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

                <!-- membuat id otomatis -->
                <?php 
                $data = mysqli_query($koneksi, "SELECT MAX(id_buku) AS ID FROM buku_induk");
                $data = mysqli_fetch_array($data);
                $kode = $data['ID'];
                $urutan = (int)substr($kode, 3, 6);
                $urutan++;
                $keterangan = "BI";
                $kodeAuto = $keterangan . sprintf("%06s", $urutan);

                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Buku Induk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id">ID BUKU</label>
                                            <input type="text" name="idbuku" value="<?= $kodeAuto ?>" id="id" readonly
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="tglmasuk">TANGGAL MASUK</label>
                                            <input type="date" name="tglmasuk" id="tglmasuk" required
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">JUDUL</label>
                                            <input type="text" name="judul" id="judul" placeholder="masukan judul buku"
                                                required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nourut">NOMOR URUT</label>
                                            <input type="text" name="nourut" id="nourut"
                                                placeholder="masukan nomor urut buku" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="pengarang">PENGARANG</label>
                                            <input type="text" name="pengarang" id="pengarang"
                                                placeholder="masukan pengarang buku" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="penerbit">PENERBIT</label>
                                            <input type="text" name="penerbit" id="penerbit"
                                                placeholder="masukan penerbit buku" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">TAHUN TERBIT</label>
                                            <input type="number" name="tahun" id="tahun"
                                                placeholder="masukan tahun terbit buku" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="bahasa">BAHASA</label>
                                            <?php
                                        $bahasa = ["BAHASA INDONESIA", "BAHASA INGGRIS", "BAHASA JEPANG", "BAHASA JERMAN", "BAHASA BELANDA", "BAHASA ARAB","BAHASA KOREA"];
                                        ?>
                                            <select name="bahasa" id="bahasa" class="form-control">
                                                <option value="">PILIH BAHASA</option>
                                                <?php foreach($bahasa as $data) { ?>
                                                <option value="<?= $data ?>"><?= $data ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">JUMLAH</label>
                                            <input type="number" name="jumlah" id="jumlah"
                                                placeholder="masukan jumlah buku" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="sumber">SUMBER</label>
                                            <input type="text" name="sumber" id="sumber"
                                                placeholder="masukan sumber buku" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">HARGA</label>
                                            <input type="number" name="harga" id="harga"
                                                placeholder="masukan harga buku" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">KETERANGAN</label>
                                            <textarea name="keterangan" id="keterangan" required cols="30" rows="5"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">GAMBAR</label>
                                            <input type="file" name="gambar" id="gambar" class="form-control">
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary w-100 d-inline"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-info w-100 d-inline"
                                                    name="save">SAVE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Page Heading -->
                            <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                data-target="#exampleModalLong">
                                <i class="fas fa-plus"></i> Add Buku Induk
                            </button>
                            <p class="mb-4 text-capitalize">Tabel ini berisikan data buku induk perpustakaan MAN 1
                                Padang
                                Pariaman</p>

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-black">Tabel Data Buku Induk</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <thead class="text-center text-black">
                                                <tr>
                                                    <td colspan="2" class="text-left">
                                                        <a href="printBukuInduk.php" target="_blank"
                                                            class="btn btn-success">Report PDF
                                                            <i class="fas fa-upload"></i></a>
                                                    </td>
                                                    <td colspan="2" class="text-left">
                                                        <a href="printJumlahBukuInduk.php" target="_blank"
                                                            class="btn btn-info">Report PDF Jumlah Buku
                                                            <i class="fas fa-upload"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <th>No</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Judul</th>
                                                    <th>Pengarang</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Cover</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <!-- data buku induk -->
                                                <?php 
                                            $no = 1;
                                            $dataBukuInduk = mysqli_query($koneksi, "SELECT * FROM buku_induk ORDER BY tgl_masuk ASC");
                                            foreach ($dataBukuInduk as $data) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no; ?>.</td>
                                                    <td><?= $data['tgl_masuk']; ?></td>
                                                    <td><?= $data['judul']; ?></td>
                                                    <td><?= $data['pengarang']; ?></td>
                                                    <td class="text-center"><?= $data['jumlah']; ?></td>
                                                    <td><?= $data['keterangan']; ?></td>
                                                    <td class="text-center">
                                                        <img style="width: 60px; height:60px; border-radius:15px;"
                                                            src="../assets/gambar/<?= $data['gambar']; ?>"
                                                            alt="<?= $data['judul'] ?>">
                                                    </td>
                                                    <td class="text-left">
                                                        <a href="detail-buku-induk.php?id=<?= $data['id_buku'] ?>"
                                                            class="badge rounded-pill bg-primary text-light"
                                                            onclick="return confirm('apakah anda ingin melihat detail buku ini ?');">detail</a>
                                                        <a href="update-buku-induk.php?id=<?= $data['id_buku'] ?>"
                                                            class="badge rounded-pill bg-info text-light"
                                                            onclick="return confirm('apakah anda ingin mengupdate data buku ? ');">ubah</a>
                                                        <a href="delete-buku-induk.php?id=<?= $data['id_buku'] ?>"
                                                            class="badge rounded-pill bg-danger text-light"
                                                            onclick="return confirm('apakah anda ingin menghapus data buku ?');">hapus</a>
                                                    </td>
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
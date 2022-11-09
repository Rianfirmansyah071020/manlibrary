<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text">MAN 1 Padang Pariaman</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengelolaan Data
    </div>

    <!-- Menu admin-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuadmin" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-user-tie"></i>
            <span>Admin</span>
        </a>
        <div id="menuadmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Admin</h6>
                <a class="collapse-item" href="admin.php">Admin</a>
            </div>
        </div>
    </li>

    <!-- menu pegawai -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menupegawai" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Pegawai</span>
        </a>
        <div id="menupegawai" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Pegawai</h6>
                <a class="collapse-item" href="pegawai.php">Pegawai</a>
            </div>
        </div>
    </li>

    <!-- menu siswa -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menusiswa" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-user-graduate"></i>
            <span>Siswa</span>
        </a>
        <div id="menusiswa" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Siswa</h6>
                <a class="collapse-item" href="siswa.php">Siswa</a>
            </div>
        </div>
    </li>

    <!-- menu stok buku -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menustokbuku" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-book"></i>
            <span>Stok Buku</span>
        </a>
        <div id="menustokbuku" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Stok Buku</h6>
                <a class="collapse-item" href="stok-buku-umum.php">Buku Umum</a>
                <a class="collapse-item" href="stok-buku-koleksi.php">Buku Koleksi</a>
                <a class="collapse-item" href="buku_digital.php">Buku Digital</a>
            </div>
        </div>
    </li>
    <!-- stok buku digital -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menustokbukudigital"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-book"></i>
            <span>Stok Buku Digital</span>
        </a>
        <div id="menustokbukudigital" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Buku Digital</h6>
                
            </div>
        </div>
    </li> -->
    <!-- menu buku induk -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menubukuinduk" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-book"></i>
            <span>Buku Induk</span>
        </a>
        <div id="menubukuinduk" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Buku Induk</h6>
                <a class="collapse-item" href="buku-induk.php">Buku Induk</a>
            </div>
        </div>
    </li>

    <!-- menu peminjaman -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menupeminjaman" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-book-reader"></i>
            <span>Laporan Peminjaman</span>
        </a>
        <div id="menupeminjaman" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Peminjaman</h6>
                <a class="collapse-item" href="peminjaman_umum_siswa.php">Peminjaman Umum Siswa</a>
                <a class="collapse-item" href="peminjaman_koleksi_siswa.php">Peminjaman Koleksi Siswa</a>
                <a class="collapse-item" href="peminjaman_umum_pegawai.php">Peminjaman Umum Pegawai</a>
                <a class="collapse-item" href="peminjaman_koleksi_pegawai.php">Peminjaman Koleksi Pegawai</a>
            </div>
        </div>
    </li>
    <!-- menu keterlambatan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuterlambat" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-clock"></i>
            <span>Laporan Keterlambatan</span>
        </a>
        <div id="menuterlambat" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Keterlambatan</h6>
                <a class="collapse-item" href="terlambat_umum_siswa.php">terlambat Umum Siswa</a>
                <a class="collapse-item" href="terlambat_koleksi_siswa.php">Terlambat Koleksi Siswa</a>
                <a class="collapse-item" href="terlambat_umum_pegawai.php">Terlambat Umum Pegawai</a>
                <a class="collapse-item" href="terlambat_koleksi_pegawai.php">Terlambat Koleksi Pegawai</a>
            </div>
        </div>
    </li>


    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/logo MAN 1 PDG PARIAMAN.jpg" alt="Man 1 padang pariaman">
        <p class="text-center mb-2"><strong>MAN 1 Padang Pariaman</strong>
    </div>

</ul>
<!-- End of Sidebar -->
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
        menu siswa
    </div>

    <!-- Menu buku-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menubuku" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-book"></i>
            <span>Data Buku</span>
        </a>
        <div id="menubuku" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Buku Perpustakaan</h6>
                <a class="collapse-item" href="buku_umum_siswa.php">Buku Umum</a>
                <a class="collapse-item" href="buku_koleksi_siswa.php">Buku Koleksi</a>
                <a class="collapse-item" href="buku_digital.php">Buku Digital</a>
            </div>
        </div>
    </li>
    <!-- menu peminjaman -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menupeminjaman" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-book-open-reader"></i>
            <span>Peminjaman</span>
        </a>
        <div id="menupeminjaman" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Peminjaman</h6>
                <a class="collapse-item" href="peminjaman_siswa.php">Peminjaman Umum</a>
                <a class="collapse-item" href="peminjaman_koleksi_siswa.php">Peminjaman Koleksi</a>
            </div>
        </div>
    </li>
    <!-- terlambat -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menutelat" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-clock"></i>
            <span>Data Terlambat</span>
        </a>
        <div id="menutelat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Terlambat Pengembalian</h6>
                <a class="collapse-item" href="terlambat_umum.php">Buku Umum</a>
                <a class="collapse-item" href="terlambat_koleksi.php">Buku Koleksi</a>
            </div>
        </div>
    </li>
    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="../admin/img/logo MAN 1 PDG PARIAMAN.jpg"
            alt="Man 1 padang pariaman">
        <p class="text-center mb-2"><strong>MAN 1 Padang Pariaman</strong>
    </div>

</ul>
<!-- End of Sidebar -->
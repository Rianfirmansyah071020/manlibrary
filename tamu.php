<?php 
    require_once "functions/functions.php";
    
    $dataAdmin = mysqli_query($koneksi, "SELECT * FROM admin");    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Perpustakaan MAN 1 Padang Pariaman</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
#bac {
    height: 90vh;
}
</style>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>MANLIBRARY</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="tamu.php" class="nav-item nav-link active">Tamu</a>
                <a href="login/login.php" class="nav-item nav-link" target="_blank">login</a>

            </div>
            <a href="index.html" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"><i
                    class="fa fa-book me-3"></i>MANLIBRARY</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="assets/bac/1.jpg" alt="" id="bac">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"><i
                                        class="fa fa-book me-3"></i>Manlibrary</h5>
                                <h1 class="display-3 text-white animated slideInDown">Manlibrary MAN 1 Padang Pariaman
                                </h1>
                                <p class="fs-5 text-white mb-4 pb-2">Perpustakaan adalah sebuah tempat yang dapat
                                    memberikan anda semua keindahan dunia, dengan anda ke perpustakaan berarti anda
                                    menata kehidupan anda untuk menjadi orang yang memiliki wawasan yang sangat luas di
                                    hari kelak</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="assets/bac/office-gd3a79f187_1920.jpg" alt="" id="bac">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown"><i
                                        class="fa fa-book me-3"></i>Manlibrary</h5>
                                <h1 class="display-3 text-white animated slideInDown">Manlibrary MAN 1 Padang Pariaman
                                </h1>
                                <p class="fs-5 text-white mb-4 pb-2">Perpustakaan adalah sebuah tempat yang dapat
                                    memberikan anda semua keindahan dunia, dengan anda ke perpustakaan berarti anda
                                    menata kehidupan anda untuk menjadi orang yang memiliki wawasan yang sangat luas di
                                    hari kelak</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="text-center">
                    <h2 class="text-primary">Buku Yang Tersedia Di Perpustakaan</h2>
                </div>
                <?php 
                $buku = mysqli_query($koneksi, "SELECT * FROM stok_buku_umum");
                $buku2 = mysqli_query($koneksi, "SELECT * FROM stok_buku_koleksi");
                
                ?>

                <div class="row d-flex align-content-center justify-content-center m-4">
                    <?php foreach($buku as $row) { ?>
                    <div class="card col-12 col-lg-4" style="width: 18rem;">
                        <img src="assets/gambar/<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['judul'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['judul'] ?></h5>
                            <p class="card-text"><?= $row['jumlah'] ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="row d-flex align-content-center justify-content-center m-4">
                    <?php foreach($buku2 as $row) { ?>
                    <div class="card col-12 col-lg-4" style="width: 18rem;">
                        <img src="assets/gambar/<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['judul'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['judul'] ?></h5>
                            <p class="card-text"><?= $row['jumlah'] ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->





    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> Jl. Padang Bukit Tinggi Km. 37
                    </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> 0751-96168</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>manlubukalung@kemenag.go.id </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/4.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/5.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index.php">MANLIBRARY (2022)</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
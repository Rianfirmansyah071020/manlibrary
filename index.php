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
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="tamu.php" class="nav-item nav-link">Tamu</a>
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
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Ilmu Pengetahuan Alam</h5>
                            <p style="text-align: left;">Ilmu Pengetahuan Alam adalah pengetahuan yang sistematis dan
                                berlaku secara umum (universal) yang membahas tentang sekumpulan data mengenai gejala
                                alam yang dihasilkan berdasarkan hasil observasi, eksperimen, penyimpulan, dan
                                penyusunan teori Istilah Ilmu Pengetahuan Alam (IPA) dikenal juga dengan istilah ilmu
                                sains.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Ilmu Pengetahuan Sosial</h5>
                            <p style="text-align: left;">Ilmu Pengetahuan Sosial adalah suatu bahan kajian yang terpadu
                                yang merupakan penyederhanaan, adaptasi, seleksi dan modifikasi yang diorganisasikan
                                dari konsep-konsep dan keterampilan-keterampilan sejarah, geografi, sosiologi,
                                antropologi, dan ekonomi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Ilmu Pengetahuan Agama</h5>
                            <p style="text-align: left;">Pengetahuan agama adalah pengetahuan yang hanya diperoleh dari
                                Tuhan melalui para Nabi dan Rasul-Nya yang bersifat mutlak dan wajib diikuti para
                                pemeluknya. Menjadi tolak ukur kebenaran dalam suatu keyakinan dan perpegang pada
                                kitab yang dipegang para pememluknya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Ilmu Pengetahuan Pendukung</h5>
                            <p style="text-align: left;">Ilmu pengetahuan pendukung adalah ilmu pengetahuan yang dapat
                                membantu, mendukung dan bahkan bisa menambah pengetahuan dalam berbagai bidang ilmu
                                pengetahuan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100"
                            src="assets/bac/student-gac2894885_1920.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4 text-capitalize">selamat datang di MANLIBRARY</h1>
                    <p class="mb-4 text-capitalize">manlibrary adalah sebuah perpustakaan online berbasis website. yang
                        mana pada website ini pengguna dapat melakukan kegiatan layaknya perpustakaan konvensional,
                        seperti mencari buku, melakukan peminjaman buku dan bahkan bisa membaca
                        buku digital dengan gratis</p>

                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Categories Start -->
        <div class="container-xxl py-5 category">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Perpustakaan</h6>
                    <h1 class="mb-5 text-capitalize">Tentang Perpustakaan</h1>
                </div>
                <div class="row g-3">
                    <div class="col-lg-7 col-md-6">
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                                <a class="position-relative d-block overflow-hidden" href="">
                                    <img class="img-fluid" src="img/2.jpg" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                        style="margin: 1px;">
                                        <h5 class="m-0">MAN 1 Padang Pariaman</h5>

                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                                <a class="position-relative d-block overflow-hidden" href="">
                                    <img class="img-fluid" src="img/3.jpg" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                        style="margin: 1px;">
                                        <h5 class="m-0">MAN 1 Padang Pariaman</h5>

                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                                <a class="position-relative d-block overflow-hidden" href="">
                                    <img class="img-fluid" src="img/4.jpg" alt="">
                                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                        style="margin: 1px;">
                                        <h5 class="m-0">MAN 1 Padang Pariaman</h5>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                        <a class="position-relative d-block h-100 overflow-hidden" href="">
                            <img class="img-fluid position-absolute w-100 h-100" src="img/5.jpg" alt=""
                                style="object-fit: cover;">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                style="margin:  1px;">
                                <h5 class="m-0">MAN 1 Padang Pariaman</h5>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories Start -->


        <!-- Courses Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Buku Jurusan MAN 1 Padang Pariaman
                    </h6>
                    <h1 class="mb-5">Buku Perpustakaan</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="img/chemistry-g9baa6be4b_1920.jpg" alt="">
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">IPA</h3>
                                <h5 class="mb-4 text-capitalize pb-5 text-primary">ilmu pengetahuan alam</h5>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="img/wlan-g1bfffc978_1920.jpg" alt="">
                                <div class="text-center p-4 pb-0">
                                    <h3 class="mb-0">IPS</h3>
                                    <h5 class="mb-4 text-capitalize text-primary">ilmu pengetahuan sosial</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="img/quran-gd85af775a_1920.jpg" alt="">
                                <div class="text-center p-4 pb-0">
                                    <h3 class="mb-0">IPK</h3>
                                    <h5 class="mb-4 text-capitalize text-primary">ilmu pengetahuan keagamaan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Courses End -->


            <!-- Team Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title bg-white text-center text-primary px-3">Pegawai</h6>
                        <h1 class="mb-5">Pegawai Perpustakaan</h1>
                    </div>

                    <div class="row g-4">
                        <?php 
                   foreach ($dataAdmin as $data) { ?>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item bg-light">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="assets/gambar/<?= $data['gambar'] ?>"
                                        alt="<?= $data['nama'] ?>">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                                class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="mb-0"><?= $data['nama'] ?></h5>
                                    <small><?= $data['bidang'] ?></small> <br>
                                    <small><?= $data['nohp'] ?></small> <br>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <!-- Team End -->


            <!-- Testimonial Start -->
            <!-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="text-center">
                        <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                        <h1 class="mb-5">Our Students Say!</h1>
                    </div>
                    <div class="owl-carousel testimonial-carousel position-relative">
                        <div class="testimonial-item text-center">
                            <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                            <h5 class="mb-0">Client Name</h5>
                            <p>Profession</p>
                            <div class="testimonial-text bg-light text-center p-4">
                                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                            </div>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                            <h5 class="mb-0">Client Name</h5>
                            <p>Profession</p>
                            <div class="testimonial-text bg-light text-center p-4">
                                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                            </div>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                            <h5 class="mb-0">Client Name</h5>
                            <p>Profession</p>
                            <div class="testimonial-text bg-light text-center p-4">
                                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                            </div>
                        </div>
                        <div class="testimonial-item text-center">
                            <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                            <h5 class="mb-0">Client Name</h5>
                            <p>Profession</p>
                            <div class="testimonial-text bg-light text-center p-4">
                                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Testimonial End -->


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
                                <a class="btn btn-outline-light btn-social" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
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
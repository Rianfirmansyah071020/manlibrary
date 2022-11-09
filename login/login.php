<?php 
    session_start();   
    
            // pengecekkan login
        
    if(isset($_SESSION['login_pegawai'])){
        header('location:../pegawai/index.php');
        exit;
    }

    if(isset($_SESSION['login_siswa'])){
        header('location:../siswa/index.php');
        exit;
    }

    if(isset($_SESSION['login_admin'])){
        header('location:../admin/index.php');
        exit;
    }

    require_once("../functions/functions.php");

    if(isset($_POST['login'])){
        

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $level = htmlspecialchars($_POST['level']);
        $tgl_login = date('Y-m-d');

        // admin
        if($level == 'admin') {
             $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

                $cek = mysqli_affected_rows($koneksi);
                if($cek == false){
                    echo"<script>
                    alert('username atau password yang anda masukan tidak valid mohon periksa lagi');
                    document.location.href='login.php';
                    </script>"; 
                    
                }

                mysqli_query($koneksi, "INSERT INTO history_login (username,level, tgl_login) VALUES ('$username','admin', '$tgl_login')");
                
                if(mysqli_num_rows($query) === 1) {
                    
                    $dataAdmin = mysqli_fetch_assoc($query);

                    $_SESSION['login'] = $dataAdmin['id_admin'];

                    header('location:../admin/index.php');
                                exit;
                }
        }

        // login siswa
        if ($level == 'siswa') {
            
            $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE username='$username' AND password='$password'");

            $cek = mysqli_affected_rows($koneksi);
            if($cek == false){
                echo"<script>
                alert('username atau password yang anda masukan tidak valid mohon periksa lagi');
                document.location.href='login.php';
                </script>"; 
                
            }
            
             mysqli_query($koneksi, "INSERT INTO history_login (username,level, tgl_login) VALUES ('$username','siswa', '$tgl_login')");

            if(mysqli_num_rows($query) === 1) {
                
                $dataAdmin = mysqli_fetch_assoc($query);

                $_SESSION['login_siswa'] = $dataAdmin['id_siswa'];
                
                header('location:../siswa/index.php');
                exit;
            }
        }


        // login pegawai
        if ($level == 'pegawai'){
            $query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username='$username' AND password='$password'");

            $cek = mysqli_affected_rows($koneksi);
            if($cek == false){
                echo"<script>
                alert('username atau password yang anda masukan tidak valid mohon periksa lagi');
                document.location.href='login.php';
                </script>"; 
                
            }

            mysqli_query($koneksi, "INSERT INTO history_login (username,level, tgl_login) VALUES ('$username','pegawai', '$tgl_login')");
            
            if(mysqli_num_rows($query) === 1) {
                
                $dataAdmin = mysqli_fetch_assoc($query);

                $_SESSION['login_pegawai'] = $dataAdmin['id_pegawai'];
                
                header('location:../pegawai/index.php');
                exit;
            }
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

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    #bac {
        background-image: url('../assets/bac/5.jpg');
        background-position: center;
        background-size: cover;
    }

    body {
        background-color: aliceblue;
    }

    #btn {
        background-color: #51a1e1;
        color: aliceblue;
    }

    #btn:hover {
        background-color: aliceblue;
        color: aquamarine
    }
    </style>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" id="bac"> </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3>MANLIBRARY</h3>
                                        <h6>Login</h6>
                                    </div>
                                    <hr>
                                    <form action="" method="post" class="user mt-3">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" required
                                                placeholder="masukan username" class="form-control form-control-user"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-user" required
                                                placeholder="masukan password" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Login Sebagai</label>
                                            <select name="level" id="level" class="form-control">
                                                <option value="">--pilih--</option>
                                                <option value="admin">admin</option>
                                                <option value="pegawai">pegawai</option>
                                                <option value="siswa">siswa</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="login" class="btn w-100"
                                                style="border-radius:20px;" id="btn">login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
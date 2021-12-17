<?php 
session_start();

include "proses/koneksi.php";
$query = "SELECT nm_perusahaan, logo1 FROM tabel_info;";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);

?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
   
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css_js_gambar/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="css_js_gambar/style.css">
   <title>Login</title>
   
</head>
<body>
   
   <header>
      <nav class="bg-info bg-opacity-50 p-3">
         <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-center text-center">
            <div class="fs-2 navbar-text text-dark mx-auto">
               <div class="container-fluid text-center  text-lg-start fw-bold"><?= $data['nm_perusahaan'] ?></div>
            </div>
         </div>
      </nav>
   </header>
   
   <main>
      <?php
         if (isset($_SESSION['login_gagal'])){ // pesan gagal
            echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['login_gagal']."</div>"; 
            unset($_SESSION['login_gagal']);
         }
      ?>
      <div class="d-flex flex-column">
         <div class="fs-2 text-center my-4">Login</div>
         <form class="mx-auto col-10 col-md-6 col-lg-4 pb-4 border rounded border-primary" action="proses/proses_login.php" method="post">
            <div class="fs-2 text-center m-4">
               <img class="logo-login" src="css_js_gambar/gambar/<?= $data['logo1'] ?>" alt="LOGO">
            </div>
            <div class="m-3 mx-md-5">
               <label class="form-check-label" for="username">Username :</label>
               <input class="form-control" id="username" type="text" name="username" required autocomplete="off">
            </div>
            <div class="m-3 mx-md-5">
               <label class="form-check-label" for="password">Password :</label>
               <input class="form-control" id="password" type="password" name="password" required>
            </div>
            <div class="m-3 mx-md-5"><input class="btn btn-primary" type="submit" name="submit" value="Login"></div>
         </form>
      </div>
   </main>
   
   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

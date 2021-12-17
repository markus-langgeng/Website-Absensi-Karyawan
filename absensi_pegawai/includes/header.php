<?php 
include "cek_login.php"; 

include "proses/koneksi.php";
$query = "SELECT nm_perusahaan, logo2 FROM tabel_info;";
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
   <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

   <title> <?php echo $title; ?> </title>
   
</head>

<body>
   
<header class="navbar-header">
   
   <nav class="navbar navbar-expand-lg navbar-dark nav-container bg-dark">
      <div class="container align-items-start nav-container">
      <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-column flex-grow-0" id="navbarSupportedContent">
      
         <a class="navbar-brand nav-logo d-flex mb-3" href="beranda.php">
            <img class="logo mx-auto" src="css_js_gambar/gambar/<?= $data['logo2'] ?>" alt="LOGO">
         </a>
         <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-column  nav-ul">
            <li class="nav-item">
               <a class="nav-link <?php  if($title == "Beranda"){ echo "active\" aria-current=\"page"; }?>"  href="beranda.php"><i class='bx bx-home' ></i>  Beranda</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?php  if($title == "Formulir Absensi Pegawai"){ echo "active\" aria-current=\"page"; }?>" href="form_absen.php"><i class='bx bx-calendar-check'></i>  Absensi</a>
            </li>
            <?php 
            if($_SESSION['level']=="admin"){ // cek level user dengan variabel session yg sdh didefinisikan di proses login
               //menu data Pegawai
               echo "<li class=\"nav-item\">";
               echo "<a class=\"nav-link";
                  if($title == "Data Pegawai"){ 
                     echo " active\" aria-current=\"page"; 
                  }
               echo "\" href=\"data_pegawai.php\"><i class='bx bxs-user-detail'></i>  Data Pegawai</a>";
               echo "</li>";
            }
            ?>
            <li class="nav-item">
               <a class="nav-link <?php  if($title == "Data Absensi"){ echo "active\" aria-current=\"page"; }?>" href="data_absensi.php"><i class='bx bx-list-check' ></i>  Data Absensi</a>
            </li>
         </ul>
      </div>
      </div>
   </nav>
   
</header>

<main class="main-header">
   <div class="main-content container-main p-0 container-fluid ">
      
      <!--bg-dark-->
      <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center fs-3 py-3 text-center text-dark bg-header">
         <div class="order-2 order-lg-1 ms-lg-auto">
            <div class="fw-bold fs-2"><?= $data['nm_perusahaan'] ?></div>
            <div class="fs-6 text-black text-center py-1 px-2 mx-auto rounded-3 bg-custom width-custom">Selamat datang, <?php echo $_SESSION['username']; ?>.</div>
         </div> 
         <div class="pe-3 order-1 order-lg-2 align-self-end align-self-lg-center ms-lg-auto">
            <a class="logout-icon" href="proses/logout.php" title="logout">
               <svg height="36px" viewBox="0 0 24 24" width="36px">
                     <path d="M0 0h24v24H0z" fill="none"/><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
               </svg>
            </a>
         </div>
      </div>
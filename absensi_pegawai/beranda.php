<?php 
$title = "Beranda";
include "includes/header.php";

include "proses/koneksi.php";
$query = "SELECT * FROM tabel_info;";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
?>
      
      <div class="container d-flex flex-column px-4">
         <div class="gbr-container mx-auto">
            <img src="css_js_gambar/gambar/<?= $data['gbr_gedung'] ?>" alt="gedung perusahaan">
         </div>
      </div>
      <?php if($_SESSION['level']=="admin") { ?> 
         <div class="container d-flex justify-content-end px-4">
            <a class="btn btn-primary" href="edit_info.php" role="button">Edit Info Perusahaan</a>
         </div>
      <?php } ?>

      <div class="container px-4 py-5">
         <h2 class="fs-3">Visi :</h2>
         <?= html_entity_decode($data['visi']); ?>

         <h2 class="fs-3">Misi :</h2>
         <?= html_entity_decode($data['misi']); ?>

      </div>
      
   </div>
</main>
   
   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
   <?php 
   if(isset($_SESSION['absen_sukses'])) {
      echo $_SESSION['absen_sukses'];
      unset($_SESSION['absen_sukses']);
   }
   
   ?>
</body>
</html>
<?php
$title = "Detail Pegawai";
include "includes/header.php";
?>

<div class="container-fluid align-items-center">
   <div class="col-11 mx-auto d-md-flex align-items-baseline justify-content-between mt-3">
      <div class="d-flex col-12 align-items-center justify-content-around">
         <h1 class="me-auto">Detail Data</h1>
         <a class="" href="data_pegawai.php">
            <img class="" src="css_js_gambar/bootstrap/arrow-return-left.svg" alt="kembali" width="30" height="30">
         </a>
      </div>
   </div>
   <div class="table-responsive col-11 mx-auto my-3">
      <table class="table table-striped">
      
         <?php
         include "proses/koneksi.php";
         $nip = $_GET['nip'];
         $query = "SELECT * FROM pegawai WHERE nip='$nip';";
         $hasil = mysqli_query($koneksi, $query);
         $data = mysqli_fetch_array($hasil);
         ?>
         
         <tr>
            <th class="ps-3" scope="col">NIP</th>
            <th>:</th>
            <td> <?php echo $data['nip']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Nama Lengkap</th>
            <th>:</th>
            <td> <?php echo $data['nama_lengkap']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Jenis Kelamin</th>
            <th>:</th>
            <td> 
               <?php if($data['jK'] == "L"){ echo "Laki-Laki"; } else if($data['jK'] == "P"){ echo "Perempuan"; }?> 
            </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Alamat</th>
            <th>:</th>
            <td> <?php echo $data['alamat']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Tanggal Lahir</th>
            <th>:</th>
            <td> <?php echo $data['tgl_lahir']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Kota</th>
            <th>:</th>
            <td> <?php echo $data['kota']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Tanggal Bergabung</th>
            <th>:</th>
            <td> <?php echo $data['tgl_gabung']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">No. Telp</th>
            <th>:</th>
            <td> <?php echo $data['no_telp']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Email</th>
            <th>:</th>
            <td> <?php echo $data['email']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Jabatan</th>
            <th>:</th>
            <td> <?php echo $data['jabatan']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Foto</th>
            <th>:</th>
            <td> <img class="img_detail" src="css_js_gambar/gambar/<?php echo $data['foto'] ?>" alt="Foto profil pegawai"> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Username</th>
            <th>:</th>
            <td> <?php echo $data['username']; ?> </td>
         </tr>
         <tr>
            <th class="ps-3" scope="col">Password</th>
            <th>:</th>
            <td> <?php echo $data['password']; ?> </td>
         </tr>
         
      </table>
   </div>
</div>

</main>

   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

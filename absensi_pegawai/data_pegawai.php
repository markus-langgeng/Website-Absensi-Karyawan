<?php 
$title = "Data Pegawai";
include "includes/header.php";
?>

<div class="container-fluid align-items-center">
   <div class="col-11 mx-auto d-md-flex align-items-baseline justify-content-between mt-3">
      <h1 class="fs-2">Semua Pegawai</h1>
      <div>
         <a class="btn btn-primary btn-sm my-1" role="button" href="form_daftar.php">Daftarkan Pegawai Baru</a>
      </div>
   </div>
   <div class="table-responsive col-11 my-5 mx-auto">
      <table class="table table-striped">

         <!-- fitur pencarian -->
         <div class="d-flex">
            <form action="" method="post">
               <div class="col-auto p-1">
                  <input class="form-control" type="text" name="keyword" placeholder="Cari pegawai" autocomplete="off">
               </div>
               <div class="col-auto p-1">
                  <button class="btn btn-primary" type="submit" name="cari">Cari</button>
               </div>
            </form>
            <!-- fitur export-->
            <div class="ms-auto pe-1">
               <a class="btn btn-primary btn-sm my-1" role="button" href="export_pegawai.php" target="_blank">Export to Excel</a>
            </div>
         </div>
         
         <thead>
            <tr>
               <th scope="col">No.</th>
               <th scope="col">NIP</th>
               <th scope="col">Nama Lengkap</th>
               <th scope="col" class="text-center" >Jenis Kelamin</th>
               <th scope="col" class="text-center" >Tanggal Bergabung</th>
               <th scope="col">Jabatan</th>
               <th scope="col" class="text-center" >Aksi</th>
            </tr>
         </thead>
         
         <tbody>
         <?php 
         include "proses/koneksi.php";
         $query = "SELECT * FROM pegawai;";
         $hasil = mysqli_query($koneksi, $query);

         // fitur pencarian
         if(isset($_POST['cari'])){
            $query = "
               SELECT * FROM pegawai WHERE 
               nip LIKE '%".$_POST['keyword']."%'OR 
               nama_lengkap LIKE '%".$_POST['keyword']."%'";
            $hasil = mysqli_query($koneksi, $query);
         }
         
         $no = 1;
         $jum = mysqli_num_rows($hasil);
         echo "Banyak data : ".$jum;
         
         while ($data = mysqli_fetch_array($hasil)) {?>
            <tr>
               <th scope="row"><?php echo $no++; ?></th>
               <td> <?php echo $data['nip']; ?> </td>
               <td> <?php echo $data['nama_lengkap']; ?> </td>
               <td class="text-center" > <?php echo $data['jK']; ?> </td>
               <td class="text-center" > <?php echo $data['tgl_gabung']; ?> </td>
               <td> <?php echo $data['jabatan']; ?> </td>
               <td> 
                  <div class="d-grid col gap-2 d-lg-flex justify-content-center">
                     <a class="btn btn-primary btn-sm my-1" role="button" href="detail.php?nip=<?php echo $data['nip']; ?>">Detail</a>
                     <a class="btn btn-primary btn-sm my-1" role="button" href="update.php?nip=<?php echo $data['nip']; ?>">Update</a>
                     <a class="btn btn-danger btn-sm my-1" role="button" href="delete.php?nip=<?php echo $data['nip']; ?>" onclick="return confirm('Apakah Anda yakin?')" >Delete</a>
                  </div>
               </td>
            </tr>
         <?php  } ?>
         </tbody>
      </table>
   </div>
</div>


</main>
   
   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
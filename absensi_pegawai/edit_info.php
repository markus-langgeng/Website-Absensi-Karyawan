<?php 
$title = "Edit Info";
include "includes/header.php";
?>

   <div>
      <?php
      //pesan
         if (isset($_SESSION['update_gagal'])) {
            echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['update_gagal']."</div>";
            unset($_SESSION['update_gagal']);
         }
      ?>
   </div>

   <div class="col-10 col-md-8 mx-auto my-4">
      <div class="fs-3 mx-auto text-center pb-5">Edit Info</div>
         <form class="mx-auto" action="proses/proses_edit_info.php" method="post" enctype="multipart/form-data">
            <div class="table-responsive p-2">
               <table class="table table-borderless mb-5">
                  
                  <?php  
               
                  include "proses/koneksi.php";
                  $query = "SELECT * FROM tabel_info";
                  $hasil = mysqli_query($koneksi, $query);
                  $data = mysqli_fetch_array($hasil);

                  ?>
                  <tr> 
                     <td> <label class="form-check-label" for="nm_perusahaan"> Nama Perusahaan </label> </td>
                     <td> : </td>
                     <td>
                        <input class="form-control" id="nm_perusahaan" type="text" name="nm_perusahaan" value="<?php echo $data['nm_perusahaan'] ?>">
                     </td>
                  </tr>
                  <tr> 
                     <td> <label class="form-check-label" for="logo1">Logo 1 (di halaman login)</label> </td>
                     <td> : </td>
                     <td><input class="form-control" id="logo1" type="file" name="logo1" ></td>
                  </tr>
                  <tr> 
                     <td> <label class="form-check-label" for="logo2">Logo 2 (di navbar)</label> </td>
                     <td> : </td>
                     <td><input class="form-control" id="logo2" type="file" name="logo2" ></td>
                  </tr>
                  <tr> 
                     <td> <label class="form-check-label" for="gedung">Foto Gedung Perusahaan</label> </td>
                     <td> : </td>
                     <td>
                     <input class="form-control" id="gedung" type="file" name="gedung">
                     </td>
                  </tr>
                  <tr> 
                     <td> <label class="form-check-label" for="visi">Visi</label> </td>
                     <td> : </td>
                     <td> 
                        <textarea class="form-control" name="visi" id="visi" cols="30" rows="5" ><?php echo $data['visi'] ?></textarea>
                     </td> 
                  </tr>
                  <tr> 
                     <td> <label class="form-check-label" for="misi">Misi</label> </td>
                     <td> : </td>
                     <td> 
                        <textarea class="form-control" name="misi" id="misi" cols="30" rows="10"><?php echo $data['misi'] ?></textarea>
                     </td> 
                  </tr>
                  
               </table>
               
            </div>
            <div class="container-fluid p-0 gap-2 d-md-flex justify-content-between">
               <input class="btn btn-primary" type="submit" value="Kirim" name="kirim" id="kirim-data-absensi">
               <a class="btn btn-danger" role="button" href="beranda.php" formnovalidate >Batal</a>
            </div>
         </form>
      </div>
   </div>
   
</main>
   
   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

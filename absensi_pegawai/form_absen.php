<?php 
$title = "Formulir Absensi Pegawai";
include "includes/header.php";

include "proses/koneksi.php";

if(isset($_SESSION['username'])){   
   $username = $_SESSION['username'];
   $query = "SELECT * FROM pegawai WHERE username='$username';";
   $hasil = mysqli_query($koneksi, $query);
   $data = mysqli_fetch_array($hasil);
}

//pesan
if(isset($_SESSION['absen_gagal'])) {
   echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['absen_gagal']."</div>";
   unset($_SESSION['absen_gagal']);
}else if(isset($_SESSION['error4'])){
   echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['error4']."</div>";
   unset($_SESSION['error4']);
}else if(isset($_SESSION['ext_salah'])){
   echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['ext_salah']."</div>";
   unset($_SESSION['ext_salah']);
}else if(isset($_SESSION['ukuran_salah'])){
   echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['ukuran_salah']."</div>";
   unset($_SESSION['ukuran_salah']);
}
?>
<div class="col-10 col-md-8 mx-auto my-4">
   <div class="fs-3 mx-auto text-center pb-5">Formulir Absensi Pegawai</div>
      <form class="mx-auto" action="proses/proses_absen.php" method="post" enctype="multipart/form-data">
         <div class="table-responsive p-2">
            <table class="table table-borderless mb-5">
               
               <tr> <!--NIP-->
                  <td> <label class="form-check-label" for="nip"> NIP </label> </td>
                  <td> : </td>
                  <td><input class="form-control" id="nip" type="text" name="nip" value="<?php if(isset($_SESSION['username'])){ echo $data['nip']; } ?>" readonly></td>
               </tr>
               <tr> <!--Tanggal-->
                  <td> <label class="form-check-label" for="tgl_absen">Tanggal</label> </td>
                  <td> : </td>
                  <td><input class="form-control" id="tgl_absen" type="date" name="tanggal" value="<?php echo date('Y-m-d') ?>" readonly></td>
               </tr>
               <tr> <!--Kehadiran-->
                  <td>Kehadiran</td>
                  <td> : </td>
                  <td>
                     <div class="d-md-flex">
                        <div class="me-3">
                           <input id="hadir" type="radio" name="status" value="H" required>
                           <label class="form-check-label" for="hadir"> Hadir </label>
                        </div>
                        <div class="me-3">
                           <input id="izin" type="radio" name="status" value="I" required>
                           <label class="form-check-label" for="izin"> Izin </label>
                        </div>
                        <div class="me-3">
                           <input id="sakit" type="radio" name="status" value="S" required>
                           <label class="form-check-label" for="sakit"> Sakit </label>
                        </div>
                     </div>
                  </td>
               </tr>
               </tr>
               <tr> <!--Foto Izin -->
                  <td>  <label class="form-check-label" for="foto">Foto Surat Izin/Sakit</label> </td>
                  <td> : </td>
                  <td>
                  <input class="form-control" id="Foto" type="file" accept=".jpg, .jpeg, .png" name="foto" >
                  <p class="m-0">*Ekstensi file harus berupa jpg, jpeg, atau png.</p>
                  <p class="m-0">*Ukuran file tidak boleh melebihi 2MB.</p>
                  <td>
               </tr>
               
            </table>
            
         </div>
            <div class="container-fluid p-0 gap-2 d-md-flex justify-content-between">
               <input class="btn btn-primary" type="submit" value="Kirim" name="kirim" id="kirim-data-absensi">
               <a class="btn btn-danger" role="button" href="beranda.php" formnovalidate >Batal</a>
            </div>
      </form>
</div>
   
</main>
   
   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

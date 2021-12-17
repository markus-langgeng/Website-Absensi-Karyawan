<?php 
// di sini g ada session_start() lagi krn udh ada di header
$title = "Formulir Pendaftaran Pegawai";
include "includes/header.php"
?>

      <div class="container-fluid py-3">
         <?php //pesan-pesan
            if (isset($_SESSION['data_tersimpan'])){ // pesan sukses
               echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['data_tersimpan']."</div>"; 
               unset($_SESSION['data_tersimpan']); 
            }
            else if(isset($_SESSION['pendaftaran_gagal'])){ // pesan gagal
               echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['pendaftaran_gagal']."</div>";
               unset($_SESSION['pendaftaran_gagal']);
            }
            else if(isset($_SESSION['error4'])){ // gbr belum diupload
               echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['error4']."</div>"; 
               unset($_SESSION['error4']); 
            }
            else if(isset($_SESSION['ext_salah'])){ // ekstensi gambar salah
               echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['ext_salah']."</div>";
               unset($_SESSION['ext_salah']);
            }
            else if(isset($_SESSION['ukuran_salah'])){ // ukuran gambar terlalu besar
               echo "<div class='bg-danger text-white text-center p-1'>".$_SESSION['ukuran_salah']."</div>";
               unset($_SESSION['ukuran_salah']);
            }
         ?>
         <div class="col-10 col-md-8 mx-auto my-4">
            <div class="fs-3 mx-auto text-center pb-5">Formulir Pendaftaran Pegawai</div>
            
            <form class="mx-auto" action="proses/proses_form_daftar.php" method="post" enctype="multipart/form-data">
               <div class="table-responsive p-2">
                  
                  <table class="table table-borderless mb-5">
                  
                     <tr> <!--NIP-->
                        <td> <label class="form-check-label" for="nip">NIP</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="nip" type="text" name="nip" required></td>
                     </tr>
                     <tr> 
                        <td> <label class="form-check-label" for="nama_lengkap">Nama Lengkap</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="nama_lengkap" type="text" name="nama" required></td>
                     </tr>
                     <tr> <!--Jenis Kelamin-->
                        <td> Jenis Kelamin </td>
                        <td> : </td>
                        <td>
                           <div class="d-md-flex">
                              <div class="me-3">
                                 <input class="form-check-input" id="laki-laki" type="radio" name="jenkel" value="L" required> 
                                 <label class="form-check-label" for="laki-laki" >Laki-laki</label>
                              </div>
                              <div class="me-3">
                                 <input class="form-check-input" id="perempuan" type="radio" name="jenkel" value="P" required> 
                                 <label class="form-check-label" for="perempuan" >Perempuan</label>
                              </div>
                           </div>
                        </td>
                        </tr>
                     <tr> <!--Alamat-->
                        <td> <label class="form-check-label" for="alamat">Alamat</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="alamat" type="text" name="alamat" required></td>
                     </tr>
                     <tr> <!--Tanggal Lahir-->
                        <td> <label class="form-check-label" for="tgl_lahir">Tanggal Lahir</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir" required></td>
                     </tr>
                     <tr> <!--Kota-->
                        <td> <label class="form-check-label" for="kota">Kota</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="kota" type="text" name="kota" required></td>
                     </tr>
                     <tr> <!--Tanggal Bergabung-->
                        <td> <label class="form-check-label" for="tgl_gabung">Tanggal Bergabung</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="tgl_gabung" type="date" name="tgl_gabung" required></td>
                     </tr>
                     <tr> <!--No. Telepon-->
                        <td> <label class="form-check-label" for="no_telp">No. Telepon</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="no_telp" type="text" name="no_tel" required></td>
                     </tr>
                     <tr> <!--Email-->
                        <td> <label class="form-check-label" for="email">Email</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="email" type="email" name="email" required></td>
                     </tr>
                     <tr> <!--NIP-->
                        <td> <label class="form-check-label" for="jabatan">Jabatan</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="jabatan" type="text" name="jabatan" required></td>
                     </tr>
                     <tr> <!--Foto-->
                        <td>  <label class="form-check-label" for="foto">Foto</label> </td>
                        <td> : </td>
                        <td>
                           <input class="form-control" id="Foto" type="file" accept=".jpg, .jpeg, .png" name="foto" required>
                           <p class="m-0">*Ekstensi file harus berupa jpg, jpeg, atau png.</p>
                           <p class="m-0">*Ukuran file tidak boleh melebihi 2MB.</p>
                       <td>
                     </tr>
                     <tr> <!-- Usename untuk masuk user -->
                        <td> <label class="form-check-label" for="username">Username</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="username" type="text" name="username" required></td>
                     </tr>

                     <tr> <!-- password untuk masuk user -->
                        <td> <label class="form-check-label" for="password">Password</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="password" type="password" name="password" required></td>
                     </tr>
                     
                  </table>
                  <div class="container-fluid p-0 gap-2 d-md-flex justify-content-between">
                     <input class="btn btn-primary" type="submit" value="Kirim" name="kirim" >
                     <a class="btn btn-danger" role="button" href="data_pegawai.php"  formnovalidate>Batal</a>
                  </div>
                  
               </div>
            </form>
            
         </div>
      </div>
   </main>
   
   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
   <script src="css_js_gambar/script.js"></script>
</body>

</html>

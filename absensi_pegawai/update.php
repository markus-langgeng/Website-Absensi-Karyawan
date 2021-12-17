<?php 
// di sini g ada session_start() lagi krn udh ada di header
$title = "Update Pendaftaran Pegawai";
include "includes/header.php"
?>

      <div class="container-fluid py-3">
         <?php //pesan-pesan
            if(isset($_SESSION['error4'])){ 
               echo $_SESSION['error4']; 
               unset($_SESSION['error4']); 
            }
            else if(isset($_SESSION['ext_salah'])){
               echo $_SESSION['ext_salah'];
               unset($_SESSION['ext_salah']);
            }
            else if(isset($_SESSION['ukuran_salah'])){
               echo $_SESSION['ukuran_salah'];
               unset($_SESSION['ukuran_salah']);
            }
            else if(isset($_SESSION['update_gagal'])){
               echo $_SESSION['update_gagal'];
               unset($_SESSION['update_gagal']);
            }
         ?>
         <div class="col-10 col-md-8 mx-auto my-4">
            <div class="fs-4 mx-auto text-center pb-5">Formulir Pendaftaran Pegawai</div>
            <form class="mx-auto" action="proses/proses_update.php" method="post" enctype="multipart/form-data">
               <div class="table-responsive p-2">
                  
                  <table class="table table-borderless mb-5">
                  <?php
                  $nip = $_GET['nip'];
                  include "proses/koneksi.php";
                  $query = "SELECT * FROM pegawai WHERE nip='$nip';";
                  $hasil = mysqli_query($koneksi, $query);
                  $data = mysqli_fetch_array($hasil);
                  ?>
                     <tr>
                        <td> NIP </td>
                        <td> : </td>
                        <td><input class="form-control" id="nip" type="text" name="nip" value="<?php echo $data['nip']; ?>" readonly></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="nama_lengkap">Nama Lengkap</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="nama_lengkap" type="text" name="nama" value="<?php echo $data['nama_lengkap']; ?>" required></td>
                     </tr>
                     <tr>
                        <td>Jenis Kelamin</td>
                        <td> : </td>
                        <td>
                           <div class="d-md-flex">
                              <div class="me-3">
                                 <input class="form-check-input me-1" id="laki-laki" type="radio" name="jenkel" value="L" <?php if($data['jK'] == "L") {echo "checked"; } ?> required> 
                                 <label class="form-check-label" for="laki-laki">Laki-laki</label>
                              </div>
                              <div class="me-3">
                                 <input class="form-check-input me-1" id="perempuan" type="radio" name="jenkel" value="P" <?php if($data['jK'] == "P") {echo "checked"; } ?> required> 
                                 <label class="form-check-label" for="perempuan">Perempuan</label>
                              </div>
                           </div>
                           </td>
                        </tr>
                     <tr>
                        <td> <label class="form-check-label" for="alamat">Alamat</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="alamat" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="tgl_lahir">Tanggal Lahir</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="kota">Kota</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="kota" type="text" name="kota" value="<?php echo $data['kota']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="tgl_gabung">Tanggal Bergabung</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="tgl_gabung" type="date" name="tgl_gabung" value="<?php echo $data['tgl_gabung']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="no_telp">No. Telepon</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="no_telp" type="text" name="no_tel" value="<?php echo $data['no_telp']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="email">Email</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="jabatan">Jabatan</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="jabatan" type="text" name="jabatan" value="<?php echo $data['jabatan']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="foto">Foto</label> </td>
                        <td> : </td>
                        <td>
                           <input class="form-control" id="foto" type="file" accept=".jpg, .jpeg, .png" name="foto" required>
                           <p class="m-0">*Ekstensi file harus berupa jpg, jpeg, atau png.</p>
                           <p class="m-0">*Ukuran file tidak boleh melebihi 2MB.</p>
                       <td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="username">Username</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="username" type="text" name="username" value="<?php echo $data['username']; ?>" required></td>
                     </tr>
                     <tr>
                        <td> <label class="form-check-label" for="password">Password</label> </td>
                        <td> : </td>
                        <td><input class="form-control" id="password" type="password" name="password" value="<?php echo $data['password']; ?>" required></td>
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
</body>

</html>

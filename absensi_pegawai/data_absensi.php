<?php 
$title = "Data Absensi";
include "includes/header.php";
?>

<div class="container-fluid align-items-center">
   <div class="col-11 mx-auto d-md-flex align-items-baseline justify-content-between mt-3">
      <h1 class="fs-2">Data Absensi</h1>
   </div>
   <div class="table-responsive col-11 my-5 mx-auto">
      <table class="table table-striped">
      
         <!--fitur berdasarkan tanggal-->
         <div class="d-flex">
            <form action="" method="post">
               <div class="col-auto p-1">
                  <input class="form-control" type="date" name="tanggal">
               </div>
               <div class="col-auto p-1">
                  <button class="btn btn-primary" type="submit" name="filter">Filter</button>
               </div>
               <div class="col-auto p-1">
                  <button class="btn btn-primary" type="submit" name="reset">Reset Tabel</button>
               </div>
            </form>
            <!-- filter export-->
            <div class="ms-auto pe-1">
               <a class="btn btn-primary btn-sm my-1" role="button" href="export_absensi.php" target="_blank">Export to Excel</a>
            </div>
         </div>
         
   
         <thead>
            <tr>
               <th scope="col">No.</th>
               <th scope="col">Tanggal Absensi</th>
               <th scope="col">Waktu</th>
               <th scope="col">NIP</th>
               <th scope="col">Nama Lengkap</th>
               <th scope="col" class="text-center" >Status</th>
               <th scope="col" class="text-center keterangan" >Keterangan</th>
            </tr>
         </thead>
         <!--belum selesai-->
         <tbody>
         <?php 
         include "proses/koneksi.php";
         $level = $_SESSION['level'];
         $filter = isset($_POST['filter']);
         $reset = isset($_POST['reset']);
         if($level=="admin" ){
            $query = "
               SELECT p.nip, p.nama_lengkap, a.tgl, a.waktu, a.status, a.foto
               FROM pegawai p
               INNER JOIN absensi a
               ON p.nip = a.nip
               ORDER BY a.id DESC;
            ";
            
            if($filter){ // untuk filter berdasarkan tanggal
               $tgl = date('Y-m-d', strtotime($_POST['tanggal'])); // ambil tgl yg tipenya string & ubah tipenya ke date
               $query = "
                  SELECT p.nip, p.nama_lengkap, a.tgl, a.waktu, a.status, a.foto
                  FROM pegawai p
                  INNER JOIN absensi a
                  ON p.nip = a.nip
                  WHERE a.tgl='$tgl' 
                  ORDER BY a.id DESC;
               ";
            } 
         }else if($level=="user" ){
            $username = $_SESSION['username'];
            $query = "
               SELECT p.nip, p.nama_lengkap, a.tgl, a.waktu, a.status, a.foto
               FROM pegawai p
               INNER JOIN absensi a
               ON p.nip = a.nip
               WHERE p.username = '$username'
               ORDER BY a.id DESC;
            ";
            
            if($filter){ // untuk filter berdasarkan tanggal
               $tgl = date('Y-m-d', strtotime($_POST['tanggal'])); // ambil tgl yg tipenya string & ubah tipenya ke date
               $query = "
                  SELECT p.nip, p.nama_lengkap, a.tgl, a.waktu, a.status, a.foto
                  FROM pegawai p
                  INNER JOIN absensi a
                  ON p.nip = a.nip
                  WHERE a.tgl='$tgl' AND p.username = '$username'
                  ORDER BY a.id DESC;
               ";
            }
         }
         
         $hasil = mysqli_query($koneksi, $query);
         
         $no = 1;
         $jum = mysqli_num_rows($hasil);
         echo "Banyak data : ".$jum;
         
         while ($data = mysqli_fetch_array($hasil)) {?>
            <tr>
               <th scope="row"><?php echo $no++; ?></th>
               <td> <?php echo $data['tgl']; ?> </td>
               <td> <?php echo $data['waktu']; ?> </td>
               <td> <?php echo $data['nip']; ?> </td>
               <td> <?php echo $data['nama_lengkap']; ?> </td>
               <td class="text-center" > <?php echo $data['status']; ?> </td>
               <td class="text-center"> 
                  <?php if($data['foto'] != null){?>
                     <a href="css_js_gambar/gambar/<?php echo  $data['foto']?>" target="_blank">Surat</a>

                  <?php } ?>
               </td>   
               
         <?php  } ?>
         </tbody>
      </table>
   </div>
</div>

</main>
   <script src="css_js_gambar/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

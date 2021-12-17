<?php
    // conver ke bentuk excel
    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>

<h3>Data Pegawai</h3>
<table class="table table-striped" border="1">
         
         <thead>
            <tr>
               <th scope="col">No.</th>
               <th scope="col">NIP</th>
               <th scope="col">Nama Lengkap</th>
               <th scope="col" class="text-center" >Jenis Kelamin</th>
               <th scope="col" class="text-center" >Tanggal Bergabung</th>
               <th scope="col">Jabatan</th>
            </tr>
         </thead>
         
         <tbody>
         <?php 
         include "proses/koneksi.php";
         $query = "SELECT * FROM pegawai;";
         $hasil = mysqli_query($koneksi, $query);

         // fitur pencarian
         if(isset($_POST['cari'])){
            $hasil =mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip LIKE '%".$_POST['keyword']."%'OR nama_lengkap 
            LIKE '%".$_POST['keyword']."%'");
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
            </tr>
         <?php  } ?>
         </tbody>
      </table>
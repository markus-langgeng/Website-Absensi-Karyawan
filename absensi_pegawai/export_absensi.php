<?php
    // conver ke bentuk excel
    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Absensi.xls");
?>

<h3>Data Absensi</h3>
<table class="table table-striped" border="1">
         
   
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
         $query = "
         SELECT p.nip, p.nama_lengkap, a.tgl, a.waktu, a.status, a.foto
         FROM pegawai p
         INNER JOIN absensi a
         ON p.nip = a.nip
         ORDER BY a.id DESC;
         ";
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
                     <a href="http://localhost/absensi_pegawai/css_js_gambar/gambar/<?php echo  $data['foto']?>" target="_blank">Surat</a>

                  <?php } ?>
               </td>
               
               <?php  } ?>
         </tbody>
      </table>
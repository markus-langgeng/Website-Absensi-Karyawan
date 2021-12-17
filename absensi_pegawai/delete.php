<?php
include "proses/koneksi.php";

$nip = $_GET['nip'];
$query = "DELETE FROM pegawai WHERE nip='$nip';";
$hasil = mysqli_query($koneksi, $query);

if($hasil){
   header("Location: data_pegawai.php");
}
?>
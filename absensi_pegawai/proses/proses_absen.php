<?php
session_start();

include "koneksi.php";

$tgl = $_POST['tanggal'];
$nip = $_POST['nip'];

//$nama = $_POST['nama'];
$status = $_POST['status'];
$keterangan = $_POST['foto'];

date_default_timezone_set('Asia/Jakarta');
$waktu = date('H:i:s'); //jam, menit, dtk


$kirim = $_POST['kirim'];

if($status == "H"){
   //masukkan data ke tabel absensi
   $query = "
      INSERT INTO absensi (nip, tgl, status, waktu)
      VALUES
      ('$nip', '$tgl', '$status', '$waktu');
   ";
   
   if($kirim){
      $hasil = mysqli_query($koneksi, $query);
      if($hasil) {
         $_SESSION['absen_sukses'] = "<script> window.onload = function absen_sukses(){ alert(\"Absensi berhasil\"); } </script>";  
         header ("Location: ../beranda.php");
      }else {
         $_SESSION['absen_gagal'] = "gagal";
         header("Location: ../form_absen.php");
      }
   }
}
else if($status == "I" || $status == "S"){
   //utk foto
   $nama_file = $_FILES['foto']['name']; 
   $tmp_name = $_FILES['foto']['tmp_name'];
   $ukuran_file = $_FILES['foto']['size'];
   $error = $_FILES['foto']['error'];

   //cek apakah tdk ada foto yg diupload
   if ($error === 4) {
      $_SESSION['error4'] = "Mohon upload surat izin/sakit terlebih dahulu.";
      header('Location: ../form_absen.php');
      die();
   }

   //cek ekstensi foto
   $ext_file = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
   if ($ext_file != 'jpg' && $ext_file != 'jpeg' && $ext_file != 'png'){
      $_SESSION['ext_salah'] = "Ekstensi yang valid adalah jpg, jpeg, dan png";
      header('Location: ../form_absen.php');
      die();
   }

   //cek klo ukuran > 2MB
   if ($ukuran_file > 2000000) {
      $_SESSION['ukuran_salah'] = "Ukuran gambar maksimal 2MB";
      header('Location: ../form_absen.php');
      die();
   }

   //buat nama baru supaya g ada yg sama
   $nama_file_baru = uniqid();
   $nama_file_baru = $nama_file_baru.'.'.$ext_file;
   $nama_file = $nama_file_baru;

   //klo lulus semua cek, upload
   $target_dir = "../css_js_gambar/gambar/";
   move_uploaded_file($tmp_name, $target_dir.$nama_file);


   if($kirim) {
      //masukkan data ke tabel absensi
      $query = "
         INSERT INTO absensi (nip, tgl, status, waktu, foto)
         VALUES
         ('$nip', '$tgl', '$status', '$waktu', '$nama_file');
      ";
      
      $hasil = mysqli_query($koneksi, $query);
      if($hasil) {
         $_SESSION['absen_sukses'] = "<script> window.onload = function absen_sukses(){ alert(\"Absensi berhasil\"); } </script>";
         header ("Location: ../beranda.php");
      }else {
         $_SESSION['absen_gagal'] = "gagal";
         header("Location: ../form_absen.php");
      }
   }
}






?>
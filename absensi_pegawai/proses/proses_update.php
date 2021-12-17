<?php
session_start();
include "koneksi.php";

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jK = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$kota = $_POST['kota'];
$tgl_gabung = $_POST['tgl_gabung'];
$no_telp = $_POST['no_tel'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$username= $_POST['username'];
$password = $_POST['password'];
$kirim = $_POST['kirim'];


//utk password, dienkripsi dulu
$pengacak="p3ng4c4k";
$passmd=md5($pengacak . md5($password));

//utk foto
$nama_file = $_FILES['foto']['name']; // nyimpan nama foto ke dlm variabel
$tmp_name = $_FILES['foto']['tmp_name'];
$ukuran_file = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];

//cek apakah tdk ada foto yg diupload
if ($error === 4) {
   $_SESSION['error4'] = "Mohon upload foto terlebih dahulu.";
   header('Location: ../update.php?nip='.$nip);
   die();
}

//cek ekstensi foto
$ext_file = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
if ($ext_file != 'jpg' && $ext_file != 'jpeg' && $ext_file != 'png'){
   $_SESSION['ext_salah'] = "Ekstensi yang valid adalah jpg, jpeg, dan png";
   header('Location: ../update.php?nip='.$nip);
   die();
}

//cek klo ukuran > 2MB
if ($ukuran_file > 2000000) {
   $_SESSION['ukuran_salah'] = "Ukuran gambar maksimal 2MB";
   header('Location: ../update.php?nip='.$nip);
   die();
}

//buat nama baru supaya g ada yg sama
$nama_file_baru = uniqid();
$nama_file_baru = $nama_file_baru.'.'.$ext_file;
$nama_file = $nama_file_baru;

//klo lulus semua cek, upload
$target_dir = "../css_js_gambar/gambar/";
move_uploaded_file($tmp_name, $target_dir.$nama_file);

$query = "UPDATE pegawai SET nama_lengkap='$nama', jK='$jK', alamat='$alamat', tgl_lahir='$tgl_lahir', kota='$kota', tgl_gabung='$tgl_gabung', no_telp='$no_telp', email='$email', jabatan='$jabatan', foto='$nama_file', username='$username', password='$passmd' WHERE nip='$nip';";
  

if($kirim){   

   $hasil = mysqli_query($koneksi, $query);
   if($hasil){
      header ("Location: ../data_pegawai.php");
   }else {
      $_SESSION['update_gagal'] = "Update data gagal"; // pesan gagal
      header ("Location: ../update.php");
   }
}else {
   mysqli_error();
}

?>
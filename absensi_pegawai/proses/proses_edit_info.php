<?php
session_start();
include "koneksi.php";

$nm_perusahaan = $_POST['nm_perusahaan'];
$visi = htmlentities($_POST['visi']);
$misi = htmlentities($_POST['misi']);
$kirim = $_POST['kirim'];

//utk upload file 
$nama_file1 = $_FILES['logo1']['name']; 
$tmp_name1 = $_FILES['logo1']['tmp_name'];
$error1 = $_FILES['logo1']['error'];

$nama_file2 = $_FILES['logo2']['name']; 
$tmp_name2 = $_FILES['logo2']['tmp_name'];
$error2 = $_FILES['logo2']['error'];

$nama_file3 = $_FILES['gedung']['name']; 
$tmp_name3 = $_FILES['gedung']['tmp_name'];
$error3 = $_FILES['gedung']['error'];

$target_dir = "../css_js_gambar/gambar/";
move_uploaded_file($tmp_name1, $target_dir.$nama_file1);

move_uploaded_file($tmp_name2, $target_dir.$nama_file2);

move_uploaded_file($tmp_name3, $target_dir.$nama_file3);

if ($error1 === 0 && $error2 === 4 && $error3 === 4) { /* Kalo yg diupload 1 file */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         logo1 = '$nama_file1',
         visi = '$visi', 
         misi = '$misi';";
} else if ($error1 === 4 && $error2 === 0 && $error3 === 4) { /* Kalo yg diupload 1 file */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         logo2 = '$nama_file2',
         visi = '$visi', 
         misi = '$misi';";
} else if ($error1 === 4 && $error2 === 4 && $error3 === 0) { /* Kalo yg diupload 1 file */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         gbr_gedung = '$nama_file3',
         visi = '$visi', 
         misi = '$misi';";
} else if ($error1 === 0 && $error2 === 0 && $error3 === 4) { /* Kalo yg diupload 2 file */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         logo1 = '$nama_file1',
         logo2 = '$nama_file2',
         visi = '$visi', 
         misi = '$misi';";
} else if ($error1 === 0 && $error2 === 4 && $error3 === 0) { /* Kalo yg diupload 2 file */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         logo1 = '$nama_file1',
         gbr_gedung = '$nama_file3',
         visi = '$visi', 
         misi = '$misi';";
} else if ($error1 === 4 && $error2 === 0 && $error3 === 0) { /* Kalo yg diupload 2 file */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         logo2 = '$nama_file2',
         gbr_gedung = '$nama_file3',
         visi = '$visi', 
         misi = '$misi';";
} else if ($error1 === 4 && $error2 === 4 && $error3 === 4) { /* Kalo yg diupload 3 file */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         visi = '$visi', 
         misi = '$misi';";
} else if ($error1 === 0 && $error2 === 0 && $error3 === 0) { /* Kalo ga ada file yg diupload */
   $query = "UPDATE tabel_info SET 
         nm_perusahaan = '$nm_perusahaan',
         logo1 = '$nama_file1',
         logo2 = '$nama_file2',
         gbr_gedung = '$nama_file3',
         visi = '$visi', 
         misi = '$misi';";
}

if($kirim){   

   $hasil = mysqli_query($koneksi, $query);
   if($hasil){
      header ("Location: ../beranda.php");
   }else {
      $_SESSION['update_gagal'] = "Update data gagal"; // pesan gagal
      header ("Location: ../edit_info.php");
   }
}else {
   mysqli_error();
}

?>
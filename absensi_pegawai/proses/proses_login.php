<?php

session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM pegawai WHERE username = '$username'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);

//enkripsi password
$pengacak = "p3ng4c4k";

$passmd = md5($pengacak . md5($password));
if ($passmd == $data['password']) //cek kesamaan password
{
   //menyimpan username dan level ke dalam session
	$_SESSION['level'] = $data['level'];
	$_SESSION['username'] = $data['username'];

	//menampilkan menu halaman
   echo "<h2>Login Sukses</h2>";
	header('Location: ../beranda.php');
}
else {
   $_SESSION['login_gagal'] = "Username dan password tidak sesuai.";
   header('Location: ../index.php');
}
?>
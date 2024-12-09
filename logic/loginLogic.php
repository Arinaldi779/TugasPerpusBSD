<?php
// berfungsi mengaktifkan session
session_start();

// berfungsi menghubungkan koneksi ke database
require 'koneksi.php';

// berfungsi menangkap data yang dikirim
$email = $_POST['email'];
$pass = $_POST['password'];
$passmd5 = md5($pass);
// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($conn,"SELECT * FROM anggotalogin_view  WHERE email = '$email' AND password ='$passmd5'");
$cek = mysqli_num_rows($sql);		

// berfungsi mengecek apakah username dan password ada pada database
if($cek > 0){
	$data 		= mysqli_fetch_assoc($sql);	

	$_SESSION['id_anggota']	=	$data['ID_ANGGOTA'];
	$_SESSION['email'] 		= 	$data['EMAIL'];
	$_SESSION['nama'] 		= 	$data['NAMA'];
	$_SESSION['alamat'] 	= 	$data['ALAMAT'];
	$_SESSION['notelp'] 	= 	$data['NOTELP'];
	$_SESSION['foto']  	    = 	$data['FOTO'];
	$_SESSION['status'] 	= 	$data['STATUS'];	

	// berfungsi mengecek jika user login sebagai admin
	if($data['STATUS']== 1){
		echo "
		<script>alert('Selamat Datang Admin {$data["NAMA"]}');
        window.location.href = '../views/main.php'</script>
		";
	// berfungsi mengecek jika user login sebagai user
	}else if($data['STATUS']== 0){
		// berfungsi mengalihkan ke halaman user
		echo "
		<script>alert('Selamat Datang User {$data["NAMA"]}');
        window.location.href = '../views/main.php'</script>
		";
		
	}
}else{
	header("location:../index.php?alert=gagal");
};
?>
<?php
// // berfungsi mengaktifkan session
// session_start();

// // berfungsi menghubungkan koneksi ke database
// require 'logic/koneksi.php';

// // berfungsi menangkap data yang dikirim
// $email = $_POST['email'];
// $pass = $_POST['password'];
// $passmd5 = md5($pass);
// // berfungsi menyeleksi data user dengan username dan password yang sesuai
// $sql = mysqli_query($conn,"SELECT * FROM login  WHERE email = '$email' AND password ='$passmd5'");
// $cek = mysqli_num_rows($sql);		

// // berfungsi mengecek apakah username dan password ada pada database
// if($cek > 0){
// 	$data 		= mysqli_fetch_assoc($sql);	
	// var_dump($data["nip"]);exit;	

	// $_SESSION['id']					=	$data['id'];
	// $_SESSION['nis'] 				= 	$data['nis'];
	// $_SESSION['nip'] 				= 	$data['nip'];
	// $_SESSION['nama_anggota'] 		= 	$data['nama_anggota'];
	// $_SESSION['jk_anggota'] 		= 	$data['jk_anggota'];
	// $_SESSION['alamat_anggota']  	= 	$data['alamat_anggota'];
	// $_SESSION['jurusan_anggota'] 	= 	$data['jurusan_anggota'];
	// $_SESSION['no_telp_anggota'] 	= 	$data['no_telp_anggota'];
	// $_SESSION['email'] 				=   $data['email'];
	// $_SESSION['username']			=   $data['username'];
	// $_SESSION['level'] 				=   $data['level'];	
	// $_SESSION['gambar']				=	$data['gambar'];	

	// berfungsi mengecek jika user login sebagai admin
	// if($data['level']=="admin"){
	// 	echo "
	// 	<script>alert('Selamat Datang Admin {$data["nama_anggota"]}');
  //       window.location.href = '../dashboard'</script>
	// 	";
	// // berfungsi mengecek jika user login sebagai user
	// }else if($data['level']=="user"){
	// 	// berfungsi mengalihkan ke halaman user
	// 	echo "
	// 	<script>alert('Selamat Datang User {$data["nama_anggota"]}');
  //       window.location.href = '../dashboard'</script>
	// 	";
		
	// }
// }else{
// 	header("location:../index.php?alert=gagal");
// };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body class="bg-slate-200">
    <div class="container relative mx-auto mt-11 p-6 rounded-lg bg-primary shadow-lg w-96 h-1/2">
        <h2 class="text-center text-3xl font-semibold text-amber-100 mb-6">Login</h2>
        <div class="flex flex-wrap justify-center">
            <form class="login-form w-full max-w-md space-y-4" action="process_login.php" method="POST">
                <!-- Email -->
                <div class="flex flex-col">
                    <label for="email" class="text-amber-100 font-medium">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required
                        class="px-4 py-2 border border-cyan-100 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-800">
                </div>

                <!-- Password -->
                <div class="flex flex-col">
                    <label for="password" class="text-amber-100 font-medium">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required
                        class="px-4 py-2 border border-cyan-100 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-800">
                </div>

                <button type="submit"
                    class="w-full py-2 bg-yellow-200 text-black rounded-md hover:bg-amber-400 transition duration-100 font-semibold">
                    Login
                </button>
                <p class="text-white">Belum punya akun? <a href="./views/daftar.php">Daftar disini</a></p>
            </form>
        </div>
    </div>
</body>

</html>
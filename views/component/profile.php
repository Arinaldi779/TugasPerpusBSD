<?php 
// if($_SESSION['status']==""){
//     header("location:../index.php?alert=belum_login");
// }
require '../logic/koneksi.php';
$id = $_GET['id'];
$queryProfile = mysqli_query($conn ,"SELECT * FROM anggotaLogin_view WHERE ID_ANGGOTA = '$id'");
$dataProfile  = mysqli_fetch_assoc($queryProfile);
$Profile = $dataProfile;
// var_dump($Profile);exit;
?>

<div class="container mx-auto p-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Profile Image -->
        <div class="p-6 bg-gradient-to-r from-sky-400 to-blue-500 text-center">
            <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg">
                <img src="../src/uploadAnggota/<?php echo $Profile['FOTO']; ?>" alt="Foto Anggota"
                    class="w-full h-full object-cover">
            </div>
            <h3 class="mt-4 text-xl font-semibold text-white">Foto Anggota</h3>
            <div class="mt-4">
                <a href="?page=editProfile&id=<?php echo $Profile['ID_ANGGOTA']; ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md shadow-md inline-block">
                    Edit Profile
                </a>
                <a href="?page=home"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md shadow-md inline-block mt-2">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="p-6 col-span-2">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Detail Profil Anggota</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Detail Item -->
                <div>
                    <label class="block font-medium text-gray-500">Id Anggota</label>
                    <p class="text-gray-700"><?php echo $Profile['ID_ANGGOTA']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Email</label>
                    <p class="text-gray-700"><?php echo $Profile['EMAIL']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Nama Lengkap</label>
                    <p class="text-gray-700"><?php echo $Profile['NAMA']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Alamat</label>
                    <p class="text-gray-700"><?php echo $Profile['ALAMAT']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Nomor Telepon</label>
                    <p class="text-gray-700"><?php echo $Profile['NOTELP']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
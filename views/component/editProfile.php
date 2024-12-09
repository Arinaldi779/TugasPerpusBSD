<?php 
// if($_SESSION['status']==""){
//     header("location:../index.php?alert=belum_login");
// }
// var_dump($dataEditProfile);exit;
?>

<!-- Form Edit Profile -->
<div class="max-w-4xl mx-auto p-8 rounded-xl shadow-lg bg-slate-300 mt-9">
    <div class="mb-3">
        <a href="?page=home"
            class="inline-block px-7 py-1 bg-sky-400 text-white text-lg font-medium rounded-full shadow-md focus:ring-4 focus:ring-amber-300 transition duration-300">
            &#8617;
        </a>
    </div>
    <form action="../logic/editProfileLogic.php" method="POST" enctype="multipart/form-data"
        class="bg-slate-200 p-6 rounded-lg shadow-md">
        <h2 class="text-black text-2xl font-bold text-center mb-6">Edit Profile</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Kolom Kiri -->
            <div>
                <!-- ID Anggota -->
                <div class="mb-4">
                    <label for="id_anggota" class="block text-sm font-medium text-black mb-2">ID Anggota</label>
                    <input type="text" id="id_anggota" name="id_anggota" readonly
                        class="w-full px-4 py-2 bg-sky-400 text-black border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-black"
                        value="<?php echo $_SESSION['id_anggota']; ?>">
                </div>

                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-black mb-2">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama"
                        class="w-full px-4 py-2 bg-sky-400 placeholder-black text-black border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="<?php echo $data['NAMA'];?>">
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-4">
                    <label for="notelp" class="block text-sm font-medium text-black mb-2">Nomor Telepon</label>
                    <input type="tel" id="notelp" name="notelp" placeholder="Masukkan nomor telepon"
                        class="w-full px-4 py-2 bg-sky-400 placeholder-black text-black border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        value="<?php echo $data['NOTELP'];?>">
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div>
                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-black mb-2">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat"
                        class="w-full px-4 py-2 bg-sky-400 placeholder-black text-black border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"><?php echo $data['ALAMAT'];?></textarea>
                </div>
            </div>

            <!-- Kolom Foto -->
            <div class="">
                <h2 class="text-black font-medium text-center mb-6">Upload Foto</h2>
                <!-- Form Upload Foto -->
                <div class="w-full border-2 border-dashed border-slate-300 rounded-lg bg-slate-300 p-6">
                    <label for="foto" class="block text-center text-sm font-medium text-black mb-2">Upload
                        Foto</label>
                    <input type="file" id="foto" name="gambar"
                        class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <input type="hidden" name="fotoLama" value="<?php echo $data['foto']; ?>">
        </div>

        <!-- Tombol Submit -->
        <div class="text-center mt-6">
            <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-amber-300 to-amber-400 text-black font-medium text-lg rounded-full shadow-md transition duration-300">
                Simpan
            </button>
        </div>
    </form>
</div>
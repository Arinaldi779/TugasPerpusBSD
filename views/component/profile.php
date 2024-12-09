<div class="container mx-auto p-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Profile Image -->
        <div class="p-6 bg-gradient-to-r from-sky-400 to-blue-500 text-center">
            <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg">
                <img src="upload-anggota/<?php echo $_SESSION['foto']; ?>.jpg" alt="Foto Anggota"
                    class="w-full h-full object-cover">
            </div>
            <h3 class="mt-4 text-xl font-semibold text-white">Foto Anggota</h3>
            <div class="mt-4">
                <a href="#edit-profile"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md shadow-md inline-block">
                    Edit Profile
                </a>
                <a href="index.html"
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
                    <p class="text-gray-700"><?php echo $_SESSION['id_anggota']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Email</label>
                    <p class="text-gray-700"><?php echo $_SESSION['email']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Nama Lengkap</label>
                    <p class="text-gray-700"><?php echo $_SESSION['nama']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Alamat</label>
                    <p class="text-gray-700"><?php echo $_SESSION['alamat']; ?></p>
                </div>
                <div>
                    <label class="block font-medium text-gray-500">Nomor Telepon</label>
                    <p class="text-gray-700"><?php echo $_SESSION['notelp']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
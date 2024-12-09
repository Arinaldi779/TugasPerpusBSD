    <section class="py-12 px-4">
        <div class="container mx-auto  rounded-md">
            <?php if($_SESSION['status'] == 0) { ?>
            <a href="?page=editProfile&id=<?php echo $data['ID_ANGGOTA']; ?>"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md shadow-md inline-block">
                Edit Profile
            </a>
            <?php } ?>
            <div class="flex flex-wrap items-center justify-center -mx-4 mt-5 pt-5">
                <!-- Card 1 -->
                <div class="px-4 w-full md:w-1/2 lg:w-1/4 mb-4">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                        <!-- Foto Buku -->
                        <img class="w-full h-36 object-cover" src="https://via.placeholder.com/300x150" alt="Foto Buku">

                        <!-- Konten Card -->
                        <div class="p-3">
                            <h3 class="text-md font-bold text-gray-800 mb-1">Judul Buku 1</h3>
                            <p class="text-xs text-gray-600 mb-3">Stok: <span
                                    class="font-semibold text-gray-800">10</span>
                            </p>

                            <!-- Tombol Aksi -->
                            <div class="flex space-x-1">
                                <button
                                    class="px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                                    Info
                                </button>
                                <button
                                    class="px-3 py-1 bg-yellow-500 text-white text-xs font-semibold rounded hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300">
                                    Edit
                                </button>
                                <button
                                    class="px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="px-4 w-full md:w-1/2 lg:w-1/4 mb-4">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                        <img class="w-full h-36 object-cover" src="https://via.placeholder.com/300x150" alt="Foto Buku">
                        <div class="p-3">
                            <h3 class="text-md font-bold text-gray-800 mb-1">Judul Buku 2</h3>
                            <p class="text-xs text-gray-600 mb-3">Stok: <span
                                    class="font-semibold text-gray-800">15</span>
                            </p>
                            <div class="flex space-x-1">
                                <button
                                    class="px-3 py-1 bg-blue-600 text-black text-xs font-semibold rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                                    Info
                                </button>
                                <button
                                    class="px-3 py-1 bg-yellow-500 text-white text-xs font-semibold rounded hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300">
                                    Edit
                                </button>
                                <button
                                    class="px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan card lain dengan struktur yang sama -->
            </div>
        </div>
    </section>
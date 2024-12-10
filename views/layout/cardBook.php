<?php 
$queryBuku = mysqli_query($conn, "SELECT * FROM buku WHERE STOK > 0");    
    
?>
<section class="py-12 px-4">
    <div class="container mx-auto  rounded-md">
        <?php if($_SESSION['status'] == 0) { ?>
        <a href="?page=inputBuku"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md shadow-md inline-block">
            Input Buku
        </a>
        <?php } ?>
        <div class="flex flex-wrap items-center justify-center -mx-4 mt-5 pt-5">
            <!-- Card 1 -->
            <?php while($dataBuku = mysqli_fetch_assoc($queryBuku)) { ?>
            <div class="px-4 w-full md:w-1/2 lg:w-1/4 mb-4">
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-transform duration-300">
                    <!-- Foto Buku -->
                    <img class="w-full h-36 object-cover" src="../src/uploadBuku/<?php echo $dataBuku['FOTO']; ?>"
                        alt="Foto Buku">
                    <!-- Konten Card -->
                    <div class="p-3">
                        <h3 class="text-md font-bold text-gray-800 mb-1"><?php echo $dataBuku['NAMA_BUKU']; ?></h3>
                        <details class="collapse mb-3">
                            <summary class="text-sm font-medium badge badge-info cursor-pointer badge-lg">Details
                            </summary>
                            <div class="collapse-content h-36">
                                <p><?php echo $dataBuku['SINOPSIS']; ?></p>
                            </div>
                        </details>
                        <!-- Tombol Aksi -->
                        <div class="flex space-x-1">
                            <a href="?page=editBuku&id=<?php echo $dataBuku['ID_BUKU'] ?>"
                                class="px-3 py-1 bg-yellow-500 text-white text-xs font-semibold rounded hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300">
                                Edit
                            </a>
                            <button
                                class="px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'component/infoModalBuku.php' ?>

            <?php } ?>
        </div>
    </div>
</section>
<?php 
$queryBuku = mysqli_query($conn, "SELECT * FROM buku WHERE STOK > 0");    
?>
<section class="py-12 px-4">
    <div class="container mx-auto rounded-md">
        <?php if($_SESSION['status'] == 0) { ?>
        <a href="?page=inputBuku"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md shadow-md inline-block">
            Input Buku
        </a>
        <?php } ?>

        <div class="grid grid-cols-1 justify-center sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-5 ">
            <!-- Card Buku -->
            <?php while($dataBuku = mysqli_fetch_assoc($queryBuku)) { ?>
            <div
                class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-transform duration-300">
                <!-- Foto Buku -->
                <img class="w-full h-48 object-cover" src="../src/uploadBuku/<?php echo $dataBuku['FOTO']; ?>"
                    alt="Foto Buku">

                <!-- Konten Card -->
                <div class="p-4">
                    <h3 class="text-md font-bold text-gray-800 mb-2"><?php echo $dataBuku['NAMA_BUKU']; ?></h3>

                    <details class="mb-3">
                        <summary class="text-sm font-medium text-blue-600 cursor-pointer">Details</summary>
                        <div class="mt-2 text-sm text-gray-600">
                            <p><?php echo $dataBuku['SINOPSIS']; ?></p>
                            <p class="mt-1"><span class="font-semibold">Pengarang:</span>
                                <?php echo $dataBuku['PENGARANG']; ?></p>
                        </div>
                    </details>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-wrap gap-2">
                        <?php if ($_SESSION['status'] == 1) { ?>
                        <a href="?page=editBuku&id=<?php echo $dataBuku['ID_BUKU'] ?>"
                            class="px-3 py-1 bg-yellow-500 text-white text-xs font-semibold rounded hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300">
                            Edit
                        </a>
                        <button
                            class="px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                            Hapus
                        </button>
                        <?php } ?>
                        <form action="../logic/pinjamBukuLogic.php" method="post">
                            <input type="hidden" name="pinjamBuku" value="<?php echo $dataBuku['ID_BUKU']; ?>">
                            <button type="submit"
                                class="px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                                Pinjam
                            </button>
                        </form>
                    </div>
                </div>
                <?php include 'component/infoModalBuku.php'; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
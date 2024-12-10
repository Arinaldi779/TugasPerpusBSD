<div class="container mx-auto p-8 bg-gradient-to-r bg-primary rounded-xl shadow-2xl my-10 max-w-4xl">
    <h2 class="text-3xl font-extrabold text-white mb-8 text-center">Form Input Data Buku</h2>
    <form action="../logic/editBukuLogic.php" method="post" enctype="multipart/form-data" class="space-y-6">
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- ID Buku -->
            <div class="mx-1">
                <label for="id_buku" class="block text-sm font-medium text-white mb-2">ID Buku</label>
                <input type="text" id="id_buku" name="id_buku" placeholder="Masukkan ID Buku"
                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                    readonly value="<?php echo $dataBuku['ID_BUKU']; ?>">
            </div>
            <!-- Judul Buku -->
            <div class="mx-1">
                <label for="judul_buku" class="block text-sm font-medium text-white mb-2">Judul Buku</label>
                <input type="text" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku"
                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                    required value="<?php echo $dataBuku['NAMA_BUKU'] ?>">
            </div>
            <!-- Pengarang -->
            <div class="mx-1">
                <label for="pengarang" class="block text-sm font-medium text-white mb-2">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" placeholder="Masukkan Nama Pengarang"
                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                    required value="<?php echo $dataBuku['PENGARANG']; ?>">
            </div>
            <!-- Penerbit -->
            <div class="mx-1">
                <label for="penerbit" class="block text-sm font-medium text-white mb-2">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" placeholder="Masukkan Nama Penerbit"
                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                    required value="<?php echo $dataBuku['PENERBIT']; ?>">
            </div>
            <!-- Tahun Terbit -->
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text block text-white font-medium">Pilih Tanggal</span>
                </label>
                <input type="text" id="datepicker" placeholder="Pilih tanggal"
                    class="input input-bordered w-full max-w-xs" name="tahun_terbit" value="value="
                    <?php echo $dataBuku['TAHUN_TERBIT']; ?>"" />
            </div>

            <!-- Stok -->
            <div class="mx-1">
                <label for="stok" class="block text-sm font-medium text-white mb-2">Stok</label>
                <input type="number" id="stok" name="stok" min="0" placeholder="Masukkan Stok Buku"
                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                    required value="<?php echo $dataBuku['STOK']; ?>">
            </div>
        </div>

        <!-- Sinopsis -->
        <div class="mx-1">
            <label for="sinopsis" class="block text-sm font-medium text-white mb-2">Sinopsis</label>
            <textarea id="sinopsis" name="sinopsis" rows="4" placeholder="Masukkan Sinopsis Buku"
                class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500"
                required><?php echo $dataBuku['SINOPSIS']; ?></textarea>
        </div>

        <!-- Foto -->
        <div class="flex items-center space-x-4">
            <label for="foto"
                class="cursor-pointer bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-sky-700">
                Pilih File
            </label>
            <span id="file-name" class="text-white italic">Belum ada file dipilih</span>
            <input type="file" id="foto" name="gambar" class="hidden">
        </div>

        <?php if(isset($dataBuku['FOTO'])) { ?>
        <input type="hidden" name="gambarLama" value="<?php echo $dataBuku['FOTO']; ?>">
        <?php echo var_dump($dataBuku['FOTO']); ?>
        <?php } ?>


        <!-- Tombol -->
        <div class="flex justify-end space-x-4 mt-6">
            <button type="reset"
                class="px-6 py-2 bg-black hover:bg-gray-700 text-white rounded-md shadow-lg">Reset</button>
            <button type="submit"
                class="px-6 py-2 bg-amber-600 hover:bg-amber-300 text-white rounded-md shadow-lg">Simpan</button>
        </div>
    </form>
</div>
<form action="" method="" class="mt-12 px-2">
    <input type="text" name="" id="" placeholder="Cari" class="p-2 rounded-sm">
    <button type="submit" class="bg-green-400 mx-2 px-4 py-2 rounded-md">Cari</button>
</form>
<div class="overflow-x-auto mt-2">
    <table class="min-w-full border-collapse border border-gray-300 text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">No</th>
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">Id Peminjaman</th>
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">Anggota</th>
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">Buku</th>
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">Tanggal Pinjam</th>
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">Tanggal Kembali</th>
                <?php if($_SESSION['status'] == 1) { ?>
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">Aksi</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php while($dataKembali = mysqli_fetch_assoc($queryKembali)) { ?>
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2"><?php echo $nomor++; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataKembali['ID']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataKembali['NAMA']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataKembali['JUDUL']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataKembali['TANGGAL_PINJAM']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataKembali['TANGGAL_KEMBALI']; ?></td>
                <?php if($_SESSION['status'] == 1) { ?>
                <td class="border border-gray-300 px-4 py-2">
                    <button class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded ml-2">Delete</button>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
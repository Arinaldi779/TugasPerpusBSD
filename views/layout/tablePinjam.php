<?php 
?>
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
                <th class="border border-gray-300 px-4 py-2 font-medium text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($dataPinjam = mysqli_fetch_assoc($queryPinjam)) { ?>
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2"><?php echo $nomor++; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataPinjam['ID']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataPinjam['NAMA']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataPinjam['JUDUL']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo $dataPinjam['TANGGAL_PINJAM']; ?></td>
                <td class="border border-gray-300 px-4 py-2">
                    <?php if($dataPinjam['STATUS'] == 0) { ?>
                    <form action="../logic/kembaliBukuLogic.php" method="post">
                        <input type="hidden" name="kembaliBuku" value="<?php echo $dataPinjam['ID']; ?>">
                        <button class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded">Kembali</button>
                    </form>
                    <?php }else { ?>
                    <p class="text-white bg-blue-500 px-3 py-1 rounded text-center">Sudah Kembali</p>
                    <?php } ?>
                    <?php if($_SESSION['status'] == 1) { ?>
                    <a href="" class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded ml-2">Delete</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
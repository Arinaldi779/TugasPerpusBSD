<?php 
if (isset($_GET['cari']) && !empty($_GET['cari'])) {
    $cari = mysqli_real_escape_string($conn, $_GET['cari']);
    // Menambahkan kondisi pencarian ke dalam query
    $where .= (!empty($where) ? ' AND ' : 'WHERE ') . "(
        ID LIKE '%$cari%' OR 
        NAMA LIKE '%$cari%' OR 
        JUDUL LIKE '%$cari%' OR 
        TANGGAL_PINJAM LIKE '%$cari%'
    )";

    $queryPinjam = mysqli_query($conn, "SELECT * FROM pinjam_buku_view $where");
}
?>
<form action="main.php?page=tablePinjam" method="get" class="mt-12 px-2">
    <input type="hidden" name="page" value="tablePinjam">
    <input type="text" name="cari" id="" placeholder="Cari" class="p-2 rounded-sm"
        value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
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
                        <button class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded">Kembali Buku</button>
                    </form>
                    <?php }else { ?>
                    <p class="text-white bg-primary px-3 py-1 rounded text-center">Sudah Kembali</p>
                    <?php } ?>
                    <?php if($_SESSION['status'] == 1) { ?>
                    <a href="" class="text-white bg-red-500 my-5 hover:bg-red-600 px-3 py-1 rounded ml-2">Delete</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
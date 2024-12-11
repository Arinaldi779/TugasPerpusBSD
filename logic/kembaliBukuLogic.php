<?php 
    session_start();
    include 'koneksi.php';
    
    $id_pinjam          = $_POST['kembaliBuku'];
    $tgl_kembali         = date('Y-m-d');

// Format tanggal untuk kode peminjaman
$tanggalFormatted = date('Ymd', strtotime($tgl_kembali));

// Hitung jumlah peminjaman pada tanggal yang sama untuk menentukan nomor urut
$queryCount = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM log_kembali WHERE DATE(tgl_kembali) = '$tgl_kembali'");
$rowCount = mysqli_fetch_assoc($queryCount);
$urutan = $rowCount['jumlah'] + 1;

// Buat kode peminjaman
$id_kembali = 'LK-' . $tanggalFormatted . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);

var_dump($id_kembali);
var_dump($id_pinjam);
// exit;

    
$queryPinjam = "INSERT INTO log_kembali
                                    VALUES ('$id_kembali',
                                            '$id_pinjam',
                                            '$tgl_kembali'
                                            )";

if (mysqli_query($conn, $queryPinjam)) {
    mysqli_query($conn, "UPDATE peminjaman SET `status` = 1 WHERE ID_PEMINJAMAN = '$id_pinjam'");
}


// exit;
echo "
<script>
alert('Buku Berhasil di Pinjam');
window.location.href = '../views/main.php?page=tableLog';
</script>
"; 
    // }


?>
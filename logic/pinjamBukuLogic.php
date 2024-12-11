<?php 
    session_start();
    include 'koneksi.php';
    
    $id_anggota             = $_SESSION['id_anggota'];
    $id_buku          = $_POST['pinjamBuku'];
    $tgl_pinjam         = date('Y-m-d');

// Format tanggal untuk kode peminjaman
$tanggalFormatted = date('Ymd', strtotime($tgl_pinjam));

// Hitung jumlah peminjaman pada tanggal yang sama untuk menentukan nomor urut
$queryCount = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM peminjaman WHERE DATE(tgl_pinjam) = '$tgl_pinjam'");
$rowCount = mysqli_fetch_assoc($queryCount);
$urutan = $rowCount['jumlah'] + 1;

// Buat kode peminjaman
$id_peminjaman = 'PM-' . $tanggalFormatted . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);


    
$queryPinjam =  mysqli_query($conn,"INSERT INTO peminjaman
                                    VALUES ('$id_peminjaman',
                                            '$id_anggota',
                                            '$id_buku',
                                            '$tgl_pinjam'
                                            )");

// exit;
echo "
<script>
alert('Buku Berhasil di Pinjam');
window.location.href = '../views/main.php';
</script>
"; 
    // }


?>
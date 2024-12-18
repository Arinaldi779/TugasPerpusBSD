<?php 
// Koneksi database
include 'koneksi.php';

// Variabel data yang dikirimkan oleh form
$id_buku    = $_POST['id_buku'];
$judul_buku  = htmlspecialchars($_POST['judul_buku']);
$pengarang        = htmlspecialchars($_POST['pengarang']);
$penerbit        = htmlspecialchars($_POST['penerbit']);
$tahum_terbit        = htmlspecialchars($_POST['tahun_terbit']);
$stok       = htmlspecialchars($_POST['stok']);
$sinopsis       = htmlspecialchars($_POST['sinopsis']);
$fotoLama      = $_POST['gambarLama'];
var_dump($fotoLama);


$namaFileBaru = $fotoLama; // Default menggunakan foto lama

// Cek apakah ada file yang diunggah
if ($_FILES['gambar']['error'] !== UPLOAD_ERR_NO_FILE) {
    $namaFile   = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error      = $_FILES['gambar']['error'];
    $tmpName    = $_FILES['gambar']['tmp_name'];

    // Validasi file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensiGambar      = explode('.', $namaFile);
    $ekstensiGambar      = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
        alert('File yang diunggah bukan gambar!');
        window.location.href = '../aksi_buku.php';
        </script>
        ";
        exit;
    }

    if ($ukuranFile > 3000000) {
        echo "
        <script>
        alert('Ukuran gambar terlalu besar!');
        window.location.href = '../aksi_buku.php';
        </script>
        ";
        exit;
    }

     // Hapus file lama jika ada
    if (file_exists('../src/uploadBuku/' . $fotoLama)) {
        unlink('../src/uploadBuku/' . $fotoLama);
    }

    // Buat nama file baru untuk disimpan
    $namaFileBaru = $id_buku . '.' . $ekstensiGambar;

    // Pindahkan file ke folder tujuan
    move_uploaded_file($tmpName, '../src/uploadBuku/' . $namaFileBaru);
}

// var_dump($fotoLama);
// exit;



// Query update data anggota
$query = "UPDATE buku SET 
            NAMA_BUKU = '$judul_buku',
            PENGARANG = '$pengarang',
            PENERBIT = '$penerbit',
            TAHUN_TERBIT = '$tahum_terbit',
            SINOPSIS = '$sinopsis',
            STOK = '$stok',
            FOTO = '$namaFileBaru'
            WHERE ID_BUKU = '$id_buku'";

if (mysqli_query($conn, $query)) {
    echo "
    <script>
    alert('Data berhasil diubah!');
    window.location.href = '../views/main.php?page=cardbook';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Terjadi kesalahan saat mengubah data.');
    window.location.href = '../views/main.php?page=cardbook';
    </script>
    ";
}
?>
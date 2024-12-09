<?php 
// Koneksi database
include 'koneksi.php';

// Variabel data yang dikirimkan oleh form
$id_anggota    = $_POST['id_anggota'];
$nama_anggota  = htmlspecialchars($_POST['nama']);
$notelp        = htmlspecialchars($_POST['notelp']);
$alamat        = htmlspecialchars($_POST['alamat']);
$fotoLama      = $_POST['fotoLama'];

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
    if (file_exists('../src/uploadAnggota/' . $fotoLama)) {
        unlink('../src/uploadAnggota/' . $fotoLama);
    }

    // Buat nama file baru untuk disimpan
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    // Pindahkan file ke folder tujuan
    move_uploaded_file($tmpName, '../src/uploadAnggota/' . $namaFileBaru);
}

// Query update data anggota
$query = "UPDATE anggota SET 
            NAMA_ANGGOTA = '$nama_anggota',
            ALAMAT = '$alamat',
            NOTELP = '$notelp',
            FOTO = '$namaFileBaru'
          WHERE ID_ANGGOTA = '$id_anggota'";

if (mysqli_query($conn, $query) == true) {
    echo "
    <script>
    alert('Data berhasil diubah!');
    window.location.href = '../views/main.php?page=profile&id=$id_anggota';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Terjadi kesalahan saat mengubah data.');
    window.location.href = '../views/main.php?page=profileid=$id_anggota';
    </script>
    ";
}
?>
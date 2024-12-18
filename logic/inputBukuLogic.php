<?php 
require 'koneksi.php';

// $namaBuku       = mysqli_query($conn,"SELECT * FROM buku");
// $namaBukuBaru   = mysqli_fetch_assoc($namaBuku);
// var_dump($namaBuku);exit;

$id_buku          = htmlspecialchars($_POST['id_buku']);
$judul_buku       = htmlspecialchars($_POST['judul_buku']);
$pengarang        = htmlspecialchars($_POST['pengarang']);
$penerbit         = htmlspecialchars($_POST['penerbit']);
$tahun_terbit     = htmlspecialchars($_POST['tahun_terbit']);
$stok             = htmlspecialchars($_POST['stok']);
$sinopsis         = htmlspecialchars($_POST['sinopsis']);

// var_dump($sinopsis);exit;

$namaFile   = $_FILES['foto']['name'];
$ukuranFile = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];
        if ($error === 4) { 
                echo "
                <script>
                alert('Silahkan Upload Gambar');
                window.location.href = '../input_buku.php';
                </script>
                ";
                return false;
        }

        $ekstensiGambarValid = ['jpg','jpeg','png','gif'];
        $ekstensiGambar      = explode('.',$namaFile);
        $ekstensiGambar      = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
        echo "
        <script>
        alert('Yg anda upload bukan gambar');
        window.location.href = '../input_buku.php';
        </script>
        ";
        return false;
        }

        if ($ukuranFile > 3000000) {
        echo "
        <script>
        alert('Ukuran Gambar terlalu besar');
        window.location.href = '../input_buku.php';
        </script>
        ";
        return false;
        }

        $namaFileBaru = $id_buku;
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName,'../src/uploadBuku/' . $namaFileBaru);
        // var_dump($namaBuku);exit;    


$query = "INSERT INTO buku VALUES 
                                ('$id_buku',
                                '$judul_buku',
                                '$pengarang',
                                '$penerbit',
                                '$tahun_terbit',
                                '$sinopsis',
                                '$stok',
                                '$namaFileBaru'
                                )";
        if(mysqli_query($conn,$query)){
                echo "
                <script>
                alert('Data Buku Berhasil di Tambahkan');
                window.location.href = '../views/main.php?page=cardBook'
                </script>
                ";
        }else{
                echo "
                <script>
                alert('Data Buku Gagal di Tambahkan');
                window.location.href = '../views/main.php?page=cardBook'
                </script>
                ";
        }



?>
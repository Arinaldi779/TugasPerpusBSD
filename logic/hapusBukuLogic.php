<?php 
//koneksi php
require 'koneksi.php';

// mengambil data id yang di kirimkan oleh URL
$id     = $_GET['id'];

// menghapus data dari database
$query = "DELETE FROM buku WHERE ID_BUKU='$id'";
if(mysqli_query($conn,$query)){
    echo "
    <script>
    alert('Data Buku Berhasil di Hapus');
    window.location.href = '../views/main.php?page=cardBook'
    </script>
    ";
}

?>
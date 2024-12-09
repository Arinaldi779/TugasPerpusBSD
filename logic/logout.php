<?php 
// Berfungsi mengaktifkan session
session_start();
// Berfungsi menghapus semua session
session_destroy();

// Menampilkan alert dan mengalihkan ke halaman login
echo "<script>
    alert('Anda telah Logout');
    window.location.href = '../../../index.php';
</script>";
?>
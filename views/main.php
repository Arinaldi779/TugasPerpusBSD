<?php
session_start();
// Ambil parameter "page" dari URL
require '../logic/koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $queryAnggota = mysqli_query($conn ,"SELECT * FROM anggotaLogin_view WHERE ID_ANGGOTA = '$id'");
    $queryBuku = mysqli_query($conn ,"SELECT * FROM buku WHERE ID_BUKU = '$id'");
    $dataAnggota  = mysqli_fetch_assoc($queryAnggota);
    $dataBuku  = mysqli_fetch_assoc($queryBuku);
    $data = $dataAnggota;
}
// Cek isi table peminjaman
if ($_SESSION['status'] == 0) {
    // Pastikan menggunakan mysqli_real_escape_string untuk mengamankan input
    $idAnggota = mysqli_real_escape_string($conn, $_SESSION['id_anggota']);
    $where = "WHERE ANGGOTA_ID = '$idAnggota'";
} else {
    $where = "";
}
$queryPinjam = mysqli_query($conn, "SELECT * FROM pinjam_buku_view $where");
$queryCountPinjam = mysqli_query($conn, "SELECT COUNT(*) as total FROM pinjam_buku_view $where");
$countPinjam = mysqli_fetch_assoc($queryCountPinjam);

// Count Anggota
$queryAllAnggota = mysqli_query($conn, "SELECT COUNT(*) as total FROM anggotaLogin_view");
$countAnggota = mysqli_fetch_assoc($queryAllAnggota);
// Count Buku
$queryAllBuku = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku");
$countBuku = mysqli_fetch_assoc($queryAllBuku);
// Count Peminjaman
$queryAllAnggota = mysqli_query($conn, "SELECT COUNT(*) as total FROM anggotaLogin_view");
$countAnggota = mysqli_fetch_assoc($queryAllAnggota);
// Count Kembali
$queryAllAnggota = mysqli_query($conn, "SELECT COUNT(*) as total FROM anggotaLogin_view");
$countAnggota = mysqli_fetch_assoc($queryAllAnggota);

// Nomor table
$nomor = 1;


$page = isset($_GET['page']) ? $_GET['page'] : 'tableLog';
$file = '';
switch ($page) {
    case 'cardbook':
        $file = 'layout/cardBook.php';
        break;
    case 'profile':
        $file = 'layout/profile.php';
        break;
    case 'editProfile':
        $file = 'layout/editProfile.php';
        break;
    case 'inputBuku':
        $file = 'layout/inputBuku.php';
        break;
    case 'tablePinjam':
        $file = 'layout/tablePinjam.php';
        break;
    
    default:
        # code...
        break;
}

// File layout default
$file = "layout/$page.php";

// Periksa apakah file layout ada, jika tidak, gunakan file default
if (!file_exists($file)) {
    $file = "layouts/404.php"; // File untuk halaman tidak ditemukan
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body class="bg-slate-200">

    <!-- Header start -->
    <div class="navbar bg-primary">
        <div class="flex-1">
            <a href="#home" class="btn  btn-ghost text-xl font-bold text-gradasi">Perpustakaan</a>
        </div>
        <div class="flex-none gap-2">
            <!-- <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
            </div> -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component"
                            src="../src/uploadAnggota/<?php echo $_SESSION['foto']; ?>" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="?page=profile&id=<?php echo $_SESSION['id_anggota']; ?>">Profile</a></li>
                    <li><a href="../logic/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Header end -->

    <!-- Section main -->
    <section id="menu" class="pt-12">
        <div class="container w-full lg:w-4/5 xl:w-3/4 mx-auto">
            <div class="flex flex-wrap justify-center">
                <!-- Card 1 -->
                <div class="px-4 my-2 w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4">
                    <div class="bg-sky-700 h-24 rounded-md">
                        <h3 class="text-color3 font-semibold text-sm text-center">Anggota</h3>
                        <h2 class="text-2xl text-center mt-2 text-color3 font-bold">
                            <?php echo $countAnggota['total']; ?></h2>
                        <a href="#"
                            class="block w-full text-center font-semibold mt-1 hover:text-black py-1 backdrop-brightness-125 bg-white/30">
                            Detail &#8680;
                        </a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="px-4 my-2 w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4">
                    <div class="bg-secondary h-24 rounded-md">
                        <h3 class="text-color3 font-semibold text-sm text-center">Buku</h3>
                        <h2 class="text-2xl text-center mt-2 text-color3 font-bold"><?php echo $countBuku['total']; ?>
                        </h2>
                        <a href="?page=cardBook"
                            class="block w-full text-center font-semibold mt-1 hover:text-black py-1 backdrop-brightness-125 bg-white/30">
                            Detail &#8680;
                        </a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="px-4 my-2 w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4">
                    <div class="bg-red-600 h-24 rounded-md">
                        <h3 class="text-color3 font-semibold text-sm text-center">Log Kembali</h3>
                        <h2 class="text-2xl text-center mt-2 text-color3 font-bold">90</h2>
                        <a href="#"
                            class="block w-full text-center font-semibold mt-1 hover:text-black py-1 backdrop-brightness-125 bg-white/30">
                            Detail &#8680;
                        </a>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="px-4 my-2 w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4">
                    <div class="bg-indigo-700 h-24 rounded-md">
                        <h3 class="text-color3 font-semibold text-sm text-center">Peminjaman</h3>
                        <h2 class="text-2xl text-center mt-2 text-color3 font-bold">90</h2>
                        <a href="#"
                            class="block w-full text-center font-semibold mt-1 hover:text-black py-1 backdrop-brightness-125 bg-white/30">
                            Detail &#8680;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section end -->

    <!-- Table start -->

    <!-- Table end -->

    <!-- Buku Section Start -->
    <?php include $file ?>
    <!-- Buku Section End -->

    <!-- Form  -->
    <!--  Form -->


    <script>
    document.getElementById('foto').addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : "Belum ada file dipilih";
        document.getElementById('file-name').textContent = fileName;
    });
    //Input type date custom
    flatpickr("#datepicker", {
        dateFormat: "Y-m-d", // Format tanggal
        altInput: true, // Menampilkan input alternatif
        altFormat: "F j, Y", // Format alternatif
        defaultDate: "today", // Tanggal default
        disable: ["2024-12-25", "2025-01-01"], // Contoh tanggal yang dinonaktifkan
        locale: {
            firstDayOfWeek: 1, // Senin sebagai hari pertama
        },
    });
    </script>

    </script>
</body>

</html>
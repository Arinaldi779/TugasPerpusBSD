<?php
session_start();
// Ambil parameter "page" dari URL
require '../logic/koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $queryAnggota = mysqli_query($conn ,"SELECT * FROM anggotaLogin_view WHERE ID_ANGGOTA = '$id'");
    $dataAnggota  = mysqli_fetch_assoc($queryAnggota);
    $data = $dataAnggota;
}


$page = isset($_GET['page']) ? $_GET['page'] : 'tableLog';
$file = '';
switch ($page) {
    case 'cardbook':
        $file = 'component/cardBook.php';
        break;
    case 'profile':
        $file = 'component/profile.php';
        break;
    case 'editProfile':
        $file = 'component/editProfile.php';
        break;
    case 'cardbook':
        $file = 'component/cardBook.php';
        break;
    case 'cardbook':
        $file = 'component/cardBook.php';
        break;
    
    default:
        # code...
        break;
}

// File layout default
$file = "component/$page.php";

// Periksa apakah file layout ada, jika tidak, gunakan file default
if (!file_exists($file)) {
    $file = "layouts/404.php"; // File untuk halaman tidak ditemukan
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-200">

    <!-- Header start -->
    <header class="border-spacing-7 border-primary flex absolute top-0 left-0 z-10 w-full shadow-lg">
        <nav class="bg-primary h-full flex items-center justify-between relative w-full">
            <!-- Logo -->
            <div class="px-4">
                <a href="#home" class="font-bold text-xl text-gradasi block py-6">Perpustakaan</a>
            </div>
            <!-- Gambar Profil -->
            <div class="flex items-center px-4">
                <a href="../logic/logout.php"
                    class="px-4 py-2 text-gradasi font-semibold mx-2 rounded-md hover:bg-slate-400">
                    Logout
                </a>
                <a href="?page=profile&id=<?php echo $_SESSION['id_anggota']; ?>">
                    <img src="../src/uploadAnggota/<?php echo $_SESSION['foto']; ?>" alt="Profile Picture"
                        class="rounded-full bg-gradasi bg-cover w-12 h-12">
                </a>
            </div>
        </nav>
    </header>

    <!-- Header end -->

    <!-- Section main -->
    <section id="menu" class="pt-28">
        <div class="container w-full lg:w-1/4 sm:1/4 xl:w- mx-auto">
            <div class="flex flex-wrap items-center justify-center">
                <!-- Card 1 -->
                <div class="px-4 my-2 w-full sm:w-1/2 md:1/4 lg:w-1/4">
                    <div class="bg-sky-700 h-24 rounded-md">
                        <h3 class="text-color3 font-semibold text-sm text-center">Anggota</h3>
                        <h2 class="text-2xl text-center mt-2 text-color3 font-bold">90</h2>
                        <a href="#"
                            class="block w-full text-center font-semibold mt-1 hover:text-black py-1 backdrop-brightness-125 bg-white/30">
                            Detail &#8680;
                        </a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="px-4 my-2 w-full sm:w-1/2 lg:w-1/4">
                    <div class="bg-secondary h-24 rounded-md">
                        <h3 class="text-color3 font-semibold text-sm text-center">Buku</h3>
                        <h2 class="text-2xl text-center mt-2 text-color3 font-bold">90</h2>
                        <a href="?page=cardBook"
                            class="block w-full text-center font-semibold mt-1 hover:text-black py-1 backdrop-brightness-125 bg-white/30">
                            Detail &#8680;
                        </a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="px-4 my-2 w-full sm:w-1/2 lg:w-1/4">
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
                <div class="px-4 my-2 w-full sm:w-1/2 lg:w-1/4">
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



</body>

</html>
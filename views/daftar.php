<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-200">
    <div class="container relative mx-auto mt-11 p-6 rounded-lg bg-primary shadow-lg w-96 h-1/2">
        <h2 class="text-center text-3xl font-semibold text-amber-100 mb-6">Daftar</h2>
        <div class="flex flex-wrap justify-center">
            <form class="login-form w-full max-w-md space-y-4" action="../logic/daftarLogic.php" method="POST">
                <!-- Email -->
                <div class="flex flex-col">
                    <label for="email" class="text-amber-100 font-medium">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required
                        class="px-4 py-2 border border-cyan-100 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-800">
                </div>

                <!-- Password -->
                <div class="flex flex-col">
                    <label for="password" class="text-amber-100 font-medium">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required
                        class="px-4 py-2 border border-cyan-100 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-800">
                </div>

                <!-- Id Anggota -->
                <div class="flex flex-col">
                    <label for="code" class="text-amber-100 font-medium">Kode Diri:</label>
                    <input type="text" id="code" name="code" placeholder="Enter your code" required
                        class="px-4 py-2 border border-cyan-100  rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-800">
                </div>

                <button type="submit"
                    class="w-full py-2 bg-yellow-200 text-black rounded-md hover:bg-amber-400 transition duration-100 font-semibold">
                    Daftar
                </button>
                <p class="text-white">Sudah punya akun? <a href="../index.php" class="hover:text-yellow-200">Login
                        disini</a></p>
            </form>
        </div>
    </div>
</body>

</html>
<?php
session_start();
include '../db_config.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Inisialisasi variabel untuk menyimpan data dari database
$facebook_username = $instagram_username = $twitter_username = $whatsapp_phone = $youtube_username = $email = "";

// Query untuk mengambil data dengan id = 1
$sql = "SELECT * FROM social_media WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika ada data, ambil data dari database
    $row = $result->fetch_assoc();
    $facebook_username = $row['facebook_username'];
    $instagram_username = $row['instagram_username'];
    $twitter_username = $row['twitter_username'];
    $whatsapp_phone = $row['whatsapp_phone'];
    $youtube_username = $row['youtube_username'];
    $email = $row['email'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Perusahaan XYZ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('menuButton');
            const menu = document.getElementById('menu');

            menuButton.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        });
    </script>
</head>
<body class="bg-gray-100">
<div class="flex min-h-screen">
    <!-- Sidebar - Menu Navigasi -->
    <div class="relative bg-green-800 w-64 hidden lg:block">
        <div class="bg-green-600 mx-auto flex justify-between items-center p-7 h-[72px]">
            <a href="../dashboard.php" class="block text-white text-lg font-bold">Admin Dashboard</a>
        </div>
        <div class="flex flex-col h-[calc(100%-72px)]">
            <a href="medsos.php" class="block text-white hover:bg-yellow-500 p-4 px-5">Medsos</a>
            <a href="contact_messages.php" class="block text-white hover:bg-yellow-500 p-4 px-5">Contact Messages</a>
            <a href="../logout.php" class="block text-white hover:bg-yellow-500 p-4 px-5 mt-auto">Logout</a>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="w-full">
        <!-- Navbar - Menu Atas -->
        <nav class="bg-green-600 mx-auto relative lg:flex justify-between items-center p-2">
            <div class="container mx-auto flex justify-between items-center">
                <a href="../dashboard.php" class="text-white lg:hidden text-lg font-bold">Admin Dashboard</a>
                <button id="menuButton" class="lg:hidden text-white">
                    <!-- Ikon menu (hamburger) pada layar kecil -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
            <!-- Menu Dropdown (hanya untuk layar kecil) -->
            <div id="menu" class="absolute left-0 top-full bg-green-600 hidden lg:w-max w-full shadow-lg lg:relative lg:flex lg:flex-row lg:space-x-4 lg:shadow-none">
                <a href="../add_article.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap">Tambah Artikel</a>
                <a href="medsos.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap lg:hidden">Medsos</a>
                <a href="contact_messages.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap lg:hidden">Contact Messages</a>
                <a href="../logout.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap lg:hidden">Logout</a>
            </div>
        </nav>


    <!-- Form -->
    <div class="container mx-auto mt-10 px-5 ">
        <form action="save_social_media.php" method="POST" class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-2xl font-bold mb-4 text-center">Edit Social Media Links</h2>

            <div class="mb-4 grid grid-cols-6">
                <label for="facebook_username" class="block text-gray-700 font-medium mb-2">Facebook</label>
                <input type="text" name="facebook_username" id="facebook_username" class="w-full border col-span-5 border-gray-300 rounded px-3 py-2" placeholder="Username Facebook" value="<?php echo $facebook_username; ?>">
            </div>

            <div class="mb-4 grid grid-cols-6">
                <label for="instagram_username" class="block text-gray-700 font-medium mb-2">Instagram</label>
                <input type="text" name="instagram_username" id="instagram_username" class="w-full border col-span-5 border-gray-300 rounded px-3 py-2" placeholder="Username Instagram" value="<?php echo $instagram_username; ?>">
            </div>

            <div class="mb-4 grid grid-cols-6">
                <label for="twitter_username" class="block text-gray-700 font-medium mb-2">Twitter</label>
                <input type="text" name="twitter_username" id="twitter_username" class="w-full border col-span-5 border-gray-300 rounded px-3 py-2" placeholder="Username Twitter" value="<?php echo $twitter_username; ?>">
            </div>

            <div class="mb-4 grid grid-cols-6">
                <label for="whatsapp_phone" class="block text-gray-700 font-medium mb-2">WhatsApp</label>
                <input type="tel" name="whatsapp_phone" id="whatsapp_phone" class="w-full border col-span-5 border-gray-300 rounded px-3 py-2" placeholder="Nomor WhatsApp" value="<?php echo $whatsapp_phone; ?>" pattern="\+?\d{1,4}?[ -]?\(?\d{1,3}?\)?[ -]?\d{1,4}[ -]?\d{1,4}" title="Format nomor telepon: +62 812 3456 7890 atau 0812-3456-7890">
            </div>

            <div class="mb-4 grid grid-cols-6">
                <label for="youtube_username" class="block text-gray-700 font-medium mb-2">YouTube</label>
                <input type="text" name="youtube_username" id="youtube_username" class="w-full border col-span-5 border-gray-300 rounded px-3 py-2" placeholder="Username YouTube" value="<?php echo $youtube_username; ?>">
            </div>

            <div class="mb-4 grid grid-cols-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full border col-span-5 border-gray-300 rounded px-3 py-2" placeholder="Email" value="<?php echo $email; ?>" requigreen>
            </div>

            <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Save</button>
        </form>
    </div>
    </div></div>

</body>
</html>

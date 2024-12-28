<?php
session_start();
include '../db_config.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Query untuk mengambil data pesan kontak
$sql = "SELECT * FROM contact_messages ORDER BY sent_at DESC";
$result = $conn->query($sql);
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
    <style>
        .message-column {
            white-space: normal; /* Membungkus teks */
            word-wrap: break-word; /* Memastikan kata panjang dibungkus */
            max-width: 400px; /* Opsional: Sesuaikan lebar kolom jika diperlukan */
        }
    </style>
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


    <!-- Content -->
    <div class="px-5 mx-auto mt-10">
        <h3 class="text-2xl font-bold mb-6 text-center">Data Contact Messages</h3>

        <?php if ($result->num_rows > 0): ?>
            <div class="overflow-x-auto">
                <table class="table-auto w-full bg-white shadow-lg rounded-lg">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Pesan</th>
                            <th class="px-4 py-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="border-b">
                                <td class="px-4 py-2 text-center"><?php echo $no++; ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td class="px-4 py-2 message-column"><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                                <td class="px-4 py-2"><?php echo $row['sent_at']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">Tidak ada pesan kontak.</p>
        <?php endif; ?>
    </div>
        </div></div>
</body>
</html>

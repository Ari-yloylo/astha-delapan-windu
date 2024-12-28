<?php
// admin/add_article.php
session_start();
include 'db_config.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Validasi dan upload gambar
    $image = NULL;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (in_array($file_ext, $allowed_ext)) {
            $image = uniqid() . '.' . $file_ext;
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image)) {
                $error = "Gagal mengunggah gambar.";
            }
        } else {
            $error = "Format file tidak diizinkan.";
        }
    }

    // Menyimpan data ke database
    if (!isset($error)) {
        $sql = "INSERT INTO articles (title, content, image) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $title, $content, $image);
            if ($stmt->execute()) {
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Terjadi kesalahan: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error = "Terjadi kesalahan saat mempersiapkan query: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel - Admin Perusahaan XYZ</title>
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
<body class="bg-gray-100 min-h-screen">
<div class="flex min-h-screen">
    <!-- Sidebar - Menu Navigasi -->
    <div class="relative bg-green-800 w-64 hidden lg:block">
        <div class="bg-green-600 mx-auto flex justify-between items-center p-7 h-[72px]">
            <a href="dashboard.php" class="block text-white text-lg font-bold">Admin Dashboard</a>
        </div>
        <div class="flex flex-col h-[calc(100%-72px)]">
            <a href="dashboard/medsos.php" class="block text-white hover:bg-yellow-500 p-4 px-5">Medsos</a>
            <a href="dashboard/contact_messages.php" class="block text-white hover:bg-yellow-500 p-4 px-5">Contact Messages</a>
            <a href="logout.php" class="block text-white hover:bg-yellow-500 p-4 px-5 mt-auto">Logout</a>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="w-full">
        <!-- Navbar - Menu Atas -->
        <nav class="bg-green-600 mx-auto relative lg:flex justify-between items-center p-2">
            <div class="container mx-auto flex justify-between items-center">
                <a href="dashboard.php" class="text-white lg:hidden text-lg font-bold">Admin Dashboard</a>
                <button id="menuButton" class="lg:hidden text-white">
                    <!-- Ikon menu (hamburger) pada layar kecil -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
            <!-- Menu Dropdown (hanya untuk layar kecil) -->
            <div id="menu" class="absolute left-0 top-full bg-green-600 hidden lg:w-max w-full shadow-lg lg:relative lg:flex lg:flex-row lg:space-x-4 lg:shadow-none">
                <a href="add_article.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap">Tambah Artikel</a>
                <a href="dashboard/medsos.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap lg:hidden">Medsos</a>
                <a href="dashboard/contact_messages.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap lg:hidden">Contact Messages</a>
                <a href="logout.php" class="block text-white hover:bg-yellow-500 p-4 whitespace-nowrap lg:hidden">Logout</a>
            </div>
        </nav>

    <!-- Form Tambah Artikel -->
    <div class="px-5 mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6">Tambah Artikel Baru</h2>
        <?php if (isset($error)): ?>
            <div class="bg-green-100 text-green-700 border border-green-400 rounded p-4 mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="add_article.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-medium mb-2">Judul Artikel</label>
        <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Masukkan judul artikel" required>
    </div>
    <div class="mb-4">
        <label for="content" class="block text-gray-700 font-medium mb-2">Konten Artikel</label>
        <textarea id="content" name="content" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" rows="10" placeholder="Tulis konten artikel di sini" required></textarea>
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 font-medium mb-2">Gambar Artikel</label>
        <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" accept="image/*" onchange="previewImage(event)">
    </div>
    
    <!-- Preview Gambar -->
    <div id="imagePreview" class="mb-4">
        <img id="preview" src="#" alt="Preview Gambar" class="hidden w-1/2 h-auto rounded">
    </div>
    
    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Tambah Artikel</button>
</form>

    </div>
        </div></div>
        <script>
    // Fungsi untuk menampilkan preview gambar
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;  // Set the src to the image data
                preview.classList.remove('hidden');  // Tampilkan gambar
            };
            reader.readAsDataURL(file);  // Membaca gambar sebagai data URL
        } else {
            preview.classList.add('hidden');  // Sembunyikan preview jika tidak ada gambar
        }
    }
</script>
</body>
</html>

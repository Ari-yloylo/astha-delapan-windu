<?php
session_start();
include '../db_config.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $facebook_username = $_POST['facebook_username'];
    $instagram_username = $_POST['instagram_username'];
    $twitter_username = $_POST['twitter_username'];
    $whatsapp_phone = $_POST['whatsapp_phone'];
    $youtube_username = $_POST['youtube_username'];
    $email = $_POST['email'];

    // Pastikan data tidak kosong
    if (empty($facebook_username) || empty($instagram_username) || empty($twitter_username) || empty($whatsapp_phone) || empty($youtube_username) || empty($email)) {
        echo "Semua data tidak boleh kosong!";
        exit();
    }

    // Mengecek apakah sudah ada data dengan ID = 1
    $sql_check = "SELECT * FROM social_media WHERE id = 1";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Jika ada data, lakukan UPDATE
        $sql_update = "UPDATE social_media SET 
                        facebook_username = ?, 
                        instagram_username = ?, 
                        twitter_username = ?, 
                        whatsapp_phone = ?, 
                        youtube_username = ?, 
                        email = ? 
                        WHERE id = 1";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("ssssss", $facebook_username, $instagram_username, $twitter_username, $whatsapp_phone, $youtube_username, $email);

        if ($stmt->execute()) {
            echo "Data berhasil diperbarui!";
        } else {
            echo "Terjadi kesalahan saat memperbarui data: " . $stmt->error;
        }
    } else {
        // Jika tidak ada data, lakukan INSERT
        $sql_insert = "INSERT INTO social_media (facebook_username, instagram_username, twitter_username, whatsapp_phone, youtube_username, email) 
                       VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("ssssss", $facebook_username, $instagram_username, $twitter_username, $whatsapp_phone, $youtube_username, $email);

        if ($stmt->execute()) {
            echo "Data berhasil disimpan!";
        } else {
            echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
        }
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>

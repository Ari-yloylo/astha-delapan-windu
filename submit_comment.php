<?php
// submit_comment.php
include 'db_config.php';

// Mengecek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);
    $article_id = intval($_POST['article_id']);

    if(!empty($name) && !empty($comment) && $article_id > 0){
        $sql = "INSERT INTO comments (article_id, name, comment) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $article_id, $name, $comment);
        if($stmt->execute()){
            header("Location: artikel.php?id=" . $article_id);
            exit();
        } else {
            echo "Terjadi kesalahan saat mengirim komentar.";
        }
        $stmt->close();
    } else {
        echo "Harap lengkapi semua field.";
    }
}

$conn->close();
?>

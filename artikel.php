<?php
// artikel.php
include 'db_config.php';

$blogs = "SELECT * FROM articles ORDER BY RAND() LIMIT 10";

$recommended_articles = $conn->query($blogs);

// Mengambil ID artikel dari parameter URL
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $article_id = $_GET['id'];

    // Mengambil data artikel
    $sql = "SELECT * FROM articles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();

    if(!$article){
        die("Artikel tidak ditemukan.");
    }

    // Mengambil komentar-komentar terkait artikel
    $sql_comments = "SELECT * FROM comments WHERE article_id = ? ORDER BY created_at DESC";
    $stmt_comments = $conn->prepare($sql_comments);
    $stmt_comments->bind_param("i", $article_id);
    $stmt_comments->execute();
    $result_comments = $stmt_comments->get_result();
} else {
    die("ID artikel tidak valid.");
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime('now', new DateTimeZone('Asia/Jakarta')); // Pastikan timezone sesuai
    $ago = new DateTime($datetime, new DateTimeZone('Asia/Jakarta')); // Waktu dari database
 
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = [
        'y' => 'tahun',
        'm' => 'bulan',
        'w' => 'minggu',
        'd' => 'hari',
        'h' => 'jam',
        'i' => 'menit',
        's' => 'detik',
    ];
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?> - Blog Astha Delapan Windu</title>

    <!-- Meta Tags for SEO -->
    <meta name="description" content="<?php echo htmlspecialchars(substr(strip_tags($article['content']), 0, 150)); ?>...">
    <meta name="keywords" content="PT. Astha Delapan Windu, blog, layanan otomotif, <?php echo htmlspecialchars($article['title']); ?>, nitrogen, carwash, cutting sticker">
    <meta name="author" content="PT. Astha Delapan Windu">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="<?php echo htmlspecialchars($article['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars(substr(strip_tags($article['content']), 0, 150)); ?>...">
    <meta property="og:image" content="uploads/<?php echo htmlspecialchars($article['image']); ?>">
    <meta property="og:url" content="http://yourwebsite.com/artikel.php?id=<?php echo $article_id; ?>">
    <meta property="og:type" content="article">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($article['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars(substr(strip_tags($article['content']), 0, 150)); ?>...">
    <meta name="twitter:image" content="uploads/<?php echo htmlspecialchars($article['image']); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'layout/header.php' ?>

    <!-- Konten Artikel -->
    <div class="container" style="padding-top: 70px;">
        <div class="row">
            <!-- Artikel Utama -->
            <div class="col-lg-8">
                <div class="py-5">
                    <div class="card text-bg-secondary">
                        <div class="card-body">
                            <h1><?php echo htmlspecialchars($article['title']); ?></h1>
                            <p class="text-white">Dibuat pada: <?php echo date('d M Y', strtotime($article['created_at'])); ?></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php if ($article['image']): ?>
                            <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" class="img-fluid my-4" style="max-width: 400px; height: auto;" alt="Gambar Artikel">
                        <?php endif; ?>
                    </div>
                    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
                </div>

                <hr>

                <!-- Komentar -->
                <h4>Komentar Pengunjung</h4>
                <?php if ($result_comments->num_rows > 0): ?>
                    <?php while ($comment = $result_comments->fetch_assoc()): ?>
                        <div class="mb-4 card">
                            <div class="card-header">
                                <h6><strong><?php echo htmlspecialchars($comment['name']); ?></strong>
                                    <small class="text-muted">
                                        <?php echo time_elapsed_string($comment['created_at']); ?>
                                    </small>
                    </h6>
                            </div>
                            <div class="card-body">
                                <p class="comment"><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Belum ada komentar. Jadilah yang pertama untuk berkomentar!</p>
                <?php endif; ?>

                <!-- Formulir Komentar -->
                <h4>Tambahkan Komentar</h4>
                <form action="submit_comment.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea id="comment" name="comment" rows="4" class="form-control" placeholder="Tulis komentar Anda" required></textarea>
                    </div>
                    <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                </form>
            </div>

            <!-- Sidebar Rekomendasi Artikel -->
            <div class="col-lg-4">
    <h4 class="mt-5">Rekomendasi Artikel</h4>
    <ul class="list-group">
        <?php foreach ($recommended_articles as $recommended): ?>
            <li class="list-group-item shadow card">
                <!-- Card untuk Gambar Artikel -->
                <?php if (!empty($recommended['image'])): ?>
                    <div class="card mb-3">
                        <img src="uploads/<?php echo htmlspecialchars($recommended['image']); ?>" alt="<?php echo htmlspecialchars($recommended['title']); ?>" class="card-img-top" style="max-height: 150px; object-fit: cover;">
                    </div>
                <?php endif; ?>
                
                <!-- Card untuk Judul Artikel -->
                <!-- <div class="card">
                    <div class="card-body"> -->
                        <a href="artikel.php?id=<?php echo $recommended['id']; ?>" class="card-title">
                            <strong><?php echo htmlspecialchars($recommended['title']); ?></strong>
                        </a>
                        <p class="text-muted">Dibuat pada: <?php echo date('d M Y', strtotime($recommended['created_at'])); ?></p>
                    <!-- </div>
                </div> -->
            </li>
        <?php endforeach; ?>
    </ul>
</div>


        </div>
    </div>
    <footer>
        <p>&copy; 2024 PT. Astha Delapan Windu. Semua hak cipta dilindungi undang-undang.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// blog.php
include 'db_config.php';

// Ambil data dari database berdasarkan ID = 1
$sosmed = "SELECT * FROM social_media WHERE id = 1";
$result = $conn->query($sosmed);
$social_media = $result->fetch_assoc();

// Jika tidak ada data, set default kosong
$facebook = $social_media['facebook_username'] ?? '';
$instagram = $social_media['instagram_username'] ?? '';
$youtube = $social_media['youtube_username'] ?? '';
$email = $social_media['email'] ?? '';
$whatsapp_phone = $social_media['whatsapp_phone'] ?? '';

// Mengambil 3 artikel
$sql = "SELECT * FROM articles ORDER BY created_at DESC limit 3";
$result = $conn->query($sql);
?>
<?php
$navbar_list = '
 <li class="nav-item">
                    <a class="nav-link" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog perusahaan PT. Astha Delapan Windu, memberikan informasi terbaru mengenai layanan otomotif seperti pengisian nitrogen, carwash tanpa air, dan cutting stiker.">
    <meta name="keywords" content="blog, PT. Astha Delapan Windu, layanan otomotif, pengisian nitrogen, carwash, cutting stiker, layanan kendaraan, Riau, Sumbar">
    <meta name="author" content="PT. Astha Delapan Windu">
    <meta property="og:title" content="Blog Kami - PT. Astha Delapan Windu">
    <meta property="og:description" content="Baca artikel terbaru di blog kami mengenai layanan otomotif yang kami tawarkan, termasuk pengisian nitrogen, waterless carwash, dan cutting stiker.">
    <meta property="og:image" content="asset/og-image.jpg"> <!-- Ganti dengan URL gambar yang relevan -->
    <meta property="og:url" content="https://www.perusahaan.com/blog.php">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog Kami - PT. Astha Delapan Windu">
    <meta name="twitter:description" content="Baca artikel terbaru di blog kami mengenai layanan otomotif yang kami tawarkan, termasuk pengisian nitrogen, waterless carwash, dan cutting stiker.">
    <meta name="twitter:image" content="asset/og-image.jpg"> <!-- Ganti dengan URL gambar yang relevan -->
    <meta name="twitter:site" content="@perusahaan">
    <meta name="robots" content="index, follow">
    <title>Landing Page - Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'layout/header.php' ?>


    <section id="home">
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" data-aos="fade-left" data-aos-duration="1000">
                <!-- Slide 2 -->
                <div class="carousel-item active">
                    <img src="asset/ASTHA DELAPAN WINDU (4320 x 1080 piksel).png" class="d-block w-100" alt="second slide">
                    <div class="carousel-caption d-block d-md-block">
                        <h5 class="d-none d-lg-block">selamat datang</h5>
                        <p class="d-none d-lg-block">website perusahaan PT. Astha Delapan Windu.</p>
                        <h5 class="d-block d-lg-none fs-6">selamat datang</h5>
                        <p class="d-block d-lg-none fs-6">website perusahaan PT. Astha Delapan Windu.</p>
                        <a href="#about" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
                <!-- Slide 1 -->
                <div class="carousel-item">
                    <img src="asset/kulim 1.jpg" class="d-block w-100" alt="First slide">
                    <div class="carousel-caption d-block d-md-block">
                        <h5 class="d-none d-lg-block">Pengisian Nitrogen</h5>
                        <p class="d-none d-lg-block">Menyediakan solusi terbaik untuk kebutuhan ban kendaraan Anda.</p>
                        <h5 class="d-block d-lg-none fs-6">Pengisian Nitrogen</h5>
                        <p class="d-block d-lg-none fs-6">Menyediakan solusi terbaik untuk kebutuhan ban kendaraan Anda.</p>
                        <a href="layanan-nitrogen.php" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="asset/crosure6.jpg" class="d-block w-100" alt="third slide">
                    <div class="carousel-caption d-block d-md-block">
                        <h5 class="d-none d-lg-block">Waterless Carwash</h5>
                        <p class="d-none d-lg-block">Layanan pencucian mobil tanpa air yang ramah lingkungan.</p>
                        <h5 class="d-block d-lg-none fs-6">Waterless Carwash</h5>
                        <p class="d-block d-lg-none fs-6">Layanan pencucian mobil tanpa air yang ramah lingkungan.</p>
                        <a href="layanan-carwash.php" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="carousel-item">
                    <img src="asset/WhatsApp Image 2024-12-28 at 08.32.42.jpeg" class="d-block w-100" alt="fourth slide">
                    <div class="carousel-caption d-block d-md-block">
                        <h5 class="d-none d-lg-block">ceramic coating</h5>
                        <p class="d-none d-lg-block">perlindungan pertama untuk cat mobil anda.</p>
                        <h5 class="d-block d-lg-none fs-6">ceramic coating</h5>
                        <p class="d-block d-lg-none fs-6">perlindungan pertama untuk cat mobil anda.</p>
                        <a href="layanan-cutting-sticker.php" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="about" class="bordered-section" data-aos="fade-up" data-aos-duration="1000" style="background-color: #f9f9f9; padding: 3rem 0;">
    <div class="container">
        <h2 class="text-center mb-5" style="font-size: 2.5rem; font-weight: bold;">Tentang Kami</h2>

        <!-- Profil Perusahaan -->
        <div class="row align-items-center mb-5">
    <!-- Kolom Teks Profil -->
    <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
    <div style="background-color: #f9f9f9; border-radius: 12px; box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1); padding: 25px;">
        <h3 style="font-size: 2rem; font-weight: bold; color: #2c3e50; margin-bottom: 20px;" data-aos="fade-up" data-aos-duration="1000">Profil Perusahaan</h3>
        <p style="font-size: 1rem; line-height: 1.8; text-align: justify; color: #555;" data-aos="fade-up" data-aos-duration="1000">
            <strong>PT. Astha Delapan Windu</strong>, didirikan pada tahun 2016, bergerak di bidang <strong>AUTO CARE</strong> dengan layanan pengisian angin nitrogen dan bekerja sama dengan lebih dari <strong>45 SPBU</strong> di Riau dan Sumatera Barat.
        </p>
        <p style="font-size: 1rem; line-height: 1.8; text-align: justify; color: #555;" data-aos="fade-up" data-aos-duration="1000">
            Pada 2019, kami dipercaya mengelola <strong>Bengkel Enduro Express</strong>, jaringan resmi mitra Pertamina. Fokus utama kami adalah menjadi mitra terbaik PT Pertamina (Persero) dengan memanfaatkan teknologi terkini untuk pelayanan optimal.
        </p>
        <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-top: 15px;" data-aos="fade-up" data-aos-duration="1000">
            Dengan visi menjadi penyedia jasa fasilitas otomotif yang kompetitif, kami berharap dapat terus memberikan manfaat bagi konsumen dan menjadi mitra terpercaya jaringan SPBU Pertamina.
        </p>
    </div>
</div>

    <!-- Kolom Gambar -->
    <div class="col-md-6 text-center" data-aos="fade-down" data-aos-duration="1000">
        <div style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <img src="asset/MTQ.jpg" class="img-fluid" alt="Ilustrasi Profil Perusahaan" style="width: 100%; height: auto;">
        </div>
        <p style="font-size: 0.9rem; color: #777; margin-top: 10px;">*Salah satu outlet bengkel enduro express kami</p>
    </div>
</div>


        <!-- Sejarah Perusahaan -->
        <div class="row align-items-center mb-5" data-aos="fade-up" data-aos-duration="1000">
    <!-- Kolom Gambar -->
    <div class="col-md-6 text-center" data-aos="fade-right" data-aos-duration="1000">
        <div style="background-color: #f9f9f9; border-radius: 12px; box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1); overflow: hidden; padding: 10px;">
            <img src="asset/waterless.jpeg" class="img-fluid rounded" alt="Ilustrasi Sejarah Perusahaan" style="width: 100%; height: auto;">
            <p style="font-size: 0.9rem; color: #777; margin-top: 10px;">*Wash and max basement mal ska pekanbaru</p>
        </div>
    </div>
    <!-- Kolom Teks -->
    <div class="col-md-6">
    <div style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1); padding: 30px;">
        <h3 style="font-size: 2rem; font-weight: bold; color: #2c3e50; margin-bottom: 20px;" data-aos="fade-up" data-aos-duration="1000">Sejarah dan Perkembangan</h3>
        <p style="font-size: 1rem; line-height: 1.8; text-align: justify; color: #555;" data-aos="fade-up" data-aos-duration="1000">
            <strong>PT Astha Delapan Windu</strong> berdiri pada 2015 di Pekanbaru, Riau, dengan dua lokasi layanan. Seiring waktu, lokasi terus bertambah, mencerminkan komitmen perusahaan untuk berkembang.
        </p>
        <p style="font-size: 1rem; line-height: 1.8; text-align: justify; color: #555;" data-aos="fade-up" data-aos-duration="1000">
            Pada 2020, layanan pengisian nitrogen diperluas ke toko retail Alfamart untuk meningkatkan akses konsumen yang sebelumnya hanya tersedia di SPBU atau bengkel.
        </p>
        <p style="font-size: 1rem; line-height: 1.8; text-align: justify; color: #555;" data-aos="fade-up" data-aos-duration="1000">
            Dengan visi menjadi perusahaan jasa otomotif yang kompetitif dan solusional, PT Astha Delapan Windu terus berinovasi untuk melayani pelanggan dan mitra di Indonesia.
        </p>
    </div>
</div>


    </div>
</section>

    <!-- Layanan -->
    <section id="services" class="bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="font-size: 2.5rem; font-weight: bold;" data-aos="fade-up" data-aos-duration="1000">Layanan Kami</h2>
        <div class="row">
            <!-- Layanan 1 -->
            <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
                <img src="asset/logo.png" alt="Layanan 1" class="img-fluid rounded-circle" width="150" height="150" data-aos="zoom-in" data-aos-duration="1000">
                <h4 class="mt-3">Pengisian Nitrogen</h4>
                <p>Pengisian nitrogen berkualitas untuk kendaraan Anda. Layanan cepat dan aman untuk tekanan ban yang optimal.</p>
                <a href="layanan-nitrogen.php" class="btn btn-primary mt-3">Baca Selengkapnya</a>
            </div>
            <!-- Layanan 2 -->
            <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
                <img src="asset/eco.jpeg" alt="Layanan 2" class="img-fluid rounded-circle" width="150" height="150" data-aos="zoom-in" data-aos-duration="1000">
                <h4 class="mt-3">Waterless Carwash</h4>
                <p>Jasa pencucian mobil tanpa air yang ramah lingkungan, memberikan perawatan mobil Anda tanpa meninggalkan bekas.</p>
                <a href="layanan-carwash.php" class="btn btn-primary mt-3">Baca Selengkapnya</a>
            </div>
            <!-- Layanan 3 -->
            <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
                <img src="asset/gozilaz.jpeg" alt="Layanan 3" class="img-fluid rounded-circle" width="150" height="150" data-aos="zoom-in" data-aos-duration="1000">
                <h4 class="mt-3">ceramic coating</h4>
                <p>Lapisan coating dapat memberikan proteksi terhadap sinar UV dari matahari agar warna cat mobil tetap bagus dan mengkila.</p>
                <a href="layanan-cutting-sticker.php" class="btn btn-primary mt-3">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

    <div class="container py-5" style="padding-top: 70px;" data-aos="fade-up" data-aos-duration="1000">
        <h1 class="text-center mb-5" style="font-size: 2.5rem; font-weight: bold;">Blog Kami</h1>
        <div class="row">
            <?php if($result->num_rows > 0): ?>
                <?php $i = 1?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4"  data-aos="fade-left" data-aos-duration="<?=1000 * $i?>">
                        <div class="card h-100 p-2">
                            <?php if($row['image']): ?>
                                
                                <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top object-fit-cover"  style="height:200px" alt="Gambar Artikel <?php echo htmlspecialchars($row['title']); ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x200" class="card-img-top object-fit-cover" style="height:200px"  alt="Gambar Artikel">
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="text-blue">Dibuat pada: <?php echo date('d M Y', strtotime($row['created_at'])); ?></p>
                                <p class="card-text"><?php echo substr(strip_tags($row['content']), 0, 100); ?>...</p>
                                <a href="artikel.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <?php $i++;?>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Belum ada artikel.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-12" style="margin-top: 30px;" data-aos="fade-up" data-aos-duration="1000">
    <div style="background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1); padding: 30px; text-align: center;">
        <h3 style="font-size: 2rem; font-weight: bold; color: #28a745; margin-bottom: 20px;">Bergabunglah Bersama Kami!</h3>
        <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-bottom: 20px;">
            Kami membuka peluang kemitraan bagi Anda yang ingin berkembang bersama dalam layanan otomotif modern dan ramah lingkungan. Dapatkan dukungan penuh dari tim kami dan jadilah bagian dari jaringan kemitraan yang sukses.
        </p>
        <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-bottom: 30px;">
            Dengan bergabung sebagai mitra kami, Anda akan mendapatkan akses ke teknologi terkini, pelatihan khusus, dan peluang bisnis yang terus berkembang. Mari wujudkan visi bersama untuk masa depan yang lebih baik!
        </p>
        <form onsubmit="redirectToWhatsApp(event)" style="text-align: left; margin-top: 20px; max-width: 600px; margin: 0 auto;">
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-size: 1rem; color: #555;">Nama:</label>
                <input type="text" id="name" placeholder="Masukkan nama Anda" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="company" style="display: block; font-size: 1rem; color: #555;">Perusahaan:</label>
                <input type="text" id="company" placeholder="Nama perusahaan Anda" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-size: 1rem; color: #555;">Email:</label>
                <input type="email" id="email" placeholder="Alamat email Anda" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="description" style="display: block; font-size: 1rem; color: #555;">Deskripsi Kerjasama:</label>
                <textarea id="description" rows="4" placeholder="Jelaskan jenis kerjasama yang diinginkan" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
            </div>
            <button type="submit" style="background-color: #28a745; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer; width: 100%;">
                Kirim dan Hubungi Kami via WhatsApp
            </button>
        </form>
    </div>
</div>

<script>
    function redirectToWhatsApp(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const company = document.getElementById('company').value;
        const email = document.getElementById('email').value;
        const description = document.getElementById('description').value;

        const message = `Halo, saya ingin bermitra dengan informasi berikut:\n\nNama: ${name}\nPerusahaan: ${company}\nEmail: ${email}\nDeskripsi Kerjasama: ${description}`;

        const encodedMessage = encodeURIComponent(message);
        window.open(`https://wa.me/6281234567890?text=${encodedMessage}`, '_blank');
    }
</script>



   <!-- Kontak -->
<section id="contact" class="bg-dark text-white" data-aos="fade-up" data-aos-duration="1000">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="font-size: 2.5rem; font-weight: bold;">Hubungi Kami</h2>

        <!-- Informasi Kontak -->
        <div class="row mb-5">
            <div class="col-md-6">
                <h4>Alamat</h4>
                <p class="text-warning">
                    Jl. Duyung No. 113, Marpoyan Damai<br>
                    Indonesia, 12345
                </p>
                <h4>Email</h4>
                <p>
                    <a href="mailto:<?php echo $email; ?>" class="text-warning"><?php echo $email; ?></a>
                </p>
                <h4>Telepon</h4>
                <p>
                    <a href="tel:<?php echo $whatsapp_phone; ?>" class="text-warning"><?php echo $whatsapp_phone; ?></a>
                </p>
            </div>
            
            <!-- Media Sosial -->
            <div class="col-md-6">
                <h4>Ikuti Kami di Media Sosial</h4>
                <ul class="list-unstyled">
                    <?php if (!empty($facebook)): ?>
                    <li class="d-flex align-items-center mb-3">
                        <i class="bi bi-facebook fa-2x text-primary me-3"></i>
                        <a href="https://facebook.com/<?php echo $facebook; ?>" target="_blank" class="text-warning">Facebook</a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if (!empty($instagram)): ?>
                    <li class="d-flex align-items-center mb-3">
                        <i class="bi bi-instagram fa-2x text-danger me-3"></i>
                        <a href="https://instagram.com/<?php echo $instagram; ?>" target="_blank" class="text-warning">Instagram</a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if (!empty($youtube)): ?>
                    <li class="d-flex align-items-center mb-3">
                        <i class="bi bi-youtube fa-2x text-danger me-3"></i>
                        <a href="https://youtube.com/channel/<?php echo $youtube; ?>" target="_blank" class="text-warning">YouTube</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        
      <!-- Formulir Kontak -->
<div class="row">
    <div class="col-12">
        <h4>Kirim Pesan kepada Kami</h4>
        <form action="contact.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea id="message" name="message" rows="5" class="form-control" placeholder="Tulis pesan Anda di sini" required></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Kirim</button>
        </form>
    </div>
</div>

</section>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PT. Astha Delapan Windu. Semua hak cipta dilindungi undang-undang.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
   document.addEventListener('scroll', function() {
    let sections = document.querySelectorAll('section');
    let navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');

    let currentSection = '';

    sections.forEach((section) => {
        let rect = section.getBoundingClientRect();
        if (rect.top <= 0 && rect.bottom >= 0) {
            currentSection = section.getAttribute('id');
        }
    });

    navbarLinks.forEach((link) => {
        link.classList.remove('active');
        // Only add the 'active' class if a section is currently in view
        if (currentSection && link.getAttribute('href').includes(currentSection)) {
            link.classList.add('active');
        }
    });
});

</script>
    <script>
        AOS.init();
    </script>
</body>

</html>

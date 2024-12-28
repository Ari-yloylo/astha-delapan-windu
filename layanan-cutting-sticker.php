<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Cutting Sticker</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
    <style>
        /* Video Wrapper */
        .video-wrapper {
            position: relative;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            margin: 20px auto;
            max-width: 1100px;
            height: 500px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Modern shadow */
        }

        .video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Video Overlay with Card */
        .video-overlay {
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px 30px;
    background: rgba(0, 0, 0, 0.6); /* Background lebih gelap agar tulisan jelas */
    color: white;
    border-radius: 8px;
    font-size: 1.8rem;
    font-weight: 600;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    animation: fadeIn 1.5s ease;
}

/* Responsif untuk layar kecil (mobile) */
@media (max-width: 768px) {
    .video-overlay {
        font-size: 1.5rem; /* Ukuran font lebih kecil */
        padding: 15px 20px; /* Padding lebih kecil */
    }
}

@media (max-width: 576px) {
    .video-overlay {
        font-size: 1.2rem; /* Ukuran font lebih kecil pada layar sangat kecil */
        padding: 10px 15px; /* Padding lebih kecil */
    }
}

.lead {
    text-align: justify;  /* Justify text alignment */
    line-height: 1.6;  /* Meningkatkan keterbacaan */
}
/* Pastikan teks di paragraf justify dengan benar */
/* Pastikan teks di paragraf justify dengan benar */
/* Pastikan teks di paragraf justify dengan benar */
.text-justify {
    text-align: justify; /* Justify text */
    line-height: 1.6; /* Menambah jarak antar baris untuk keterbacaan */
}

/* Pastikan ul dan li juga di-justify */
.list-group {
    display: block; /* Mengatur list group menjadi block */
}

.list-group-item {
    text-align: justify; /* Justify text pada setiap list item */
    padding-left: 10px; /* Tambahkan padding untuk jarak lebih baik */
    padding-right: 10px;
}



        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        /* Section Styling */
        section {
            padding: 60px 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); /* Subtle shadow */
            margin: 20px auto;
            border-radius: 10px;
            max-width: 1100px;
        }

        section h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }

        section p {
            font-size: 1rem;
            color: #555;
            text-align: center;
            margin-top: 15px;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #555;
            color: white;
            margin-top: 30px;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar (Dari style.css) -->
    <?php include 'layout/header.php'; ?>

    <!-- Video with Overlay Text -->
    <div class="video-wrapper">
        <video autoplay muted loop>
            <source src="asset/videos/WhatsApp Video 2024-12-16 at 14.02.02.mp4" type="video/mp4">
            Browser Anda tidak mendukung video. Silakan gunakan browser modern.
        </video>
        <div class="video-overlay">
            Selamat Datang di Layanan detailing gorilaz ceramic coating
        </div>
    </div>

    <!-- About Section -->
    <section class="about-service py-5 bg-light" id="ceramic-coating">
    <div class="container">
        <!-- Judul -->
        <h2 class="text-center fw-bold mb-4" data-aos="fade-up">gorilaz Ceramic Coating</h2>

<!-- Gambar di Tengah -->
<div class="text-center" data-aos="zoom-in" data-aos-duration="1000">
    <img src="asset/gozilaz-removebg-preview.png" alt="Nitrogen Icon" 
         style="width: 150px; margin-top: 10px;">
</div>

        <!-- Deskripsi Umum -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <p class="lead text-justify" data-aos="fade-up" data-aos-delay="200">
                    <strong>Ceramic Coating</strong> adalah cairan pelindung berbahan dasar <strong>SiO2 (silika)</strong>, 
                    yang memiliki sifat seperti kaca. Setelah diaplikasikan pada permukaan kendaraan, 
                    cairan ini akan mengeras dan membentuk lapisan pelindung yang sangat tipis, tetapi sangat kuat.
                    Teknologi ini berfungsi untuk memberikan proteksi maksimal pada permukaan cat mobil, 
                    menjaga keindahan warna serta kilap cat mobil dalam jangka waktu yang lebih lama.
                </p>
                <p class="lead text-justify" data-aos="fade-up" data-aos-delay="300">
                    Ceramic coating juga melindungi cat mobil dari kerusakan akibat sinar UV, oksidasi, dan goresan kecil. 
                    Dengan sifat hidrofobik yang dimilikinya, air dan kotoran menjadi sulit menempel, membuat perawatan 
                    mobil Anda lebih mudah dan cepat.
                </p>
            </div>
        </div>

        <!-- Layanan Lengkap -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <h4 class="fw-bold mb-3" data-aos="fade-up" data-aos-delay="500">Layanan yang Kami Tawarkan</h4>
                <ul class="list-unstyled" data-aos="fade-up" data-aos-delay="600">
                    <li><strong>Ultra Nano Coating</strong></li>
                    <p class="text-justify">
                        Layanan premium yang mencakup <em>tar & bug removal</em>, detailing mendalam, efek hidrofobik, 
                        kilap super glossy & wet look, poles eksklusif, serta jaminan kepuasan pelanggan.
                    </p>

                    <li><strong>Super Nano Sealant</strong></li>
                    <p class="text-justify">
                        Menawarkan layanan yang sama dengan Ultra Nano Coating, memberikan kilap sempurna 
                        dan perlindungan menyeluruh pada cat mobil Anda.
                    </p>

                    <li><strong>Ceramic Coating</strong></li>
                    <p class="text-justify">
                        Menyediakan perlindungan menyeluruh terhadap UV, erosi cuaca, serta kemudahan membersihkan permukaan. 
                        Memberikan proteksi permanen hingga <strong>5 tahun</strong> dengan perawatan khusus. 
                        Dilengkapi efek hidrofobik, goresan tahan ringan, dan garansi <strong>2 tahun</strong>.
                    </p>
                </ul>
            </div>
        </div>
        <!-- Video Lokal -->
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="400">
            <div class="col-lg-10 mx-auto">
                <div class="video-container" style="position: relative; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
                    <video controls autoplay muted loop style="width: 100%; height: 350px; object-fit: cover; display: block;">
                        <source src="asset/videos/WhatsApp Video 2024-12-16 at 14.06.42.mp4" type="video/mp4">
                        Browser Anda tidak mendukung pemutaran video ini.
                    </video>
                </div>
            </div>
        </div>
        <!-- Tabel Harga -->
        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <h4 class="text-center fw-bold mb-3" data-aos="fade-up" data-aos-delay="700">Tabel Harga Paket Layanan</h4>
                <div class="table-responsive" data-aos="fade-up" data-aos-delay="800">
                    <table class="table table-bordered text-center table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Paket</th>
                                <th>Small</th>
                                <th>Medium</th>
                                <th>Large</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ultra Nano Coating</td>
                                <td>1550K</td>
                                <td>1750K</td>
                                <td>1950K</td>
                            </tr>
                            <tr>
                                <td>Super Nano Sealant</td>
                                <td>1600K</td>
                                <td>1800K</td>
                                <td>2000K</td>
                            </tr>
                            <tr>
                                <td>Ceramic Coating</td>
                                <td>3000K</td>
                                <td>3500K</td>
                                <td>4000K</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-5" data-aos="fade-up" data-aos-delay="400">
            <div class="col-lg-10 mx-auto">
                <div class="video-container" style="position: relative; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
                    <video controls autoplay muted loop style="width: 100%; height: 350px; object-fit: cover; display: block;">
                        <source src="asset/videos/WhatsApp Video 2024-12-16 at 14.09.19.mp4" type="video/mp4">
                        Browser Anda tidak mendukung pemutaran video ini.
                    </video>
                </div>
            </div>
        </div>
            <div class="container">
        <h3 class="text-center fw-bold mb-4" data-aos="fade-up">Daftar Harga Motor</h3>
        <div class="table-responsive" data-aos="fade-up" data-aos-delay="200">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Jenis Layanan</th>
                        <th>SMALL</th>
                        <th>MEDIUM</th>
                        <th>LARGE</th>
                        <th>LUXURY BIKE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ultra Nano Coating</td>
                        <td>400K</td>
                        <td>650K</td>
                        <td>1000K</td>
                        <td>1750K</td>
                    </tr>
                    <tr>
                        <td>Super Nano Sealant</td>
                        <td>450K</td>
                        <td>700K</td>
                        <td>1050K</td>
                        <td>1800K</td>
                    </tr>
                    <tr>
                        <td>Ceramic Coating</td>
                        <td>600K</td>
                        <td>850K</td>
                        <td>1250K</td>
                        <td>2000K</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>
</section>

        </div>
    </div>
</section>
<section class="py-5" id="maps">
    <div class="container" data-aos="fade-up" data-aos-delay="200">
        <h2 class="text-center fw-bold mb-4">Lokasi Kami</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <!-- Google Maps Embed -->
                <div class="map-container text-center">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7414.251882689378!2d101.48489962042137!3d0.49374773768699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5afd9c23db4fb%3A0x8891c5725a6bc51d!2sGorillaz%20Detailing%20Pekanbaru!5e0!3m2!1sid!2sid!4v1734505985304!5m2!1sid!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="booking-now py-5 bg-light" id="booking-now">
    <div class="container">
        <h3 class="text-center fw-bold mb-4" data-aos="fade-up">Booking Now untuk Layanan Ceramic Coating</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Formulir Booking -->
                <form id="bookingForm" data-aos="fade-up" data-aos-delay="200">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="serviceType" class="form-label">Jenis Layanan</label>
                        <select class="form-select" id="serviceType" required>
                            <option value="Ultra Nano Coating">Ultra Nano Coating</option>
                            <option value="Super Nano Sealant">Super Nano Sealant</option>
                            <option value="Ceramic Coating">Ceramic Coating</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleType" class="form-label">Jenis Kendaraan</label>
                        <select class="form-select" id="vehicleType" required>
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Motor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="preferredDate" class="form-label">Tanggal Preferensi</label>
                        <input type="date" class="form-control" id="preferredDate" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Booking Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // Menangani pengiriman form
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var fullName = document.getElementById('fullName').value;
        var serviceType = document.getElementById('serviceType').value;
        var vehicleType = document.getElementById('vehicleType').value;
        var preferredDate = document.getElementById('preferredDate').value;

        // Membuat pesan WhatsApp
        var message = `Halo, saya ingin melakukan booking layanan:\n\nNama: ${fullName}\nLayanan: ${serviceType}\nJenis Kendaraan: ${vehicleType}\nTanggal Preferensi: ${preferredDate}\n\nMohon konfirmasi lebih lanjut.`;

        // URL WhatsApp dengan pesan otomatis
        var whatsappURL = `https://wa.me/6281234567890?text=${encodeURIComponent(message)}`;

        // Mengarahkan ke WhatsApp
        window.open(whatsappURL, '_blank');
    });
</script>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PT. Astha Delapan Windu. Semua hak cipta dilindungi undang-undang.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="assets/js/main.js"></script>
</body>
</html>

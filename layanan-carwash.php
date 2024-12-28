<?php
// blog.php
include 'db_config.php';

// Ambil data dari database berdasarkan ID = 1
$sosmed = "SELECT * FROM social_media WHERE id = 1";
$result = $conn->query($sosmed);
$social_media = $result->fetch_assoc();

$whatsapp_phone = $social_media['whatsapp_phone'] ?? '';
?>

<?php $navbar_brand = 'Layanan Car Wash'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Carwash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar and Header Combined -->
    <?php include 'layout/header.php' ?>


    <!-- Carousel Section -->
    <section id="home">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="asset/12.jpeg" class="d-block w-100" alt="Carwash Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Selamat Datang</h5>
                        <p>Menyediakan layanan pencucian mobil tanpa air yang ramah lingkungan.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="asset/21.jpeg" class="d-block w-100" alt="Carwash Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Teknologi Modern</h5>
                        <p>Memberikan hasil maksimal tanpa merusak kendaraan Anda.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="asset/jamur kaca.png" class="d-block w-100" alt="Carwash Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Layanan Cepat dan Praktis</h5>
                        <p>Proses pencucian yang efisien dan tanpa gangguan.</p>
                    </div>
                </div>
            </div>
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

    <!-- Service Description -->
    <section>
    <div class="container bg-light p-4 rounded" data-aos="fade-up" data-aos-duration="1000" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <!-- Judul Utama -->
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; font-weight: bold; color: #2c3e50;">
                <strong>Layanan Waterless Wash & Wax</strong>
            </h2>
            <h3 style="font-size: 1.5rem; color: #555;">Solusi Cerdas untuk Kendaraan Bersih dan Berkilau</h3>
            <img src="asset/eco-removebg-preview (1).png" alt="Nitrogen Icon" style="width: 150px; margin-top: 10px;" data-aos="zoom-in" data-aos-duration="1000">
        </div>

        <!-- Paragraf Pembuka -->
        <div class="text-center mb-4">
            <p style="font-size: 1.2rem; line-height: 1.8; color: #555;">
                Nikmati pengalaman baru dalam perawatan kendaraan dengan <strong>Waterless Wash & Wax</strong>, metode inovatif yang dirancang untuk membersihkan dan melindungi kendaraan Anda tanpa menggunakan air. Proses ini memanfaatkan cairan khusus berbahan premium yang ramah lingkungan dan efektif mengangkat kotoran sekaligus memberikan perlindungan ekstra pada permukaan kendaraan.
            </p>
            <div class="text-center mt-4">
            <img src="asset/enggine dressing.png" alt="Layanan Waterless Wash & Wax" class="img-fluid rounded" style="width: 100%; max-width: 350px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" data-aos="fade-up" data-aos-duration="1000">
        </div>
            <p style="font-size: 1.2rem; line-height: 1.8; color: #555;">
                Cocok untuk semua jenis kendaraan, <strong>Waterless Wash & Wax</strong> adalah pilihan tepat bagi Anda yang ingin menjaga kendaraan tetap bersih, berkilau, dan terlindungi dengan cara yang lebih praktis dan efisien.
            </p>
            <div class="text-center mt-4">
            <img src="asset/Interior cleaning.png" alt="Layanan Waterless Wash & Wax" class="img-fluid rounded" style="width: 100%; max-width: 350px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" data-aos="fade-up" data-aos-duration="1000">
        </div>
            <p style="font-size: 1.2rem; color: #555;">
                Percayakan kendaraan Anda kepada kami! Hubungi kami sekarang untuk menikmati layanan <strong>Waterless Wash & Wax</strong> di tempat yang Anda inginkan. ✨
            </p>
        </div>

        <!-- Paket Layanan -->
        <div class="my-4">
            <h4 style="font-size: 1.8rem; color: #333; font-weight: bold;">Paket Layanan Kami:</h4>
            <ul style="font-size: 1.2rem; color: #555;">
                <li data-aos="fade-up" data-aos-duration="1000"><strong>Basic</strong>:
                    <ul>
                        <li>Body Waxing: Memberikan kilau sempurna pada bodi kendaraan.</li>
                        <li>Interior Dust Removal: Membersihkan debu di bagian interior kendaraan.</li>
                        <li>Tire Dressing: Membuat ban tampak hitam pekat dan berkilau.</li>
                    </ul>
                </li>
                <li data-aos="fade-up" data-aos-duration="1000"><strong>Silver</strong>:
                    <ul>
                        <li>Semua layanan dari <strong>Basic</strong>.</li>
                        <li>Engine Dressing: Membersihkan dan melindungi komponen mesin agar terlihat rapi.</li>
                    </ul>
                </li>
                <li data-aos="fade-up" data-aos-duration="1000"><strong>Gold</strong>:
                    <ul>
                        <li>Semua layanan dari <strong>Silver</strong>.</li>
                        <li>Tar Removal: Menghilangkan noda aspal pada bodi kendaraan.</li>
                    </ul>
                </li>
                <li data-aos="fade-up" data-aos-duration="1000"><strong>Platinum</strong>:
                    <ul>
                        <li>Semua layanan dari <strong>Gold</strong>.</li>
                        <li>Glass Mold Cleaning: Membersihkan jamur kaca untuk visibilitas lebih baik.</li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Tabel Harga -->
        <h4 style="font-size: 1.8rem; color: #333; font-weight: bold; margin-bottom: 20px;" data-aos="fade-up" data-aos-duration="1000">
            Harga Layanan Waterless Wash & Wax:
        </h4>
        <table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse; text-align: center; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" data-aos="fade-up" data-aos-duration="1000">
            <thead style="background-color: #2c3e50; color: #ffffff;">
                <tr>
                    <th>Paket Layanan</th>
                    <th>City Car / Hatchback</th>
                    <th>MPV / Minibus / Sedan</th>
                    <th>SUV / Double Cabin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Basic</strong></td>
                    <td>Rp. 84.000</td>
                    <td>Rp. 90.000</td>
                    <td>Rp. 100.000</td>
                </tr>
                <tr>
                    <td><strong>Silver</strong></td>
                    <td>Rp. 120.000</td>
                    <td>Rp. 125.000</td>
                    <td>Rp. 135.000</td>
                </tr>
                <tr>
                    <td><strong>Gold</strong></td>
                    <td>Rp. 145.000</td>
                    <td>Rp. 165.000</td>
                    <td>Rp. 180.000</td>
                </tr>
                <tr>
                    <td><strong>Platinum</strong></td>
                    <td>Rp. 295.000</td>
                    <td>Rp. 315.000</td>
                    <td>Rp. 330.000</td>
                </tr>
            </tbody>
        </table>

        <!-- Gambar -->
        <div class="text-center mt-4">
            <img src="asset/foto waterless1.jpg" alt="Layanan Waterless Wash & Wax" class="img-fluid rounded" style="width: 100%; max-width: 700px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" data-aos="fade-up" data-aos-duration="1000">
        </div>

        <!-- Call-to-Action -->
        <div class="call-to-action text-center mt-4" style="background-color: #f9f9f9; border-radius: 12px; padding: 20px;" data-aos="fade-up" data-aos-duration="1000">
            <h4 style="font-size: 1.8rem; font-weight: bold; color: #2c3e50;">Kunjungi Kami di Basement Mal SKA Pekanbaru!</h4>
            <p style="font-size: 1.2rem; color: #555;">✨ Tidak perlu ragu lagi, kami siap memberikan layanan terbaik untuk kendaraan Anda. Ayo reservasi sekarang juga! ✨</p>
        </div>
    </div>
</section>



    <!-- Booking Form Section -->
    <section>
    <div class="container form-container">
        <h2>Booking Now</h2>
        <form onsubmit="return submitForm()">
            <input type="text" id="name" placeholder="Nama Lengkap" required><br>
            <input type="tel" id="phone" placeholder="Nomor WhatsApp" required><br>
            <input type="date" id="date" required><br>
            <input type="time" id="time" required><br>
            <div class="input-group mb-3">
                <select class="form-control" id="service">
                    <option value="">Pilih Layanan</option>
                        <option value="Basic">Basic</option>
                        <option value="Silver">Silver</option>
                        <option value="Gold">Gold</option>
                        <option value="Gold">pelatinum</option>
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="service">Layanan</label>
                </div>
            </div>
            <button type="submit">Booking Now</button>
</form>
</div>
    <!-- </div> -->
</section>
<!-- Footer -->
<footer>
        <p>&copy; 2024 PT. Astha Delapan Windu. Semua hak cipta dilindungi undang-undang.</p>
    </footer>

<script>
    function submitForm() {
        // Ambil nilai dari input form
        const name = document.getElementById('name').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const date = document.getElementById('date').value;
        const time = document.getElementById('time').value;
        const service = document.getElementById('service').value;

        // Validasi input
        if (!name || !phone || !date || !time || !service) {
            alert('Harap isi semua data dengan lengkap.');
            return false;
        }

        // Buat pesan WhatsApp
        const message = `Halo, saya ingin memesan layanan carwash.%0A%0A` +
                        `*Nama:* ${name}%0A` +
                        `*Nomor WhatsApp:* ${phone}%0A` +
                        `*Tanggal:* ${date}%0A` +
                        `*Waktu:* ${time}%0A` +
                        `*Layanan:* ${service}`;

        // Nomor WhatsApp tujuan (ganti dengan nomor Anda)
        const phoneNumber = "<?php echo $whatsapp_phone; ?>";
        const url = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`;

        // Buka URL WhatsApp
        window.open(url, '_blank');
        return false; // Mencegah reload halaman
    }
</script>

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

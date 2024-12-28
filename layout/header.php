<nav class="navbar navbar-expand-lg navbar-dark sticky-top navbar-inverse">
    <div class="container">
        <!-- Navbar Brand -->
        <img src="asset/LOGO-BARU.png" height="50px" width="50px" data-aos="fade-down" data-aos-duration="1000">
      
        <a class="navbar-brand pl-2 mx-2" href="#">
        <?php
        // Tentukan kondisi untuk Navbar Brand
        if (isset($navbar_brand)) {
            // Jika $navbar_brand di-set, tampilkan custom brand
            echo $navbar_brand;
        } else {
            // Default brand
            echo 'Astha Delapan Windu';
        }
        ?>
        </a>

        <!-- Tombol Toggle untuk Navbar di Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar List -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php
                // Tentukan kondisi untuk Navbar List
                if (isset($navbar_list)) {
                    // Jika $navbar_list di-set, tampilkan custom list
                    echo $navbar_list;
                } else {
                    // Default navbar list dengan kondisi aktif
                    $current_page = basename($_SERVER['PHP_SELF']);  // Mendapatkan nama file PHP saat ini

                    echo '<li class="nav-item">
                            <a class="nav-link' . ($current_page == 'index.php' ? ' active' : '') . '" href="index.php">Beranda</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link' . ($current_page == 'blog.php' ? ' active' : '') . '" href="blog.php">Blog</a>
                          </li>';
                }
                ?>
                
                <!-- Tampilkan link login atau dashboard -->
                <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard Admin</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login Admin</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


document.querySelectorAll('.moving-images-wrapper').forEach((wrapper) => {
    // Menargetkan elemen-elemen di dalam wrapper
    const movingImages = wrapper.querySelector('.moving-images');
    const images = wrapper.querySelectorAll('.image-container');
    const gap = 20; // Jarak antar gambar

    // Hitung tinggi total semua gambar, termasuk jaraknya
    const totalHeight = Array.from(images).reduce((total, image) => total + image.offsetHeight + gap, 0);
    movingImages.style.height = `${totalHeight}px`; // Set tinggi total

    // Fungsi untuk mendeteksi gambar yang paling dekat dengan pusat layar secara vertikal
    function detectCenterImage() {
        const centerY = window.innerHeight / 1.5;
        let closestImage = null;
        let closestDistance = Infinity;

        // Menentukan gambar yang paling dekat dengan pusat layar
        images.forEach((image) => {
            const rect = image.getBoundingClientRect();
            const imageCenterY = rect.top + rect.height / 2;
            const distanceToCenter = Math.abs(centerY - imageCenterY);

            if (distanceToCenter < closestDistance) {
                closestDistance = distanceToCenter;
                closestImage = image;
            }
        });

        // Menambahkan kelas "active" ke gambar yang paling dekat dengan pusat layar
        images.forEach((image) => image.classList.remove('active'));
        if (closestImage) {
            closestImage.classList.add('active');
        }

        // Memanggil requestAnimationFrame untuk memperbarui deteksi pada frame berikutnya
        requestAnimationFrame(detectCenterImage);
    }

    // Mulai deteksi gambar dengan requestAnimationFrame
    detectCenterImage();
    
    // Animasi gambar bergerak secara bersamaan
    function moveImages() {
        movingImages.style.transform = `translateY(-${movingImages.offsetHeight / 2}px)`;
    }
    
    // Memanggil animasi untuk bergerak secara terus menerus
    // setInterval(moveImages, 1 * 100);  // Animasi berlangsung 90 detik
});

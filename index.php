<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Utii</title>
  <!-- Menghubungkan file CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- Menghubungkan file CSS khusus -->
<link rel="stylesheet" href="style.css">

<body>
  <header>
    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="mr-auto">
          <!-- Logo dan Nama Hotel -->
          <a class="navbar-brand" href="index.php">
            <img src="img\hotelL.png" alt="Logo" style="width: 50px; height: auto;">
            <span class="navbar-brand">Hotel Utii</span>
          </a>
        </div>
        <div class="mx-auto">
          <!-- Menu Navigasi -->
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Produk</a></li>
            <li class="nav-item"><a class="nav-link" href="daftar-harga.php">Daftar Harga</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link" href="list-booking.php">List Pemesanan</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <!-- Konten Utama -->
    <div class="container">
      <div class="row">
        <!-- Daftar Kamar -->
        <?php
        // Array data kamar dengan urutan berdasarkan jenis kamar
        $kamar = array(
          array("Kamar Deluxe", "D", "img/D1.png", "img/D2.jpg", "img/D3.png", "video/D.mp4"),
          array("Kamar Executive", "E", "img/E1.png", "img/E2.png", "img/E3.jpg", "video/E.mp4"),
          array("Kamar Standard", "S", "img/S1.png", "img/s2.jpg", "img/S3.png", "video/S.mp4")
        );

        // Menyortir array kamar berdasarkan jenis kamar
        usort ($kamar, function($a, $b) {
          return $a[0] <=> $b[0]; // Menggunakan spaceship operator untuk mengurutkan berdasarkan nama kamar
        });

        // Loop untuk menampilkan setiap kamar
        foreach ($kamar as $data) {
          echo '<div class="col-lg-4 col-md-6">';
          echo '<div class="room-type">';
          echo '<h3 class="text-center">' . $data[0] . '</h3>'; // Judul kamar
          echo '<div class="media-content">';

          // Menampilkan gambar dan video kamar
          for ($i = 2; $i < count($data); $i++) {
            if ($i == count($data) - 1) {
              echo '<video controls>';
              echo '<source src="' . $data[$i] . '" type="video/mp4">';
              echo '</video>';
            } else {
              echo '<img src="' . $data[$i] . '" alt="Kamar ' . $data[0] . ' ' . ($i - 1) . '">';
            }
          }
          echo '</div>';
          echo '<div class="text-center mt-3">';
          echo '<button class="btn btn-primary" onclick="redirectToBooking(\'' . $data[0] . '\')">Pesan ' . $data[0] . '</button>'; // Tombol pesan kamar
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </main>
  <!-- Menghubungkan file JavaScript Popper dan Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    // Fungsi untuk mengarahkan ke halaman booking
    function redirectToBooking(roomType) {
      window.location.href = `booking.php?type=${roomType}`;
    }
  </script>

  <footer class = "py-10 bg-dark">
    <div class = "container">
        <p class = "m-0 text-center text-white">Copyright &copy; SERKOM DAFZ
        </p>
    </div>

  </footer>
</body>

</html>

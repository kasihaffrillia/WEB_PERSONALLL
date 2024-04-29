<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Harga - Hotel Utii</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<link rel="stylesheet" href="style.css">

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img src="img\hotelL.png" alt="Logo Hotel" style="width: 50px; height: auto;">
        <a class="navbar-brand" href="index.php" style="margin-left: 5px;">Hotel Utii</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftar-harga.php">Daftar Harga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list-booking.php">List Pemesanan</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section id="harga">
      <div class="container">
        <h2 class="text-center mt-5" style="color: #7752fe; text-align: center;">Daftar Harga</h2>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col">Jenis Kamar</th>
                <th scope="col">Harga per Malam</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Kamar Standar</td>
                <td>Rp.250.000</td>
              </tr>
              <tr>
                <td>Kamar Deluxe</td>
                <td>Rp.600.000</td>
              </tr>
              <tr>
                <td>Kamar Executive</td>
                <td>Rp.1.300.000</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col">Makanan</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Breakfast</td>
                <td>Rp.80.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <footer class = "py-10 bg-dark">
    <div class = "container">
        <p class = "m-0 text-center text-white">Copyright &copy; SERKOM DAFZ
        </p>
    </div>
  </footer>
</body>

</html>
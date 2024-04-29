<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Harga - Hotel Utii</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<link rel="stylesheet" href="style.css">

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img src="img\hotelL.png" alt="Logo Hotel Pulau Kapuk" style="width: 50px; height: auto;">
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
    <section id="pesan-kamar" class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h2 class="text-center mb-4">Pesan Kamar</h2>
          <form id="booking-form" action="proses-pesan.php" method="POST" onsubmit="return saveData()">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Pemesan:</label>
              <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="jenis-kelamin" class="form-label">Jenis Kelamin:</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis-kelamin" id="laki-laki" value="Laki-laki" required>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis-kelamin" id="perempuan" value="Perempuan" required>
                <label class="form-check-label" for="perempuan">Perempuan</label>
              </div>
            </div>

            <div class="mb-3">
              <label for="nomor-identitas" class="form-label">Nomor Identitas:</label>
              <input type="text" id="nomor-identitas" name="nomor-identitas" class="form-control" required maxlength="16">
            </div>

            <div class="mb-3">
              <label for="tipe-kamar" class="form-label">Tipe Kamar:</label>
              <select id="tipe-kamar" name="tipe-kamar" class="form-select" required onchange="updateHarga()">
                <option value="" selected disabled>Pilih Tipe Kamar</option>
                <option value="Kamar Standar" data-harga="250000">Kamar Standar</option>
                <option value="Kamar Deluxe" data-harga="600000">Kamar Deluxe</option>
                <option value="Kamar Executive" data-harga="1300000">Kamar Executive</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="harga" class="form-label">Harga:</label>
              <input type="text" id="harga" name="harga" class="form-control" readonly>
            </div>

            <div class="mb-3">
              <label for="tanggal-pesan" class="form-label">Tanggal Pesan:</label>
              <input type="text" id="tanggal-pesan" name="tanggal-pesan" class="form-control" placeholder="dd/mm/yyyy" required>
            </div>

            <div class="mb-3">
              <label for="durasi-menginap" class="form-label">Durasi Menginap (hari):</label>
              <input type="text" id="durasi-menginap" name="durasi-menginap" class="form-control" required>
              <div id="durasi-menginap-error" class="text-danger"></div>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" id="breakfast" name="breakfast" class="form-check-input">
              <label for="breakfast" class="form-check-label">Pesan Breakfast? + Rp. 80.000/Hari</label>
            </div>

            <div class="mb-3">
              <label for="total-bayar" class="form-label">Total Bayar:</label>
              <input type="text" id="total-bayar" name="total-bayar" class="form-control" readonly>
            </div>

            <div class="text-center">
              <button type="button" class="btn btn-success" onclick="hitungTotal()">Hitung Total Harga</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-secondary" onclick="clearForm()">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script>
    $(function() {
      $("#tanggal-pesan").datepicker({
        dateFormat: 'dd/mm/yy',
        changeYear: true,
        changeMonth: true
      });
    });

    function updateHarga() {
      const selectElement = document.getElementById('tipe-kamar');
      const selectedOption = selectElement.options[selectElement.selectedIndex];
      const selectedPrice = selectedOption.getAttribute('data-harga');
      document.getElementById('harga').value = selectedPrice;
      hitungTotal();
    }

    function hitungTotal() {
      let nomorIdentitas = document.getElementById('nomor-identitas').value;
      let hargaKamar = parseFloat(document.getElementById('harga').value);
      let durasiMenginap = document.getElementById('durasi-menginap').value;
      let inputDate = document.getElementById('tanggal-pesan').value;

      if (isNaN(durasiMenginap)) {
        document.getElementById('durasi-menginap-error').innerText = "Harus diisi dengan angka";
        return;
      } else {
        document.getElementById('durasi-menginap-error').innerText = "";
      }

      let totalBayar = hargaKamar * durasiMenginap;
      if (durasiMenginap >= 3) {
        totalBayar *= 0.9;
      }
      if (document.getElementById('breakfast').checked) {
        totalBayar += durasiMenginap * 80000;
      }

      document.getElementById('total-bayar').value = totalBayar;
    }

    function clearForm() {
      document.getElementById('booking-form').reset();
    }

    function saveData() {
      let nomorIdentitas = document.getElementById('nomor-identitas').value;
      if (nomorIdentitas.length !== 16 || isNaN(nomorIdentitas)) {
        alert('Isian salah. Data Identitas Harus 16 digit angka.');
        return false;
      }
      alert('Pemesanan hotel berhasil. Terima kasih telah memesan!')
      return true;
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
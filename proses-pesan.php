<?php
include 'config.php';

$namaPemesan = $_POST['nama'];
$jenisKelamin = $_POST['jenis-kelamin'];
$nomorIdentitas = $_POST['nomor-identitas'];
$tipeKamar = $_POST['tipe-kamar'];
$tanggalPesan = $_POST['tanggal-pesan'];
$result = explode('/', $tanggalPesan);
$date = $result[0];
$month = $result[1];
$years = $result[2];
$new = $years . '-' . $month . '-' . $date;

$durasiMenginap = intval($_POST['durasi-menginap']);
$diskon = ($durasiMenginap >= 3) ? 10 : 0;

$totalBayar = $_POST['total-bayar'];

$sql = "INSERT INTO `history` (`nama`, `jk`, `nomor`, `tipe`, `tanggal`, `durasi`, `Diskon`, `total`) VALUES ('$namaPemesan', '$jenisKelamin', '$nomorIdentitas', '$tipeKamar', '$new', $durasiMenginap, $diskon, $totalBayar)";

if ($conn->query($sql) === TRUE) {
  header("Location: list-booking.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
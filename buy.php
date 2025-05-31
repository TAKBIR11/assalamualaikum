<?php
include 'config.php';
$id = $_POST['menu'];
$jumlah = $_POST['jumlah'];

$data = $conn->query("SELECT * FROM makanan WHERE id=$id")->fetch_assoc();
$total = $jumlah * $data['harga'];
$newStok = $data['stok'] - $jumlah;

if ($newStok >= 0) {
  $conn->query("UPDATE makanan SET stok=$newStok WHERE id=$id");
  echo "<h2>Terima kasih telah membeli!</h2>";
  echo "<p>Total harga: Rp$total</p>";
  echo "<img src='dummy_qr.png' alt='QR Code'>";
} else {
  echo "<p>Stok tidak mencukupi.</p>";
}
?>
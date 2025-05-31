<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pemesanan Makanan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Kantin Online</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#about">About Kantin</a></li>
        <li class="nav-item"><a class="nav-link" href="#cafeteria">Cafeteria List</a></li>
        <li class="nav-item"><a class="nav-link" href="#buy">How to Buy</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <section id="about">
    <h2>About Kantin</h2>
    <p>Kantin ini menyediakan berbagai macam makanan dan minuman untuk siswa dan guru.</p>
    <img src="kantin.jpg" class="img-fluid" alt="Kantin">
    <video controls class="mt-2 w-100">
      <source src="kantin.mp4" type="video/mp4">
    </video>
    <img src="logo.png" alt="Logo Kantin" class="mt-3" style="width:100px;">
  </section>

  <section id="cafeteria" class="mt-5">
    <h2>Cafeteria List</h2>
    <?php
    $kantins = $conn->query("SELECT * FROM makanan");
    while ($row = $kantins->fetch_assoc()) {
      echo "<div class='card mt-3'><div class='row g-0'><div class='col-md-4'>
        <img src='" . $row['foto'] . "' class='img-fluid rounded-start' alt='...'></div>
        <div class='col-md-8'><div class='card-body'>
        <h5 class='card-title'>" . $row['kantin'] . "</h5>
        <p class='card-text'>Menu: " . $row['menu'] . " - Rp" . $row['harga'] . "</p>
        <p class='card-text'>Stok: " . $row['stok'] . "</p>
        </div></div></div></div>";
    }
    ?>
  </section>

  <section id="buy" class="mt-5">
    <h2>How to Buy</h2>
    <form action="buy.php" method="post">
      <div class="mb-3">
        <label for="menu">Pilih Menu</label>
        <select name="menu" class="form-select">
          <?php
          $items = $conn->query("SELECT * FROM makanan WHERE stok > 0");
          while ($item = $items->fetch_assoc()) {
            echo "<option value='" . $item['id'] . "'>" . $item['menu'] . " - Rp" . $item['harga'] . "</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" min="1">
      </div>
      <button type="submit" class="btn btn-success">Beli</button>
    </form>
  </section>

  <section id="contact" class="mt-5">
    <h2>Contact Us</h2>
    <p>Email: info@kantin.com</p>
  </section>
</div>
</body>
</html>
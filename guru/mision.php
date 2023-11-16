<?php

include '../controller/function.php';

session_start();
sesiGuru();

$id = $_SESSION["id"];

$user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
$us = mysqli_fetch_assoc($user);

$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_user = $id");
$sis = mysqli_fetch_assoc($siswa);

$quest = mysqli_query($koneksi, "SELECT * FROM tb_quest 
                        INNER JOIN tb_kategori_quest ON tb_quest.id_kategori = tb_kategori_quest.id_kategori
                        WHERE tb_quest.id_kategori = 1");
$que = mysqli_fetch_assoc($quest);

$quest2 = mysqli_query($koneksi, "SELECT * FROM tb_quest 
                        INNER JOIN tb_kategori_quest ON tb_quest.id_kategori = tb_kategori_quest.id_kategori
                        WHERE tb_quest.id_kategori = 2");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mission</title>
  <link rel="stylesheet" href="../assets/css/mision.css" />
</head>

<body>
  <nav class="navbar">
    <div class="navbar-left">
      <img src="../assets/img/GC P.png" alt="" class="logo" />
      <a href="index.php">Home</a>
      <a href="leaderboard.php">Leaderboard</a>
      <a href="mision.php">Mission</a>
    </div>
    <div class="navbar-right">
      <p><?= $us["nama"] ?></p>
      <div class="dropdown">
        <div class="profile-container">
          <div class="profile-info">
          </div>
          <div class="profile-picture"></div>
        </div>
        <div class="dropdown-content">
          <p><?= $us["nama"] ?></p>
          <a href="#">Ganti Password</a>
          <a href="../controller/logout.php">Log Out</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="section">
    <h1><?= $que["nama_kategori"] ?> Mission</h1>
    <p><?= $que["nama_quest"] ?></p>
  </div>
  <div class="video-container">
    <iframe width="1280" height="720" src="https://www.youtube.com/embed/snRhl3ING0Y" frameborder="0" allowfullscreen></iframe>
    <a href="https://www.youtube.com/watch?v=snRhl3ING0Y&t=381s" target="_blank">
      Source: https://www.youtube.com/watch?v=snRhl3ING0Y&t=381s
    </a>
  </div>
  <div class="section2">
    <h4>MANFAAT BUANG SAMPAH</h4>
    <p>
      orem ipsum dolor sit amet consectetur. Sagittis tincidunt varius
      suspendisse nisl cursus ipsum diam ut. Fermentum pharetra vel erat diam
      fames quis bibendum. Risus felis nulla non odio pretium. Cursus senectus
      lacinia urna gravida. Lacus eu quam at viverra volutpat nisl porttitor.
      Viverra eu urna nullam id tellus eget non tincidunt. Quis nullam sit
      massa montes
    </p>
    <a href="mision.php" class="b">Go To Mission</a>
  </div>
  </div>
  <h1 class="sm">SUB MISSIONS</h1>
  <div class="section3">
    <?php foreach ($quest2 as $row) : ?>
    <div class="containerl">
      <H3><?= $row["nama_quest"] ?></H3>
      <p><?= $row["deskripsi"] ?></p>
    </div>
    <?php endforeach ?>
  </div>
</body>

</html>
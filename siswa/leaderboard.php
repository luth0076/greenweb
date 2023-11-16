<?php

include '../controller/function.php';

session_start();
sesiSiswa();

$id = $_SESSION["id"];

$user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
$us = mysqli_fetch_assoc($user);

$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa INNER JOIN tb_user
                                ON tb_siswa.id_user=tb_user.id_user
                                 ORDER BY poin DESC LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Leaderboard - Green Challenge</title>
  <link rel="stylesheet" href="../assets/css/leaderboard.css" />
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

  <main>
    <div class="card"></div>
    <div class="card-main">
      <div class="leaderboard-content">
        <h1>Leaderboard</h1>
        <div class="leaderboard-list">
          <?php $i = 1; ?>
          <?php foreach ($siswa as $row) : ?>
            <div class="leaderboard-item">
              <span class="rank"><?= $i ?></span>
              <span class="nis"><?= $row['nis'] ?></span>
              <span class="username"><?= $row["nama"] ?></span>
              <span class="score"><?= $row["poin"] ?></span>
            </div>
            <?php $i++ ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="card"></div>
  </main>

</body>

</html>
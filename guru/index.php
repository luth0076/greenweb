<?php

include '../controller/function.php';

session_start();
sesiGuru();

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
  <title>Green Challenge</title>
  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="../assets/css/responsive.css" />
  <link rel="stylesheet" href="../assets/css/animate.css" />
</head>

<body>

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
    <div class="main-content">
      <div class="container">
        <h1>Green Challenge</h1>
        <p>Let's build a green life.</p>
        <a href="mision.php" class="join-now">Start</a>
      </div>
      <div class="container2">
        <img src="../assets/img/2.svg" alt="content" />
      </div>
    </div>
    <div class="section1 animate">
      <img src="../assets/img/4.svg" alt="" />
      <div class="container">
        <h3>Lorem ipsum dolor sit amet.</h3>
        <p>
          orem ipsum dolor sit amet consectetur. Sagittis tincidunt varius
          suspendisse nisl cursus ipsum diam ut. Fermentum pharetra vel erat
          diam fames quis bibendum. Risus felis nulla non odio pretium. Cursus
          senectus lacinia urna gravida. Lacus eu quam at viverra volutpat nisl
          porttitor. Viverra eu urna nullam id tellus eget non tincidunt. Quis
          nullam sit massa montes
        </p>
      </div>
    </div>
    <div class="section2 animate">
      <div class="container">
        <h3>Lorem ipsum dolor sit amet.</h3>
        <p>
          orem ipsum dolor sit amet consectetur. Sagittis tincidunt varius
          suspendisse nisl cursus ipsum diam ut. Fermentum pharetra vel erat
          diam fames quis bibendum. Risus felis nulla non odio pretium. Cursus
          senectus lacinia urna gravida. Lacus eu quam at viverra volutpat nisl
          porttitor. Viverra eu urna nullam id tellus eget non tincidunt. Quis
          nullam sit massa montes
        </p>
      </div>
      <img src="../assets/img/1.svg" />
    </div>
    <div class="section3 animate">
      <img src="../assets/img/3.svg">
      <div class="cons">
        <h3>Lorem ipsum dolor sit amet.</h3>
        <p>
          orem ipsum dolor sit amet consectetur. Sagittis tincidunt varius
          suspendisse nisl cursus ipsum diam ut. Fermentum pharetra vel erat
          diam fames quis bibendum. Risus felis nulla non odio pretium. Cursus
          senectus lacinia urna gravida. Lacus eu quam at viverra volutpat nisl
          porttitor. Viverra eu urna nullam id tellus eget non tincidunt. Quis
          nullam sit massa montes
        </p>
      </div>
    </div>
    <div class="section4 animate">
      <div class="container">
        <h1>FINISH THE MISSION</h1>
        <a href="mision.php" class="b">Go To Mission</a>
      </div>
    </div>
  </body>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var sections = document.querySelectorAll(
        ".section1, .section2, .section3, .section4"
      );

      function checkVisibility() {
        sections.forEach(function(section) {
          var bounding = section.getBoundingClientRect();
          if (bounding.top >= 0 && bounding.bottom <= window.innerHeight) {
            section.classList.add("animate");
          }
        });
      }

      window.addEventListener("scroll", checkVisibility);
      window.addEventListener("resize", checkVisibility);
      checkVisibility(); // Initial check
    });
  </script>

</html>
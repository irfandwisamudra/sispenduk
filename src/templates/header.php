<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Website Desa Tebing Tinggi Kuantan Singingi">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $title; ?></title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="./src/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="./src/plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="./src/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="./src/plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="./src/css/style.css">

</head>

<body id="top">

  <header>
    <div class="header-top-bar">
      <div class="container">
        <span class="font-weight-bold mx-auto d-block text-center">DESA SUKOLILO TIMUR</span>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="./src/images/logo.png" alt="" class="img-fluid" width="50px">
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icofont-navigation-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarmain">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil<i class="icofont-thin-down"></i></a>
              <ul class="dropdown-menu" aria-labelledby="dropdown01">
                <li><a class="dropdown-item" href="sejarah-desa.php">Sejarah Desa</a></li>
                <li><a class="dropdown-item" href="visi-misi.php">Visi Misi</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kondisi Desa<i class="icofont-thin-down"></i></a>
              <ul class="dropdown-menu" aria-labelledby="dropdown02">
                <li><a class="dropdown-item" href="demografi.php">Demografi</a></li>
                <li><a class="dropdown-item" href="keadaan-sosial.php">Keadaan Sosial</a></li>
                <li><a class="dropdown-item" href="keadaan-ekonomi.php">Keadaan Ekonomi</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kondisi Pemerintahan<i class="icofont-thin-down"></i></a>
              <ul class="dropdown-menu" aria-labelledby="dropdown03">
                <li><a class="dropdown-item" href="lembaga-pemerintahan.php">Lembaga Pemerintahan</a></li>
                <li><a class="dropdown-item" href="lembaga-kemasyarakatan.php">Lembaga Kemasyarakatan</a></li>
                <li><a class="dropdown-item" href="pembagian-wilayah.php">Pembagian Wilayah</a></li>
                <li><a class="dropdown-item" href="struktur-organisasi.php">Struktur Organisai</a></li>
              </ul>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="masalah-potensi.php">Masalah dan Potensi</a>
            </li>

            <li class="nav-item active ml-3">
              <a href="./login.php" class="btn btn-main-2 btn-icon btn-round-full">Login</i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
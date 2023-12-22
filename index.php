<?php
$title = "Desa Sukolilo Timur";

include "./inc/koneksi.php";

$sql = $koneksi->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
while ($data = $sql->fetch_assoc()) {
	$kartu = $data['kartu'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as laki  from tb_pdd where jekel='LK' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$laki = $data['laki'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as prem  from tb_pdd where jekel='PR' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$prem = $data['prem'];
}

include "./src/templates/header.php";
?>

<!-- Slider Start -->
<section class="banner-img">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Selamat Datang Di</span>
					<h1 class="mb-3 mt-3">DESA SUKOLILO TIMUR</h1>

					<p class="mb-4 pr-5">Kecamatan Labang, Kabupaten Bangkalan, Provinsi Jawa Timur</p>
					<div class="btn-container ">
						<a href="./login.php" class="btn btn-main-2 btn-icon btn-round-full">Login<i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cta-section my-5">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">6</span>
						<p>Dusun</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3"><?= $kartu; ?></span>
						<p>KK</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3"><?= $laki; ?></span>
						<p>Laki-Laki</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3"><?= $prem; ?></span>
						<p>Perempuan</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 col-sm-6">
				<div class="about-img">
					<img src="./src/images/1.jpeg" alt="" class="img-fluid">
					<img src="./src/images/2.jpeg" alt="" class="img-fluid mt-4">
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="about-img mt-4 mt-lg-0">
					<img src="./src/images/3.jpeg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color">Acara Panen Raya 2020</h2>
					<p class="mt-4 mb-5">Dihadiri oleh Kepala Desa Sukolilo Timur dan Bupati Kabupaten Bangkalan disambut dengan baik oleh masyarakat Desa Sukolilo Timur, termasuk para petani.</p>

				</div>
			</div>
		</div>
	</div>
</section>

<?php include "./src/templates/footer.php"; ?>
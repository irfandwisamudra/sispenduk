<?php
$title = "Demografi - Desa Sukolilo Timur";

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

<!-- START -->

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <h1 class="text-capitalize mb-5 text-lg">DEMOGRAFI</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section department-single">
    <div class="container">

        <div class="row">
            <div class="col-lg-10">
                <div class="department-content mt-5">

                    <h3 class="text-md">Batas Wilayah Desa</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                        Letak geografi Desa Sukolilo Timur, terletak diantara : <br><br>
                        Sebelah Utara : Jalur Patah Kecamatan Sentajo Raya <br>
                        Sebelah selatan : Kelurahan Benai <br>
                        Sebelah Barat : Desa Benai Kecil <br>
                        Sebelah Timur : Desa Pulau Lancang / Desa Simandolak <br><br>
                    </p>

                    <h3 class="text-md">Luas Wilayah Desa</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                        Pemukiman : 35 ha <br>
                        Pertanian Sawah : 50 ha <br>
                        Belukar : 14 ha <br>
                        Rawa-rawa : 26 ha <br>
                        Perkantoran : 0,25 ha <br>
                        Sekolah : 4 ha <br>
                        Jalan : 29 Km <br>
                        Lapangan sepak bola : 2 ha <br><br>
                    </p>


                    <h3 class="text-md">Orbitrasi</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                        Jarak ke ibu kota Kecamatan terdekat : 0,5 Km <br>
                        Lama jarak tempuh ke ibu kota Kecamatan : 5 Menit <br>
                        Jarak ke ibu kota Kabupetan : 15 KM <br>
                        Lama jarak tempuh ke ibu kota Kabupaten : 20 Menit <br><br>
                    </p>

                    <h3 class="text-md">Jumlah Penduduk Berdasarkan Jenis Kelamin</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                        Kepala Keluarga : <?= $kartu; ?> KK <br>
                        Laki-laki : <?= $laki; ?> Orang <br>
                        Perempuan : <?= $prem; ?> Orang <br><br>
                    </p>


                </div>
            </div>


        </div>
    </div>
</section>


<!-- END -->

<?php include "./src/templates/footer.php"; ?>
<?php
$title = "Keadaan Sosial - Desa Sukolilo Timur";

include "./inc/koneksi.php";

$sql = $koneksi->query("SELECT COUNT(id_pend) as islam  from tb_pdd where agama='islam' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$islam = $data['islam'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as katolik  from tb_pdd where agama='katolik' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$katolik = $data['katolik'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as kristen  from tb_pdd where agama='kristen' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$kristen = $data['kristen'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as hindu  from tb_pdd where agama='hindu' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$hindu = $data['hindu'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as buddha  from tb_pdd where agama='buddha' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$buddha = $data['buddha'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as kong_hu_cu  from tb_pdd where agama='kong hu cu' and `status`='ada'");
while ($data = $sql->fetch_assoc()) {
	$kong_hu_cu = $data['kong_hu_cu'];
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
                    <h1 class="text-capitalize mb-5 text-lg">KEADAAN SOSIAL</h1>
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

                    <h3 class="text-md">Pendidikan</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                        SD/ MI : 386 Orang <br>
                        SLTP/ MTs : 395 Orang <br>
                        SLTA/ MA : 611 Orang <br>
                        S1/ Diploma : 125 Orang <br>
                        Putus Sekolah : 78 Orang <br>
                        Buta Huruf : 38 Orang <br><br>
                    </p>

                    <h3 class="text-md">Lembaga Pendidikan</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                        K/PAUD : 3 Buah <br>
                        SD/MI : 3 Buah <br>
                        MTS : 2 Buah <br>
                        SMA : 2 Buah <br><br>
                    </p>

                    <h3 class="text-md">Kesehatan</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                    <ol>
                        <li>Kematian Bayi</li>
                        <ul>
                            <li>Jumlah Bayi lahir pada tahun ini : 1 orang</li>
                            <li>Jumlah Bayi meninggal tahun ini : 0 orang</li>
                        </ul>

                        <li>Kematian Ibu Melahirkan</li>
                        <ul>
                            <li>Jumlah ibu melahirkan tahun ini : </li>
                            <li>Jumlah ibu melahirkan meninggal tahun ini : 0 orang</li>
                        </ul>

                        <li>Cakupan Imunisasi </li>
                        <ul>
                            <li>Cakupan Imunisasi Polio 3 : 29 orang</li>
                            <li>Cakupan Imunisasi DPT-1 : 29 orang </li>
                            <li>Cakupan Imunisasi Cacar : 0 orang</li>
                        </ul>

                        <li>Gizi Balita </li>
                        <ul>
                            <li>Jumlah Balita : 142 orang</li>
                            <li>Balita gizi buruk : 0 orang</li>
                            <li>Balita gizi baik : 141 orang</li>
                            <li>Balita gizi kurang : 1 orang</li>

                        </ul>

                        <li>Pemenuhan air bersih</li>
                        <ul>
                            <li>Pengguna sumur galian : 390 KK</li>
                            <li>Pengguna air PAH : 30 KK </li>
                            <li>Pengguna sumur pompa : - KK </li>
                            <li>Pengguna sumur hidran umum : 48 KK </li>
                            <li>Pengguna air sungai : 13 KK</li>
                        </ul>
                    </ol>
                    </p>

                    <h3 class="text-md">Keagamaan</h3>
                    <div class="divider my-4"></div>
                    <p class="lead">
                        <span class="strong-text">Jumlah Pemeluk : </span> <br>
                        Islam : <?= $islam; ?> orang <br>
                        Katolik : <?= $katolik; ?> orang <br>
                        Kristen : <?= $kristen; ?> orang <br>
                        Hindu : <?= $hindu; ?> orang <br>
                        Buddha : <?= $buddha; ?> orang <br>
                        Kong Hu Cu : <?= $kong_hu_cu; ?> orang <br><br>

                        <span class="strong-text">Jumlah tempat ibadah :</span><br>
                        Masjid / Musholla : 8 buah <br>
                        Gereja : 2 buah <br>
                        Pura : 1 buah <br>
                        Vihara : 1 buah <br> <br>
                    </p>


                </div>
            </div>


        </div>
    </div>
</section>

<!-- END -->

<?php include "./src/templates/footer.php"; ?>
<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['lahir'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
	<center>

		<h2>PEMERINTAH KABUPATEN BANGKALAN</h2>
		<h3>KECAMATAN LABANG
			<br>DESA SUKOLILO TIMUR</h3>
		<p>________________________________________________________________________</p>

		<?php
			$sql_tampil = "select * from tb_lahir where id_lahir='$id'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETERANGAN KELAHIRAN</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_lahir']; ?>/Ket.Kelahiran/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Kepala Desa Sukolilo Timur, Kecamatan Labang, Kabupaten Bangkalan, dengan ini menerangkan
		bahwa :</P>
	<table>
		<tbody>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo $data['jekel']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td>
					<?php echo $data['tgl_lh']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Telah benar-benar Lahir di Desa Sukolilo Timur, Kecamatan Labang, Kabupuaten Bangkalan</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right">
		Bangkalan,
		<?php echo $tgl; ?>
		<br> KEPALA DESA SUKOLILO TIMUR
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(         WISNU ARDI           )
	</p>


	<script>
		window.print();
	</script>

</body>

</html>
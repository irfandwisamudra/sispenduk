<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_pdd WHERE id_pend='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_pend" name="id_pend" value="<?php echo $data_cek['id_pend']; ?>" readonly />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>" />
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['jekel'] == "LK") echo "<option value='LK' selected>LK</option>";
						else echo "<option value='LK'>LK</option>";

						if ($data_cek['jekel'] == "PR") echo "<option value='PR' selected>PR</option>";
						else echo "<option value='PR'>PR</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Desa</label>
				<div class="col-sm-6">
					<select name="desa" id="desa" class="form-control">
						<option value="">- Pilih -</option>
						<option value="Desa1" <?php if ($data_cek['desa'] == "Paserean") echo "selected"; ?>>Paserean</option>
						<option value="Desa2" <?php if ($data_cek['desa'] == "Buddan") echo "selected"; ?>>Buddan</option>
						<option value="Desa3" <?php if ($data_cek['desa'] == "Kejawan") echo "selected"; ?>>Kejawan</option>
						<option value="Desa4" <?php if ($data_cek['desa'] == "Morleke") echo "selected"; ?>>Morleke</option>
						<option value="Desa5" <?php if ($data_cek['desa'] == "Pongbaru") echo "selected"; ?>>Pongbaru</option>
						<option value="Desa6" <?php if ($data_cek['desa'] == "Kampung Langgar") echo "selected"; ?>>Kampung Langgar</option>
					</select>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>" />
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="agama" name="agama" value="<?php echo $data_cek['agama']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option value="">-- Pilih Status --</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['kawin'] == "Sudah") echo "<option value='Sudah' selected>Sudah</option>";
						else echo "<option value='Sudah'>Sudah</option>";

						if ($data_cek['kawin'] == "Belum") echo "<option value='Belum' selected>Belum</option>";
						else echo "<option value='Belum'>Belum</option>";

						if ($data_cek['kawin'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
						else echo "<option value='Cerai Mati'>Cerai Mati</option>";

						if ($data_cek['kawin'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
						else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<select name="pekerjaan" id="pekerjaan" class="form-control">
						<option value="">- Pilih -</option>
						<option value="Pegawai Negeri Sipil" <?php if ($data_cek['pekerjaan'] == "Pegawai Negeri Sipil") echo "selected"; ?>>Pegawai Negeri Sipil</option>
						<option value="Swasta" <?php if ($data_cek['pekerjaan'] == "Swasta") echo "selected"; ?>>Swasta</option>
						<option value="Wiraswasta" <?php if ($data_cek['pekerjaan'] == "Wiraswasta") echo "selected"; ?>>Wiraswasta</option>
						<option value="Petani" <?php if ($data_cek['pekerjaan'] == "Petani") echo "selected"; ?>>Petani</option>
						<option value="Guru" <?php if ($data_cek['pekerjaan'] == "Guru") echo "selected"; ?>>Guru</option>
						<option value="Dokter" <?php if ($data_cek['pekerjaan'] == "Dokter") echo "selected"; ?>>Dokter</option>
						<option value="Mahasiswa" <?php if ($data_cek['pekerjaan'] == "Mahasiswa") echo "selected"; ?>>Mahasiswa</option>
						<option value="Pelajar" <?php if ($data_cek['pekerjaan'] == "Pelajar") echo "selected"; ?>>Pelajar</option>
						<option value="Pensiunan" <?php if ($data_cek['pekerjaan'] == "Pensiunan") echo "selected"; ?>>Pensiunan</option>
						<option value="Pegawai Swasta" <?php if ($data_cek['pekerjaan'] == "Pegawai Swasta") echo "selected"; ?>>Pegawai Swasta</option>
						<option value="Lainnya" <?php if ($data_cek['pekerjaan'] == "Lainnya") echo "selected"; ?>>Lainnya</option>
					</select>
				</div>
			</div>


		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_pdd SET 
		nik='" . $_POST['nik'] . "',
		nama='" . $_POST['nama'] . "',
		tempat_lh='" . $_POST['tempat_lh'] . "',
		tgl_lh='" . $_POST['tgl_lh'] . "',
		jekel='" . $_POST['jekel'] . "',
		desa='" . $_POST['desa'] . "',
		rt='" . $_POST['rt'] . "',
		rw='" . $_POST['rw'] . "',
		agama='" . $_POST['agama'] . "',
		kawin='" . $_POST['kawin'] . "',
		pekerjaan='" . $_POST['pekerjaan'] . "'
		WHERE id_pend='" . $_POST['id_pend'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
	}
}

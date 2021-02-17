<?php $this->load->view('layout/header')?>

<?php
	$kalimat = $karyawan->keahlian;
	if ($this->session->flashdata('failed')) {
		?>
			<p class="danger"><?= $this->session->flashdata('failed')?></p>
		<?php
	}

	echo $kalimat;
?>

<div class="content">
	<a href="<?= site_url('karyawan')?>"><button class="info">< Kembali</button></a>
	<form action="<?= site_url('karyawan/update')?>" method="post">
		<table>
			<tr>
				<td>NIK</td>
				<td><input type="text" name="nik" value="<?= $karyawan->nik?>" readonly></td>
			</tr>

			<tr>
				<td>Nama Karyawan</td>
				<td><input type="text" name="nama" value="<?= $karyawan->nama?>"></td>
			</tr>

			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat"><?= $karyawan->alamat?></textarea></td>
			</tr>

			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?= $karyawan->email?>"></td>
			</tr>

			<tr>
				<td>Tempat Lahir</td>
				<td><input type="text" name="tempat_lahir" value="<?= $karyawan->tempat_lahir?>"></td>
			</tr>
			
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="date" name="tgl_lahir" value="<?= $karyawan->tgl_lahir?>"></td>
			</tr>

			<tr>
				<td>Gender</td>
				<td>
					<select name="gender">
						<option value="L" <?php if ($karyawan->gender == "L") : echo "selected"; endif ?>>L</option>
						<option value="P" <?php if ($karyawan->gender == "P") : echo "selected"; endif ?>>P</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>Keahlian</td>
				<td>
					<input type="checkbox" name="keahlian[]" value="PHP"
					<?php
						if(preg_match("/PHP/i", $kalimat)) {
							echo 'checked';
						  }
					?>
					> PHP
					<input type="checkbox" name="keahlian[]" value="Javascript"
					<?php
						if(preg_match("/Javascript/i", $kalimat)) {
							echo 'checked';
						  }
					?>
					> Javascript
					<input type="checkbox" name="keahlian[]" value="Rest API"
					<?php
						if(preg_match("/Rest API/i", $kalimat)) {
							echo 'checked';
						  }
					?>
					> Rest API
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<input type="checkbox" name="keahlian[]" value="SQL"
					<?php
						if(preg_match("/SQL/i", $kalimat)) {
							echo 'checked';
						  }
					?>
					> SQL
					<input type="checkbox" name="keahlian[]" value="Java"
					<?php
						if(preg_match("/Java/i", $kalimat)) {
							echo 'checked';
						  }
					?>
					> Java
					<input type="checkbox" name="keahlian[]" value="React Native"
					<?php
						if(preg_match("/React Native/i", $kalimat)) {
							echo 'checked';
						  }
					?>
					> React Native
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<button type="submit" class="success">Submit</button>
					<button type="reset" class="danger">Reset</button>
				</td>
			</tr>
		</table>
	</form>
</div>


<?php $this->load->view('layout/footer')?>

<?php $this->load->view('layout/header')?>

<?php
	if ($this->session->flashdata('failed')) {
		?>
			<p class="danger"><?= $this->session->flashdata('failed')?></p>
		<?php
	}
?>

<div class="content">
	<a href="<?= site_url('karyawan')?>"><button class="info">< Kembali</button></a>
	<form action="<?= site_url('karyawan/save')?>" method="post">
		<table>
			<tr>
				<td>NIK</td>
				<td><input type="text" name="nik" value="<?= $kodeNik?>" readonly></td>
			</tr>

			<tr>
				<td>Nama Karyawan</td>
				<td><input type="text" name="nama"></td>
			</tr>

			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat"></textarea></td>
			</tr>

			<tr>
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>

			<tr>
				<td>Tempat Lahir</td>
				<td><input type="text" name="tempat_lahir"></td>
			</tr>
			
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="date" name="tgl_lahir"></td>
			</tr>

			<tr>
				<td>Gender</td>
				<td>
					<select name="gender">
						<option value="L">L</option>
						<option value="P">P</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>Keahlian</td>
				<td>
					<input type="checkbox" name="keahlian[]" value="PHP"> PHP
					<input type="checkbox" name="keahlian[]" value="Javascript"> Javascript
					<input type="checkbox" name="keahlian[]" value="Rest API"> Rest API
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<input type="checkbox" name="keahlian[]" value="SQL"> SQL
					<input type="checkbox" name="keahlian[]" value="Java"> Java
					<input type="checkbox" name="keahlian[]" value="React Native"> React Native
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

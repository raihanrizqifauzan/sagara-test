<?php $this->load->view('layout/header')?>
<?php
	if ($this->session->flashdata('success')) {
		?>
			<p class="success"><?= $this->session->flashdata('success')?></p>
		<?php
	}

	if ($this->session->flashdata('failed')) {
		?>
			<p class="danger"><?= $this->session->flashdata('failed')?></p>
		<?php
	}
?>
	<div class="content">
		<a href="<?= site_url('karyawan/add')?>"><button class="success">Tambah</button></a>
		<table border="1" class="list">
			<tr>
				<th>NIK</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Gender</th>
				<th>Keahlian</th>
				<th>Action</th>
			</tr>
			
			<?php

				foreach ($karyawan as $row) {
					?>
					<tr>
						<td><?= $row->nik?></td>
						<td><?= $row->nama?></td>
						<td><?= $row->alamat?></td>
						<td><?= $row->email?></td>
						<td><?= $row->tempat_lahir?></td>
						<td><?= $row->tgl_lahir?></td>
						<td><?= $row->gender?></td>
						<td><?= $row->keahlian?></td>
						<td>
							<a href="<?= site_url('karyawan/edit/'.$row->nik)?>"><button class="info">Edit</button></a>
							<a onclick="return confirm('Data akan dihapus ?')" href="<?= site_url('karyawan/delete/'.$row->nik)?>"><button class="danger">Hapus</button></a>
						</td>
					</tr>
					<?php
				}
			?>
		</table>
	</div>

<?php $this->load->view('layout/footer')?>

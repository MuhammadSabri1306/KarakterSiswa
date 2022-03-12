<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 1;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Data Siswa</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<div class="d-flex justify-content-center">
					<div>
						<h2 class="mb-0"><?=$siswa['nama_siswa']?></h2>
						<small class="d-block font-weight-bold mb-4">(NIS) <?=$siswa['nis']?></small>
						<table id="table-siswa" class="table style-3 table-hover">
							<tr>
								<td>Username</td>
								<td><?=$siswa['username']?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?=($siswa['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan')?></td>
							</tr>
							<tr>
								<td>Usia</td>
								<td><?=$siswa['usia']?></td>
							</tr>
							<tr>
								<td>Nama Orang Tua/Wali</td>
								<td><?=$siswa['nama_orgtua']?></td>
							</tr>
							<tr>
								<td>No. Telepon/Whatsapp Orang Tua/Wali</td>
								<td><?=$siswa['telp_orgtua']?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php

$template->footer(TEMPLATE_SECTION_OPEN);

?><script type="text/javascript">	
function confirmDelete(){
    return confirm("Semua data latih akan dihapus. Lanjutkan?");
}
</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
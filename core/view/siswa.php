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
			<div id="inputCollapseAccordion" class="container-fluid mb-5">
				<div id="inputCollapseButton" class="collapse show" data-parent="#inputCollapseAccordion">
					<button type="button" class="btn btn-lg btn-block btn-outline-primary" data-toggle="collapse" data-target="#inputCollapseForm" aria-expanded="false" aria-controls="inputCollapseForm">Tambah Data Siswa</button>
				</div>
				<div id="inputCollapseForm" class="collapse" data-parent="#inputCollapseAccordion"><div class="border border-dark rounded p-4">
					<form method="post" action="<?=BASEDOMAIN?>/siswa/add">
						<div class="form-row mb-4">
							<div class="col">
								<input type="text" class="form-control"  name="nama" id="nama" placeholder="Nama" value="<?=isset($dataFromFormUsers['nama']) ? $dataFromFormUsers['nama'] : ''?>">
								<p class="text-danger" id="error-nama"></p>
							</div>
						</div>
						<div class="form-row mb-4">
							<div class="col">
								<input type="text" class="form-control"  name="nis" id="nis" placeholder="NIS">
								<p class="text-danger" id="error-nis"></p>
							</div>
						</div>
						<div class="form-row mb-4">
							<div class="col">
								<input type="text" class="form-control"  name="user_name" id="user_name" placeholder="Username" value="<?=isset($dataFromFormUsers['username']) ? $dataFromFormUsers['username'] : ''?>">
								<p class="text-danger" id="error-user_name"></p>
							</div>
						</div>
						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<label class="input-group-text">Jenis Kelamin</label>
							</div>
							<div class="d-flex align-items-stretch">
								<div class="form-check form-check-inline ml-3">
									<input name="jenis_kelamin" type="radio" value="L" class="form-check-input" required="">
									<label class="form-check-label">Laki-laki</label>
								</div>
								<div class="form-check form-check-inline">
									<input name="jenis_kelamin" type="radio" value="P" class="form-check-input" required="">
									<label class="form-check-label">Perempuan</label>
								</div>
							</div>
						</div>
						<div class="form-row mb-4">
							<div class="col">
								<input type="number" class="form-control"  name="usia" id="usia" placeholder="Umur">
								<p class="text-danger" id="error-usia"></p>
							</div>
						</div>
						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<label class="input-group-text">Sekolah</label>
							</div>
							<div class="d-flex align-items-stretch">
								<div class="form-check form-check-inline ml-3">
									<input name="sekolah" type="radio" value="Negeri" class="form-check-input" required="" checked>
									<label class="form-check-label">Negeri</label>
								</div>
								<div class="form-check form-check-inline">
									<input name="sekolah" type="radio" value="Swasta" class="form-check-input" required="" disabled>
									<label class="form-check-label">Swasta</label>
								</div>
							</div>
						</div>
						<div class="form-row mb-4">
							<div class="col">
								<input type="text" class="form-control"  name="nama_orgtua" id="nama_orgtua" placeholder="Nama Orang Tua/Wali">
								<p class="text-danger" id="error-nama_orgtua"></p>
							</div>
						</div>
						<div class="form-row mb-4">
							<div class="col">
								<input type="telp" class="form-control"  name="telp_orgtua" id="nama_orgtua" placeholder="No. Telepon/Whatsapp Orang Tua/Wali">
								<p class="text-danger" id="error-telp_orgtua"></p>
							</div>
						</div>
						<div class="flex justify-content-center px-5">
							<button type="reset" class="btn btn-secondary mr-3" data-toggle="collapse" data-target="#inputCollapseButton" aria-expanded="true" aria-controls="inputCollapseButton">Cancel</button>
							<button type="submit" name="add" class="btn btn-success">Save</button>
						</div>
					</form>
				</div></div>
			</div>
			<span>Jumlah data: <?=$jumlah?></span><br><?php

if($jumlah > 0){

			?><table id="table-siswa" class="table style-3 table-hover">
				<thead>
					<tr><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Usia</th><th>Sekolah</th><th>Username</th><th>Orang Tua/Wali</th><th></th></tr>
				</thead>
				<tbody><?php
	$no = 0;
	foreach($siswa as $s){
		$no++;

					?><tr>
						<td><?=$no?></td>
						<td><?=$s['nama_siswa']?></td>
						<td><?=$s['jenis_kelamin']?></td>
						<td><?=$s['usia']?></td>
						<td><?=$s['sekolah']?></td>
						<td><?=$s['username']?></td>
						<td><a href="https://wa.me/<?=$s['telp_orgtua']?>" class="btn btn-block btn-sm btn-success font-weight-bold" target="_blank"><i class="fab fa-whatsapp fa-2x"></i> <?=$s['nama_orgtua']?></a></td>
						<td><a class="btn btn-block btn-sm btn-info font-weight-bold" href="<?=BASEDOMAIN?>/siswa/details/<?=$s['id_user']?>"><i class="fas fa-search-plus fa-2x"></i> Detail</a></td>
					</tr><?php

	}

				?></tbody>
			</table><?php

}else{

			?><h3 class="text-center">Data masih kosong..</h3><?php

}

		?></div>
	</div>
</div><?php

$template->footer(TEMPLATE_SECTION_OPEN);

if(isset($dataFromFormUsers) && !is_null($dataFromFormUsers)){

?><script type="text/javascript">
	$('#inputCollapseForm').collapse('show');
</script><?php

}

$template->footer(TEMPLATE_SECTION_CLOSE);
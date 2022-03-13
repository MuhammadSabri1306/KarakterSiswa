<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 6;
$template->header(TEMPLATE_SECTION_OPEN);

?><style type="text/css">
	
.text-nowrap { white-space: nowrap; }

</style><?php

$template->header(TEMPLATE_SECTION_CLOSE);

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex mb-4">
				<h4 class="page-head-line">Data Pengguna</h4>
			</div>
		</div>
	</div>
	<!-- START MODAL TAMBAH USER -->
	<div class="m-4">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Tambahkan Pengguna</button>
		<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"><div class="modal-content border-primary">
				<div class="modal-header border-primary">
					<h5 class="modal-title" id="addUserModalLabel">Form Tambah Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body py-5"><form method="post" action="<?=BASEDOMAIN?>/users/add" onreset="closeAddModal()">
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<label class="input-group-text">Jenis User</label>
						</div>
						<div class="d-flex align-items-stretch">
							<div class="form-check form-check-inline ml-3">
								<input name="jenis" type="radio" value="<?=USER_LEVEL_GURU?>" class="form-check-input" checked>
								<label class="form-check-label">Guru</label>
							</div>
							<div class="form-check form-check-inline">
								<input name="jenis" type="radio" value="<?=USER_LEVEL_SISWA?>" class="form-check-input">
								<label class="form-check-label">Siswa</label>
							</div>
						</div>
					</div>
					<div class="form-row my-4">
						<div class="col">
							<label>Nama</label>
							<input type="text" class="form-control"  name="nama" id="nama" required>
							<p class="text-danger" id="error-nama"></p>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>Username</label>
							<input type="text" class="form-control"  name="user_name" id="user_name" required>
							<p class="text-danger" id="error-user_name"></p>
						</div>
					</div>
					<div class="form-row mb-5">
						<div class="col">
							<label>Password</label>
							<span class="form-control">DEFAULT <i>(Username)</i></span>
						</div>
					</div>
					<div class="d-flex justify-content-center px-5">
						<button type="reset" class="btn btn-secondary mr-3">Batal</button>
						<button type="submit" name="add" class="btn btn-primary">Tambah</button>
					</div>
				</form></div>
			</div></div>
		</div>
	</div>
	<!-- END MODAL TAMBAH USER -->
	<div class="row">
		<div class="col-lg-6">
			<div class="border rounded p-4 mb-5">
				<h5 class="mb-4">Admin</h5>
				<div class="d-flex mx-4"><div>
					<p class="lead">Nama: <b><?=$dataAdmin['nama']?></b></p>
					<p>Username: <b><?=$dataAdmin['username']?></b></p>
					<a class="btn btn-block btn-sm btn-info font-weight-bold" href="<?=BASEDOMAIN?>/users/details/<?=$dataAdmin['id']?>"><i class="fas fa-search-plus fa-2x"></i> Detail</a>
				</div></div>
			</div>
			<div class="border rounded p-4">
				<h5 class="mb-4">Guru</h5>
				<p class="mx-4 mb-3">Jumlah pengguna: <?=$jmlGuru?></p><?php

if($jmlGuru > 0){

				?><div class=" mx-4"><table class="table style-3 table-hover">
					<thead>
						<tr><th>No</th><th>Nama</th><th>Username</th><th></th></tr>
					</thead>
					<tbody><?php
	$no = 0;
	foreach($dataGuru as $guru){
		$no++;

						?><tr>
							<td><?=$no?></td>
							<td><?=$guru['nama']?></td>
							<td><?=$guru['username']?></td>
							<td><a class="btn btn-block btn-sm btn-info font-weight-bold text-nowrap" href="<?=BASEDOMAIN?>/users/details/<?=$guru['id']?>"><i class="fas fa-search-plus fa-2x"></i> Detail</a></td>
						</tr><?php

	}

					?></tbody>
				</table></div><?php

}else{

				?><h5 class="mx-4 mb-0">Belum ada pengguna Guru..</h5>
			</div><?php

}

		?></div>
		<div class="col-lg-6">
			<div class="border rounded p-4 mt-5">
				<h5 class="mb-4">Siswa</h5>
				<p class="mx-4 mb-3">Jumlah pengguna: <?=$jmlSiswa?></p><?php

if($jmlSiswa > 0){

				?><div class=" mx-4"><table class="table style-3 table-hover">
					<thead>
						<tr><th>No</th><th>Nama</th><th>Username</th><th></th></tr>
					</thead>
					<tbody><?php
	$no = 0;
	foreach($dataSiswa as $siswa){
		$no++;

						?><tr>
							<td><?=$no?></td>
							<td><?=$siswa['nama']?></td>
							<td><?=$siswa['username']?></td>
							<td>
								<a class="btn btn-block btn-sm btn-info font-weight-bold text-nowrap" href="<?=BASEDOMAIN?>/users/details/<?=$siswa['id']?>"><i class="fas fa-search-plus fa-2x"></i> Detail</a>
							</td>
						</tr><?php

	}

					?></tbody>
				</table></div><?php

}else{

				?><h5 class="mx-4 mb-0">Belum ada pengguna Siswa..</h5>
			</div><?php

}
		
		?></div>
	</div>
</div><?php

$template->footer(TEMPLATE_SECTION_OPEN);

?><script type="text/javascript">	
function closeAddModal(){
	$("#addUserModal").modal("hide");
}
</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
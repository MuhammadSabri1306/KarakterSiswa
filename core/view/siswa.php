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
			<div class="d-flex ml-3 mb-4">
				<button type="button" class="btn btn-lg btn-outline-primary mr-2" data-toggle="collapse" data-target="#addCollapseForm" aria-expanded="false" aria-controls="addCollapseForm"><i class="fas fa-plus"></i> Tambah Data Siswa</button>
				<i class="border-left border-dark pl-1 ml-1"></i>
				<button type="button" class="btn btn-outline-success ml-2 p-2" data-toggle="collapse" data-target="#importCollapseForm" aria-expanded="false" aria-controls="importCollapseForm"><i class="fas fa-file-import"></i> Import dari MS.Excel</button>
			</div>
			<div id="collapseAccordion" class="container-fluid mb-5">
				<div id="importCollapseForm" class="collapse" data-parent="#collapseAccordion"><div class="border border-dark rounded p-4 mb-4">
	                <form method="post" enctype="multipart/form-data" action="<?=BASEDOMAIN?>/siswa/upload">
	                    <div class="form-group">
	                        <div class="input-group">
	                            <div class="input-group-prepend"><label class="input-group-text">Import data excel</label></div>
	                            <input name="file_data_siswa" type="file" class="form-control">
	                        </div>
	                    </div>
	                    <div class="d-flex px-4">
	                    	<button type="reset" class="btn btn-secondary mr-3" data-toggle="collapse" data-target="#importCollapseForm" aria-expanded="false" aria-controls="importCollapseForm"><i class="fas fa-reply"></i> Batal</button>
	                        <button type="submit" name="submit" class="btn btn-success mr-5"><i class="fas fa-file-upload"></i> Upload Data</button>
	                        <a href="javascript:window.open('<?=BASEDOMAIN?>/download/excel_template_data_siswa','_self').close();" class="btn btn-info mr-5"><i class="fas fa-file-download"></i> Download Excel Template</a>
	                        <a href="<?=BASEDOMAIN?>/kuesioner/empty" onclick="return confirmDelete()" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
	                    </div>
	                </form>
				</div></div>
				<div id="addCollapseForm" class="collapse" data-parent="#collapseAccordion"><div class="border border-dark rounded p-4">
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
							<button type="reset" class="btn btn-secondary mr-3" data-toggle="collapse" data-target="#addCollapseForm" aria-expanded="false" aria-controls="addCollapseForm"><i class="fas fa-reply"></i> Batal</button>
							<button type="submit" name="add" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
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
	$('#addCollapseForm').collapse('show');
</script><?php

}

$template->footer(TEMPLATE_SECTION_CLOSE);
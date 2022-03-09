<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 4;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex align-items-center mb-4">
				<h4 class="page-head-line">Uji Akurasi</h4>
				<button type="button" class="btn btn-outline-primary mx-3 p-2" data-toggle="collapse" data-target="#settingCollapseForm" aria-expanded="false" aria-controls="settingCollapseForm"><i class="fas fa-cog"></i></button>
				<a href="<?=BASEDOMAIN?>/akurasi/uji" class="btn btn-outline-success"><i class="fas fa-check"></i> Uji Akurasi</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="settingCollapseForm" class="collapse"><div class="border border-dark rounded p-4 mb-4">
				<form method="post" enctype="multipart/form-data" action="<?=BASEDOMAIN?>/akurasi/upload">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><label class="input-group-text">Import data excel</label></div>
                            <input name="file_data_uji" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex px-4">
                    	<button type="reset" class="btn btn-secondary mr-3" data-toggle="collapse" data-target="#settingCollapseForm" aria-expanded="false" aria-controls="settingCollapseForm">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-success">Upload Data</button>
                        <a href="<?=BASEDOMAIN?>/akurasi/empty" onclick="return confirmDelete()" class="btn btn-danger ml-auto"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
                    </div>
                </form>
			</div></div>
			<span>Jumlah data: <?=$jumlah?></span><br><?php

if($jumlah > 0){

			?><table id="table-siswa" class="table style-3 table-hover">
				<thead>
					<tr><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Usia</th><th>Sekolah</th><th>Jawaban A</th><th>Jawaban B</th><th>Jawaban C</th><th>Jawaban D</th><th>Kelas Asli</th></tr>
				</thead>
				<tbody><?php
	$no = 0;
	foreach($uji as $u){
		$no++;

					?><tr>
						<td><?=$no?></td>
						<td><?=$u['nama']?></td>
						<td><?=$u['jenis_kelamin']?></td>
						<td><?=$u['usia']?></td>
						<td><?=$u['sekolah']?></td>
						<td><?=$u['jawaban_a']?></td>
						<td><?=$u['jawaban_b']?></td>
						<td><?=$u['jawaban_c']?></td>
						<td><?=$u['jawaban_d']?></td>
						<td><?=$u['kelas_asli']?></td><?php

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

?><script type="text/javascript">	
function confirmDelete(){
    return confirm("Semua data latih akan dihapus. Lanjutkan?");
}
</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
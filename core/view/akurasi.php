<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 4;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Uji Akurasi</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex ml-3 mb-4">
				<a href="<?=BASEDOMAIN?>/akurasi/run" class="btn btn-outline-info mr-3"><i class="fas fa-search-plus"></i> Uji Akurasi</a>
				<i class="border-left border-dark pl-1 ml-1"></i>
				<button type="button" class="btn btn-outline-success ml-3 p-2" data-toggle="collapse" data-target="#importCollapseForm" aria-expanded="false" aria-controls="importCollapseForm"><i class="fas fa-file-import"></i> Import dari MS.Excel</button>
			</div>
			<div id="importCollapseForm" class="collapse"><div class="border border-dark rounded p-4 mb-4">
				<form method="post" enctype="multipart/form-data" action="<?=BASEDOMAIN?>/akurasi/upload">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><label class="input-group-text">Import data excel</label></div>
                            <input name="file_data_uji" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex px-4">
                    	<button type="reset" class="btn btn-secondary mr-3" data-toggle="collapse" data-target="#importCollapseForm" aria-expanded="false" aria-controls="importCollapseForm"><i class="fas fa-reply"></i> Batal</button>
                        <button type="submit" name="submit" class="btn btn-success mr-5"><i class="fas fa-file-upload"></i> Upload Data</button>
                        <a href="javascript:window.open('<?=BASEDOMAIN?>/download/excel_template_data_uji','_self').close();" class="btn btn-info mr-5"><i class="fas fa-file-download"></i> Download Excel Template</a>
                        <a href="<?=BASEDOMAIN?>/akurasi/empty" onclick="return confirmDelete()" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
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
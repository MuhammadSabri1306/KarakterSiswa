<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 3;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Kuesioner</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="mb-4">
				<button type="button" class="btn btn-outline-success ml-3 p-2" data-toggle="collapse" data-target="#importCollapseForm" aria-expanded="false" aria-controls="importCollapseForm"><i class="fas fa-file-import"></i> Import dari MS.Excel</button>
			</div>
			<div id="importCollapseForm" class="collapse"><div class="border border-dark rounded p-4 mb-4">
                <form method="post" enctype="multipart/form-data" action="<?=BASEDOMAIN?>/kuesioner/upload">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><label class="input-group-text">Import data excel</label></div>
                            <input name="file_data_kuesioner" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex px-4">
                    	<button type="reset" class="btn btn-secondary mr-3" data-toggle="collapse" data-target="#importCollapseForm" aria-expanded="false" aria-controls="importCollapseForm"><i class="fas fa-reply"></i> Batal</button>
                        <button type="submit" name="submit" class="btn btn-success mr-5"><i class="fas fa-file-upload"></i> Upload Data</button>
                        <a href="javascript:window.open('<?=BASEDOMAIN?>/download/excel_template_kuesioner','_self').close();" class="btn btn-info mr-5"><i class="fas fa-file-download"></i> Download Excel Template</a>
                        <a href="<?=BASEDOMAIN?>/kuesioner/empty" onclick="return confirmDelete()" class="btn btn-danger ml-auto"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
                    </div>
                </form>
			</div></div>
			<span>Jumlah data: <?=$jumlah?></span><br><?php

if($jumlah > 0){

			?><table id="table-siswa" class="table style-3 table-hover">
				<thead>
					<tr><th>No</th><th>Sifat Dasar</th><th>Tipe Karakter</th><th>Kategori</th><th>Keterangan</th></tr>
				</thead>
				<tbody><?php
	$no = 0;
	foreach($kuesioner as $q){
		$no++;

					?><tr>
						<td><?=$no?></td>
						<td><?=$q['keyword']?></td>
						<td><?=$q['tipe_karakter']?></td>
						<td><?=$q['kategori']?></td>
						<td><?=$q['keterangan']?></td><?php

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
<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 3;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex mb-4">
				<h4 class="page-head-line">Kuesioner</h4>
				<button type="button" class="btn btn-outline-primary ml-3 p-2" data-toggle="collapse" data-target="#settingCollapseForm" aria-expanded="false" aria-controls="settingCollapseForm"><i class="fas fa-cog"></i></button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="settingCollapseForm" class="collapse"><div class="border border-dark rounded p-4 mb-4">
                <form method="post" enctype="multipart/form-data" action="<?=BASEDOMAIN?>/kuesioner/upload">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><label class="input-group-text">Import data excel</label></div>
                            <input name="file_data_kuesioner" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex px-4">
                    	<button type="reset" class="btn btn-secondary mr-3" data-toggle="collapse" data-target="#settingCollapseForm" aria-expanded="false" aria-controls="settingCollapseForm">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-success">Upload Data</button>
                        <a href="<?=BASEDOMAIN?>/kuesioner/empty" onclick="return confirmDelete()" class="btn btn-danger ml-auto"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
                    </div>
                </form>
			</div></div>
			<span>Jumlah data: <?=$jumlah?></span><br><?php

if($jumlah > 0){

			?><table id="table-siswa" class="table style-3 table-hover">
				<thead>
					<tr><th>No</th><th>Pilihan A</th><th>Pilihan B</th><th>Pilihan C</th><th>Pilihan D</th></tr>
				</thead>
				<tbody><?php
	$no = 0;
	foreach($kuesioner as $q){
		$no++;

					?><tr>
						<td><?=$no?></td>
						<td><?=$q['pilihan_a']?></td>
						<td><?=$q['pilihan_b']?></td>
						<td><?=$q['pilihan_c']?></td>
						<td><?=$q['pilihan_d']?></td><?php

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
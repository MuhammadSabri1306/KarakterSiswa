<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 4;
$template->header(TEMPLATE_SECTION_OPEN);

?><style type="text/css">
	
.table th:not(th:nth-child(2)), .table td:not(td:nth-child(2)) { text-align: center; }

</style><?php

$template->header(TEMPLATE_SECTION_CLOSE);

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex align-items-center mb-4">
				<h4 class="page-head-line">Uji Akurasi</h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p class="pl-3 mb-3">Jumlah data: <?=$jmlData?></p><?php

if($jmlData > 0){

			?><table class="table table-bordered table-striped style-3 ml-3">
				<thead>
					<tr><th>No</th><th>Nama</th><th>Kelas Asli</th><th>Kelas Hasil</th><th>Nilai Kebenaran</th></tr>
				</thead>
				<tbody><?php
	$no = 0;
	function cetakIconHasil($isTrue){
		if($isTrue){
			?><i class="far fa-check-circle text-success lead"></i><?php
		}else{
			?><i class="far fa-times-circle text-danger lead"></i><?php
		}
	}
	foreach($uji as $u){
		$no++;

					?><tr>
						<td><?=$no?></td>
						<td><?=$u['nama']?></td>
						<td><?=$u['kelas_asli']?></td>
						<td><?=$u['kelas_hasil']?></td>
						<td><?php cetakIconHasil(boolval($u['hasil'])); ?></td><?php

	}

				?></tbody>
			</table>
			<div class="d-flex flex-column align-items-center mt-4 ml-3">
				<h5>Jumlah Prediksi: <?=$jmlData?></h5>
				<h5>Jumlah Tepat: <?=$jmlBenar?></h5>
				<h5>Jumlah Salah: <?=$jmlSalah?></h5>
				<div class="card bg-primary"><div class="card-body">
					<h5 class="m-0">Nilai Akurasi: <?=$akurasi?> %</h5>
				</div></div>
			</div><?php

}else{

			?><h3 class="text-center">Data Uji masih kosong..</h3><?php

}

		?></div>
	</div>
</div><?php

$template->footer();
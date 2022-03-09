<?php
$template = $this->getTemplate('MainTemplate');
$template->activeNav = 3;
$template->header(TEMPLATE_SECTION_OPEN);

?><style type="text/css">
	.table.style-3 td { text-align: center; border: 1px solid #bfc9d4; }
</style><?php

$template->header(TEMPLATE_SECTION_CLOSE);

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Hasil Klasifikasi</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid mt-4"><?php

if($jumlah > 0){

				?><div class="d-flex justify-content-center">
					<div>
						<h2 class="mb-0"><?=$hasil['nama_siswa']?></h2>
						<small class="d-block font-weight-bold mb-4"><?=$hasil['nis']?></small>
						<table id="table-siswa" class="table style-3 table-hover">
							<tr>
								<td colspan="2">Klasifikasi karakteristik kepribadian Anda: <b><?=$hasil['kelas_hasil']?></b></td>
							</tr>
							<tr>
								<td>Nilai Sanguin</td>
								<td><?=$hasil['nilai_sanguin']?></td>
							</tr>
							<tr>
								<td>Nilai Koleris</td>
								<td><?=$hasil['nilai_koleris']?></td>
							</tr>
							<tr>
								<td>Nilai Melankolis</td>
								<td><?=$hasil['nilai_melankolis']?></td>
							</tr>
							<tr>
								<td>Nilai Plegmatis</td>
								<td><?=$hasil['nilai_plegmatis']?></td>
							</tr>
						</table>
					</div>
				</div><?php

}else{

				?><h3 class="text-center">Anda belum mengisi kuesioner..</h3><?php

}

			?></div>
		</div>
	</div>
</div><?php

$template->footer();
<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 5;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Uji Akurasi</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-4">
			<span>Jumlah data: <?=$jumlah?></span><br><?php

if($jumlah > 0){

			?><table id="table-siswa" class="table style-3 table-hover">
				<thead>
					<tr><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Usia</th><th>Sekolah</th><th>Jawaban A</th><th>Jawaban B</th><th>Jawaban C</th><th>Jawaban D</th><th>Kelas Hasil</th></tr>
				</thead>
				<tbody><?php
	$no = 0;
	foreach($hasil as $h){
		$no++;

					?><tr>
						<td><?=$no?></td>
						<td><?=$h['nama_siswa']?></td>
						<td><?=$h['jenis_kelamin']?></td>
						<td><?=$h['usia']?></td>
						<td><?=$h['sekolah']?></td>
						<td><?=$h['jawaban_a']?></td>
						<td><?=$h['jawaban_b']?></td>
						<td><?=$h['jawaban_c']?></td>
						<td><?=$h['jawaban_d']?></td>
						<td><?=$h['kelas_hasil']?></td><?php

	}

				?></tbody>
			</table><?php

}else{

			?><h3 class="text-center">Data masih kosong..</h3><?php

}

		?></div>
	</div>
</div><?php

$template->footer();
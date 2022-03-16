<?php

$appUser = new User();
$template = $this->getTemplate('MainTemplate');
$template->activeNav = ($appUser->getLevel() == USER_LEVEL_ADMIN ? 5 : 2);
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
					<tr><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Usia</th><th>Sekolah</th><th>Jumlah A</th><th>Jumlah B</th><th>Jumlah C</th><th>Jumlah D</th><th>Kelas Hasil</th><th></th></tr>
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
						<td><a href="#" class="btn btn-block btn-sm btn-primary"><?=$h['kelas_hasil']?></a></td>
						<td><a href="https://wa.me/<?=$h['telp_orgtua']?>" class="btn btn-block btn-sm btn-success font-weight-bold" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a></td><?php

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
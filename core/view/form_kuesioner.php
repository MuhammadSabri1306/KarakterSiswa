<?php
$template = $this->getTemplate('MainTemplate');
$template->activeNav = 2;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Kuesioner</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid"><?php

if(count($soal) > 0){

				?><form method="post" action="<?=BASEDOMAIN?>/kuesioner/answer"><?php
	$no = 0;
	foreach($soal as $s){
		$no++;

					?><label class="mt-4">No. <?=$no?></label>
					<div class="form-check ml-4">
						<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="A" required="">
						<label class="form-check-label"><?=$s['pilihan_a']?></label>
					</div>
					<div class="form-check ml-4">
						<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="B" required="">
						<label class="form-check-label"><?=$s['pilihan_b']?></label>
					</div>
					<div class="form-check ml-4">
						<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="C" required="">
						<label class="form-check-label"><?=$s['pilihan_c']?></label>
					</div>
					<div class="form-check ml-4">
						<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="D" required="">
						<label class="form-check-label"><?=$s['pilihan_d']?></label>
					</div><?php

	}
					
					?><div class="d-flex pt-4 pb-5 px-5">
						<button type="reset" class="btn btn-secondary mr-3">Reset</button>
						<button type="submit" class="btn btn-success">Proses Jawaban</button>
					</div>
				</form><?php

}else{

				?><h3 class="text-center">Anda telah mengisi kuesioner..</h3><?php

}

			?></div>
		</div>
	</div>
</div><?php

$template->footer();
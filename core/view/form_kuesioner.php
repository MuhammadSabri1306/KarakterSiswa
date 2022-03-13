<?php
$template = $this->getTemplate('MainTemplate');
$template->activeNav = 2;
$template->header(TEMPLATE_SECTION_OPEN);

?><style type="text/css">
	.question-choices {
		border-width: 2px;
		border-style: solid;
		opacity: 1;
		transition: opacity .3s;
	}

	.question-choices:not(.checked){
		border-color: var(--light);
	}

	.question-choices.checked {
		opacity: .8;
	}

	.question-choices.top-left-choice { border-top-left-radius: .25rem; }
	.question-choices.top-right-choice { border-top-right-radius: .25rem; }
	.question-choices.bottom-left-choice { border-bottom-left-radius: .25rem; }
	.question-choices.bottom-right-choice { border-bottom-right-radius: .25rem; }

</style><?php

$template->header(TEMPLATE_SECTION_CLOSE);

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid pt-4">
				<div class="row justify-content-center mb-5">
					<div class="col-md-auto d-flex">
						<div class="m-auto">
							<h2 class="text-center">Catatan.</h2>
							<p class="text-center lead">Ayo isi kuesioner di bawah.<br>Tidak ada jawaban yang benar dan salah,<br>kamu hanya perlu memilih yang sesuai dengan<br>keadaan pribadimu.</p>
						</div>
					</div>
					<div class="col-md-3 d-flex">
						<img src="<?=DEFAULT_VIEW_ASSETS_URL?>/img/siswasatu.png" class="img-fluid m-auto">
					</div>
				</div><?php

if(count($soal) > 0){

				?><form method="post" action="<?=BASEDOMAIN?>/kuesioner/answer" name="formKuesioner"><?php
	$no = 0;
	foreach($soal as $s){
		$no++;

					?><div class="row mx-4 mb-4">
						<div class="col-12"><b class="lead text-white">Pertanyaan <?=$no?></b> Saya adalah seorang yang ...</div>
						<div class="col-6 question-choices top-left-choice bg-success p-4">
							<div class="form-check">
								<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="A" required="">
								<label class="form-check-label text-black"><?=$s['pilihan_a']?></label>
							</div>
						</div>
						<div class="col-6 question-choices top-right-choice bg-info p-4">
							<div class="form-check">
								<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="A" required="">
								<label class="form-check-label text-black"><?=$s['pilihan_b']?></label>
							</div>
						</div>
						<div class="col-6 question-choices bottom-left-choice bg-warning p-4">
							<div class="form-check">
								<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="A" required="">
								<label class="form-check-label text-black"><?=$s['pilihan_c']?></label>
							</div>
						</div>
						<div class="col-6 question-choices bottom-right-choice bg-danger p-4">
							<div class="form-check">
								<input type="radio" name="soal[<?=$s['id']?>]" class="form-check-input" value="A" required="">
								<label class="form-check-label text-black"><?=$s['pilihan_d']?></label>
							</div>
						</div>
					</div><?php

	}
					
					?><div class="d-flex pt-4 pb-5 px-5">
						<button type="reset" class="btn btn-secondary mr-3">Reset</button>
						<button type="submit" class="btn btn-success">Proses Jawaban</button>
					</div>
				</form><?php

}else{

				?><h3 class="text-center">Anda telah mengisi kuesioner..</h3>
				<p class="text-center">
					<a href="<?=BASEDOMAIN?>/hasil/my" class="btn btn-info">Lihat hasil klasifikasi disini</a>
				</p><?php

}

			?></div>
		</div>
	</div>
</div><?php

$template->footer(TEMPLATE_SECTION_OPEN);

?><script type="text/javascript">

const choicesElm = document.querySelectorAll(".question-choices");
choicesElm && choicesElm.forEach(choice => {

	const radio = choice.querySelector(".form-check-input");
	radio.addEventListener("click", function(){

		const rowElm = this.closest(".row");
		rowElm.querySelectorAll(".question-choices").forEach(choice => {
			const radio = choice.querySelector(".form-check-input");
			if(radio.checked && !choice.classList.contains("checked"))
				choice.classList.add("checked");
			else if(!radio.checked && choice.classList.contains("checked"))
				choice.classList.remove("checked");
		});
		
	});

	radio.addEventListener("keydown", function(event){
		event.preventDefault();
	});

});

const formKuesioner = document.forms["formKuesioner"];
formKuesioner && formKuesioner.addEventListener("reset", function(){
	const checkedChoices = document.querySelectorAll(".question-choices.checked");
	checkedChoices.forEach(checkedChoice => checkedChoice.classList.remove("checked"));
});

</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
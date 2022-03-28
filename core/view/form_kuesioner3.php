<?php
$template = $this->getTemplate('MainTemplate');
$template->activeNav = 2;
$template->header(TEMPLATE_SECTION_OPEN);

function buildQuestionsCarousel($soalA, $soalB, $soalC, $soalD, $carouselId){
	$soal = array($soalA, $soalB, $soalC, $soalD);

	?><div id="<?=$carouselId?>" class="questions-carousel mb-5" data-item="1" data-filled="false">
		<div class="questions-panel rounded-top sticky-top">
			<h4 class="text-center">Jumlah yang dipilih: <span data-count="0">0</span></h4>
			<div class="d-flex justify-content-center pt-2">
				<button type="button" class="btn btn-panel mx-3" data-target-item="prev"><i class="fas fa-caret-left fa-2x"></i> Sebelumnya</button>
				<button type="button" class="btn btn-panel mx-2" data-target-item="1" disabled><i class="fas fa-circle fa-2x"></i></button>
				<button type="button" class="btn btn-panel mx-2" data-target-item="2"><i class="far fa-circle fa-2x"></i></button>
				<button type="button" class="btn btn-panel mx-2" data-target-item="3"><i class="far fa-circle fa-2x"></i></button>
				<button type="button" class="btn btn-panel mx-2" data-target-item="4"><i class="far fa-circle fa-2x"></i></button>
				<button type="button" class="btn btn-panel mx-3" data-target-item="next">Berikutnya <i class="fas fa-caret-right fa-2x"></i></button>
			</div>
		</div>
		<div class="questions-content rounded-bottom"><div class="questions-container"><?php

foreach($soal as $table){

		?><div class="questions-item"><table class="table table-sm table-hover table-borderless"><?php

	foreach($table as $row){
		$inputValue = $row['tipe_karakter'] == 'Sanguin' ? 'A' : ($row['tipe_karakter'] == 'Koleris' ? 'B' : ($row['tipe_karakter'] == 'Melankolis' ? 'C' : ($row['tipe_karakter'] == 'Plegmatis' ? 'D' : '')));

			?><tr><td data-disabled="false">
				<div class="form-check">
					<input name="jawaban[<?=$row['id']?>]" type="checkbox" value="<?=$inputValue?>" class="form-check-input" data-kategori="<?=$row['kategori']?>">
					<label class="form-check-label"><?=$row['keterangan']?></label>
				</div>
			</td></tr><?php

	}

		?></table></div><?php

}

		?></div></div>
	</div><?php

}

?><style type="text/css">

	:root {
		--questions-carousel-width: 500px;
	}

	.questions-carousel {
		display: flex;
		flex-direction: column;
		justify-content: stretch;
		width: calc(2rem + var(--questions-carousel-width));
	}

	.questions-carousel .questions-panel,
	.questions-carousel .questions-content {
		padding: 1rem;
		border: 1px solid var(--primary);
	}

	.questions-carousel .questions-panel {
		background-color: var(--primary);
		color: #fff;
	}

	.questions-carousel[data-filled="true"] .questions-panel,
	.questions-carousel[data-filled="true"] .questions-content {
		border: 1px solid var(--success);
	}

	.questions-carousel[data-filled="true"] .questions-panel {
		background-color: var(--success);
	}

	.questions-carousel .btn-panel,
	.questions-carousel .btn-panel:disabled {
		padding: 0;
		background-color: transparent;
		border: none;
		color: #fff;
		opacity: 1;
	}

	.questions-carousel .questions-content {
		position: relative;
		overflow-x: hidden;
	}

	.questions-carousel .questions-container {
		width: calc(4 * var(--questions-carousel-width));
		margin-left: 0;
		display: grid;
		grid-template-columns: repeat(4, var(--questions-carousel-width));
		transition: margin-left .3s;
	}

	.questions-carousel[data-item="2"] .questions-container {
		margin-left: calc(-1 * var(--questions-carousel-width));
	}

	.questions-carousel[data-item="3"] .questions-container {
		margin-left: calc(-2 * var(--questions-carousel-width));
	}

	.questions-carousel[data-item="4"] .questions-container {
		margin-left: calc(-3 * var(--questions-carousel-width));
	}

	.questions-carousel .questions-item {
		position: relative;
		width: var(--questions-carousel-width);
		display: flex;
		justify-content: center;
	}

	.questions-carousel .questions-item > .table {
		width: auto!important;
	}

	.questions-carousel td[data-disabled="true"],
	.questions-carousel td[data-disabled="true"] .form-check-label {
		cursor: not-allowed;
	}

</style><?php

$template->header(TEMPLATE_SECTION_CLOSE);

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid pt-4"><?php

if($jumlah > 0){

				?><div class="row justify-content-center mb-5">
					<div class="col-md-auto d-flex">
						<div class="m-auto">
							<h2 class="text-center mb-3">Catatan.</h2>
							<p class="text-center lead mb-3">Ayo isi kuesioner di bawah.<br>Tidak ada jawaban yang benar dan salah,<br>kamu hanya perlu memilih yang sesuai dengan<br>keadaan pribadimu.</p>
							<p class="text-center font-weight-bold">Terdapat 2 kategori, yaitu kelebihan dan kekurangan,<br>kamu harus memilih 20 kata kunci untuk masing-masing kategori<br>yang dirasa paling tepat untuk mendeskripsikan<br>dirimu sendiri. Selamat bermain!</p>
						</div>
					</div>
					<div class="col-md-3 d-flex">
						<img src="<?=DEFAULT_VIEW_ASSETS_URL?>/img/siswasatu.png" class="img-fluid m-auto">
					</div>
				</div>
				<form method="post" id="formSoal" action="<?=BASEDOMAIN?>/kuesioner/answer">
					<div class="d-flex pb-3">
						<h3 class="font-weight-bold mx-auto">Kelebihan saya adalah:</h3>
					</div>
					<div class="d-flex justify-content-center"><?php

	buildQuestionsCarousel($soal_a_kelebihan, $soal_b_kelebihan, $soal_c_kelebihan, $soal_d_kelebihan, 'questionsKelebihan');

					?></div>
					<div class="d-flex pt-5 pb-3">
						<h3 class="font-weight-bold mx-auto pt-3">Kekurangan saya adalah:</h3>
					</div>
					<div class="d-flex justify-content-center"><?php

	buildQuestionsCarousel($soal_a_kekurangan, $soal_b_kekurangan, $soal_c_kekurangan, $soal_d_kekurangan, 'questionsKekurangan');

					?></div>
					<div class="d-flex pt-4 pb-5 px-5">
						<button type="reset" class="btn btn-secondary mr-3">Reset</button>
						<button type="submit" name="answer" class="btn btn-success">Proses Jawaban</button>
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

const checkValidity = () => {
	const getError = message => {
		alert(message);
		return false;
	};

	if(counterElm("questionsKelebihan") < 20)
		return getError(`Kamu perlu memilih ${20 - counterElm("questionsKelebihan")} lagi untuk mencapai 20 kata kunci pada Kategori Kelebihan kamu!`);
	if(counterElm("questionsKelebihan") > 20)
		return getError(`Kata kunci pada Kategori Kelebihan kamu melebihi 20 kata kunci!`);
	if(counterElm("questionsKekurangan") < 20)
		return getError(`Kamu perlu memilih ${20 - counterElm("questionsKekurangan")} lagi untuk mencapai 20 kata kunci pada Kategori Kekurangan kamu!`);
	if(counterElm("questionsKekurangan") > 20)
		return getError(`Kata kunci pada Kategori Kekurangan kamu melebihi 20 kata kunci!`);

	return true;
};

$("#formSoal").bind("submit", function(event){
	!checkValidity() && event.preventDefault();
});

const countAnswerChecked = carouselId => $(`#${carouselId} .form-check-input:checked`).length;

const getQuestionsCarouselActiveItem = carouselId => Number($(`#${carouselId}`).attr("data-item"));

const activateQuestionsCarouselItem = (carouselId, itemNumber) => {
	if(itemNumber < 1 || itemNumber > 4){
		console.log("Wrong item number of carousel, inputed: " + itemNumber);
		return false;
	}

	$("#" + carouselId).attr("data-item", itemNumber);

	$(`#${carouselId} .btn-panel:disabled svg[data-prefix="fas"]`).attr("data-prefix", "far");
	$(`#${carouselId} .btn-panel:disabled`).prop("disabled", false);

	$(`#${carouselId} .btn-panel[data-target-item="${itemNumber}"]`).prop("disabled", true);
	$(`#${carouselId} .btn-panel:disabled svg`).attr("data-prefix", "fas");
};

$(".questions-carousel .btn-panel").click(function(){
	let targetItem = $(this).attr("data-target-item");
	const carouselId = $(this).closest(".questions-carousel").attr("id");
	const activeItem = getQuestionsCarouselActiveItem(carouselId);

	if(targetItem == "prev")
		targetItem = (activeItem == 1) ? 4 : activeItem - 1;
	else if(targetItem == "next")
		targetItem = (activeItem == 4) ? 1 : activeItem + 1;

	activateQuestionsCarouselItem(carouselId, targetItem);
});

const counterElm = (carouselId, value = null) => {
	if(value == null)
		return Number($(`#${carouselId} span[data-count]`).attr("data-count"));
	
	$(`#${carouselId} span[data-count]`).attr("data-count", value);
	$(`#${carouselId} span[data-count]`).html(value);
};

const setCheckboxDisabled = (jqueryCheckboxElm, disabled) => {
	jqueryCheckboxElm.prop("disabled", disabled);
	jqueryCheckboxElm.closest("td").attr("data-disabled", disabled);
};

const checkboxChecked = jqueryCheckboxElm => {
	const carouselId = jqueryCheckboxElm.closest(".questions-carousel").attr("id");
	const isChecked = jqueryCheckboxElm.prop("checked");

	if(isChecked) counterElm(carouselId, counterElm(carouselId) + 1);
	else counterElm(carouselId, counterElm(carouselId) - 1);

	if(isChecked && counterElm(carouselId) == 20){

		setCheckboxDisabled($(`#${carouselId} .form-check-input:not(input:checked)`), true);
		$(`#${carouselId}`).attr("data-filled", "true");

	}else if(!isChecked && counterElm(carouselId) == 19){

		setCheckboxDisabled($(`#${carouselId} .form-check-input:disabled`), false);
		$(`#${carouselId}`).attr("data-filled", "false");

	}
};

$(".questions-carousel .form-check-input").click(function(){
	checkboxChecked($(this));
});

$(".questions-carousel .form-check-label").click(function(){
	const checkbox = $(this).parent().children(".form-check-input");
	if(checkbox.prop("disabled")) return;

	checkbox.prop("checked", !checkbox.prop("checked"));
	checkboxChecked(checkbox);
});

</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
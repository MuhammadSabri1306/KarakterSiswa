<?php
$template = $this->getTemplate('MainTemplate');
$template->activeNav = 2;
$template->header(TEMPLATE_SECTION_OPEN);

?><style type="text/css">

	.questions {
		padding: .25rem .35rem;
		background-color: transparent;
		border: 1px solid var(--primary);
		opacity: 1;
		transition: all .3s;
	}

	.questions[data-readonly="true"] {
		opacity: .4;
	}

	.questions[data-readonly="false"]:hover,
	.questions[data-active="true"][data-readonly="false"] {
		background-color: var(--primary);
	}

	.questions > label {
		transition: color .3s;
	}

	.questions[data-readonly="false"]:hover > label,
	.questions[data-active="true"][data-readonly="false"] > label {
		color: #fff;
	}

	.questions > * {
		font-size: .85rem;
	}

	.questions[data-readonly="false"],
	.questions[data-readonly="false"] > * {
		cursor: pointer;
	}

	.questions[data-readonly="true"],
	.questions[data-readonly="true"] > * {
		cursor: no-drop;
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
							<p class="text-center font-weight-bold">Terdapat 2 kategori, yaitu kelebihan dan kekurangan,<br>kamu harus memilih beberapa kata kunci yang dirasa paling tepat<br>untuk mendeskripsikan dirimu sendiri. Untuk setiap kategori,<br>kamu hanya boleh memilih 20 - 25 kata kunci.<br>Selamat bermain!</p>
						</div>
					</div>
					<div class="col-md-3 d-flex">
						<img src="<?=DEFAULT_VIEW_ASSETS_URL?>/img/siswasatu.png" class="img-fluid m-auto">
					</div>
				</div>
				<form method="post" action="<?=BASEDOMAIN?>/kuesioner/answer1" onsubmit="return checkValidity()">
					<label class="font-weight-bold mx-4 mb-3">Kelebihan saya adalah:</label>
					<div class="row justify-content-center g-2 mx-4 mb-5"><?php

	foreach($soalKelebihan as $a){

						?><div class="col-auto pl-0 pr-1 mb-2">
							<div class="questions form-check form-check-inline px-2 rounded-pill" data-kategori="<?=$a['kategori']?>" data-active="false" data-readonly="false">
								<input name="<?=$a['tipe_karakter']?>" type="checkbox" value="<?=$a['id']?>" class="form-check-input">
								<label class="form-check-label"><?=$a['keterangan']?></label>
							</div>
						</div><?php

	}
					
					?></div>
					<label class="font-weight-bold mx-4 mb-3">Kelemahan saya adalah:</label>
					<div class="row justify-content-center g-2 mx-4 mb-5"><?php

	foreach($soalKekurangan as $b){

						?><div class="col-auto pl-0 pr-1 mb-2">
							<div class="questions form-check form-check-inline px-2 rounded-pill" data-kategori="<?=$b['kategori']?>" data-active="false" data-readonly="false">
								<input name="<?=$b['tipe_karakter']?>" type="checkbox" value="<?=$b['id']?>" class="form-check-input">
								<label class="form-check-label"><?=$b['keterangan']?></label>
							</div>
						</div><?php

	}
					
					?></div>
					<div class="d-flex pt-4 pb-5 px-5">
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

const countChecked = kategori => {
	if(['Kelebihan', 'Kekurangan'].findIndex(item => item == kategori) < 0){
		console.error("Kategori set to wrong keyword!");
		return false;
	}

	return $(`.questions[data-kategori="${kategori}"][data-active="true"]`).length;
};

const setQuestionsActive = (jqueryElms, active) => {

	jqueryElms.parent().each(function(){
		$(this).attr("data-active", `${active}`);
	});

};

const setQuestionsReadonly = (jqueryElms, readonly) => {

	jqueryElms.each(function(){
		$(this).prop("readonly", readonly);
		$(this).parent().attr("data-readonly", `${readonly}`);
	});

};

const checkboxValueChanged = jqueryElms => {
	console.log(1);

	const isChecked = jqueryElms.prop("checked"),
		kategori = jqueryElms.parent().attr("data-kategori");

	setQuestionsActive(jqueryElms, isChecked);

	if(isChecked && countChecked(kategori) == 25) setQuestionsReadonly($(`.questions[data-kategori="${kategori}"] > .form-check-input:not(input:checked)`), true);
	else if(!isChecked && countChecked(kategori) == 24) setQuestionsReadonly($(`.questions[data-kategori="${kategori}"] > .form-check-input[readonly]`), false);

};

$(".questions > input.form-check-input").change(function(){
	
	checkboxValueChanged($(this));

});

$(".questions > .form-check-label").click(function(){

	const checkbox = $(this).parent().children(".form-check-input");
	checkbox.prop("checked", !$(checkbox).prop("checked"));

	checkboxValueChanged(checkbox);

});

function checkValidity(){
	if(countChecked("Kelebihan") < 20){
		alert("Kamu harus memilih kata kunci paling sedikit 20 pada Kategori Kelebihan!");
		return false;
	}

	if(countChecked("Kekurangan") < 20){
		alert("Kamu harus memilih kata kunci paling sedikit 20 pada Kategori Kelemahan!");
		return false;
	}

	return true;
}

</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
<?php
$template = $this->getTemplate('MainTemplate');
$template->activeNav = 2;
$template->header(TEMPLATE_SECTION_OPEN);

?><style type="text/css">

	.answer-item {
		padding: .25rem .35rem;
		background-color: var(--primary);
		border: 1px solid var(--primary);
		color: #fff;
		opacity: 1;
		transition: .3s;
	}

	.answer-item.hide { opacity: 0; }	

	.answer-item > button {
		background-color: transparent;
	    border: none;
	    color: #fff;
	    margin-top: 3px;
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
				<div class="row mb-5">
					<div class="col-md">
						<label class="font-weight-bold mx-4 mb-3">Kelebihan saya adalah:</label>
						<input type="text" class="form-control" name="kelebihan" list="listKelebihan">
						<datalist id="listKelebihan"><?php

	foreach($soalKelebihan as $kb){

							?><option value="<?=$kb['keterangan']?>" data-id="<?=$kb['id']?>"><?php

	}

						?></datalist>
						<div id="selectedAnswerKelebihan" class="row mt-4"></div>
					</div>
					<div class="col-md d-flex">
						<div class="d-flex flex-column align-items-center justify-content-center my-auto">
							<h5 class="mb-0"><i class="fas fa-caret-up"></i> Max 25</h5>
							<div class="border border-primary rounded px-4 py-3 my-3">
								<h3 class="text-center mb-0" id="jmlKelebihan" data-count="0">0</h3>
							</div>
							<h5 class="mb-0"><i class="fas fa-caret-down"></i> Min 20</h5>
						</div>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md">
						<label class="font-weight-bold mx-4 mb-3">Kelebihan saya adalah:</label>
						<input type="text" class="form-control" name="kekurangan" list="listKekurangan">
						<datalist id="listKekurangan"><?php

	foreach($soalKelebihan as $kr){

							?><option value="<?=$kr['keterangan']?>" data-id="<?=$kr['id']?>"><?php

	}

						?></datalist>
						<div id="selectedAnswerKekurangan" class="row mt-4"></div>
					</div>
					<div class="col-md d-flex">
						<div class="d-flex flex-column align-items-center justify-content-center my-auto">
							<h5 class="mb-0"><i class="fas fa-caret-up"></i> Max 25</h5>
							<div class="border border-primary rounded px-4 py-3 my-3">
								<h3 class="text-center mb-0" id="jmlKekurangan" data-count="0">0</h3>
							</div>
							<h5 class="mb-0"><i class="fas fa-caret-down"></i> Min 20</h5>
						</div>
					</div>
				</div>
				<form method="post" action="<?=BASEDOMAIN?>/kuesioner/answer1" onsubmit="return checkValidity()">
					<div class="d-none"><?php

	foreach(array_merge($soalKelebihan, $soalKekurangan) as $soal){

						?><input type="checkbox" name="soal" value="<?=$soal['id']?>" data-id="<?=$soal['id']?>"><?php

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
</div>
<template id="templateAnswerItem">
	<div class="answer-item rounded-pill d-flex align-items-center mr-2 mb-2">
		<span data-template="title">Animatable</span>
		<button class="btn-sm" onclick="removeAnswerItem(this)"><i class="fas fa-times"></i></button>
	</div>
</template><?php

$template->footer(TEMPLATE_SECTION_OPEN);

?><script type="text/javascript">

/*
const countChecked = kategori => {
	if(['Kelebihan', 'Kekurangan'].findIndex(item => item == kategori) < 0){
		console.error("Kategori set to wrong keyword!");
		return false;
	}

	return $(`.questions[data-kategori="${kategori}"][data-active="true"]`).length;
};
*/

const getCounterRange = () => val = {min: 20, max: 25};

const getIdFromList = targetSelector => {
	const selectedOption = $(targetSelector);
	if(selectedOption.length < 1) return -1;

	return Number($(selectedOption).attr("data-id"));
};

const appendAnswerItemTo = (targetSelector, title, kategori) => {
	const answerItemElm = $("#templateAnswerItem")[0].content.cloneNode(true);

	$(answerItemElm).find("[data-template='title']").html(title);
	$(answerItemElm).attr("data-kategori", kategori);
	$(targetSelector).append(answerItemElm);
};

const answerCounter = (targetSelector, value = null) => {
	if(value === null)
		return Number($(targetSelector).attr("data-count"));

	$(targetSelector).attr("data-count", value);
	$(targetSelector).html(value);
};

$("input[name='kelebihan']").change(function(){
	const answerId = getIdFromList(`#listKelebihan > option[value='${ $(this).val() }']`);
	if(answerId < 0) return false;

	appendAnswerItemTo("#selectedAnswerKelebihan", $(this).val(), 'kelebihan');
	answerCounter("#jmlKelebihan", answerCounter("#jmlKelebihan") + 1);
	$(this).val("");

	if(answerCounter("#jmlKelebihan") == getCounterRange().max)
		$(this).prop("disabled", true);
});

$("input[name='kekurangan']").change(function(){
	const answerId = getIdFromList(`#listKekurangan > option[value='${ $(this).val() }']`);
	if(answerId < 0) return false;

	appendAnswerItemTo("#selectedAnswerKekurangan", $(this).val(), 'kekurangan');
	answerCounter("#jmlKekurangan", answerCounter("#jmlKekurangan") + 1);
	$(this).val("");

	if(answerCounter("#jmlKekurangan") == getCounterRange().max)
		$(this).prop("disabled", true);
});

const capitalizeFirstChar = str => str.charAt(0).toUpperCase() + str.slice(1);

function removeAnswerItem(closeBtn){
	const item = $(closeBtn).parent();
	const kategori = $(item).attr("data-kategori"); //ex: kelebihan

	$(item).addClass("hide");
	setTimeout(() => {

		const answerCounterSelector = "#jml" + capitalizeFirstChar(kategori); //ex: #jmlKelebihan
		const inputTextSelector = `input[name="${kategori}"]`; //ex: input[name="kelebihan"]

		$(item).remove();
		answerCounter(answerCounterSelector, answerCounter(answerCounterSelector) - 1);

		if($(inputTextSelector).prop("disabled") && answerCounter(answerCounterSelector) < getCounterRange().max) $(inputTextSelector).prop("disabled", true);

	}, 500);
}


function checkValidity(){

	const {min, max} = getCounterRange();
	const getError = message => {
		alert(message);
		return false;
	};

	if(answerCounter("#jmlKelebihan") < min)
		return getError(`Kamu harus memilih kata kunci paling sedikit ${min} pada Kategori Kelebihan!`);

	if(answerCounter("#jmlKelebihan") > max)
		return getError(`Kamu harus memilih kata kunci paling banyak ${max} pada Kategori Kelebihan!`);

	if(answerCounter("#jmlKekurangan") < min)
		return getError(`Kamu harus memilih kata kunci paling sedikit ${min} pada Kategori Kelebihan!`);

	if(answerCounter("#jmlKekurangan") > max)
		return getError(`Kamu harus memilih kata kunci paling banyak ${max} pada Kategori Kelebihan!`);

	return true;
}


</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
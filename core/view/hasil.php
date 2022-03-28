<?php

$appUser = new User();
$modalKarakter = $this->getComponent('ModalDeskripsiKarakter');

$template = $this->getTemplate('MainTemplate');
$template->activeNav = ($appUser->getLevel() == USER_LEVEL_ADMIN ? 4 : 2);
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Hasil Klasifikasi Siswa</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-4">
			<div class="d-flex align-items-center mb-3 ml-3">
				<span class="mr-3">Deskripsi tipe kepribadian:</span><?php
$modalKarakter->getToggler('Sanguin', 'btn btn-primary rounded-pill mr-3');
$modalKarakter->getToggler('Koleris', 'btn btn-primary rounded-pill mr-3');
$modalKarakter->getToggler('Melankolis', 'btn btn-primary rounded-pill mr-3');
$modalKarakter->getToggler('Plegmatis', 'btn btn-primary rounded-pill');
			?></div>
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
						<td><?php $modalKarakter->getToggler($h['kelas_hasil'], 'btn btn-block btn-sm btn-primary', $h['id']); ?></td>
						<td><a href="https://wa.me/<?=$h['telp_orgtua']?>" class="btn btn-block btn-sm btn-success font-weight-bold" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a></td><?php

	}

				?></tbody>
			</table><?php

}else{

			?><h3 class="text-center">Data masih kosong..</h3><?php

}

		?></div>
	</div>
</div>
<template id="modalAnswers">
	<div data-createdBy="modalAnswersTemplate">
		<p><b>Jawaban dipilih:</b></p>
		<p>Kelebihan: <ul class="unstyled-list" data-bind-list="kelebihan"></ul></p>
		<p>Kelebihan: <ul class="unstyled-list" data-bind-list="kekurangan"></ul></p>
	</div>
</template>
<template id="listForModalAnswers">
	<li class="d-flex align-items-center my-1">
		<span class="bg-primary text-white rounded-pill small p-2 mr-2" data-bind-item="keyword"></span>
		<span data-bind-item="keterangan"></span>
	</li>
</template><?php

$modalKarakter->getModals();
$template->footer(TEMPLATE_SECTION_OPEN);

?><script type="text/javascript">

const answersJSON = '<?=$jawabanJSON?>';
const answers = JSON.parse(answersJSON);

const modalAnswers = {
	model: null,
	wrapper: null,
	template: {
		main: null,
		list: null
	},
	init: function(params = {wrapperSelector:null, mainTemplateId:null, listTemplateId:null}){
		if(params.hasOwnProperty("wrapperSelector") && params.wrapperSelector != null)
			this.wrapper = $(params.wrapperSelector)[0];

		if(params.hasOwnProperty("mainTemplateId") && params.mainTemplateId != null)
			this.template.main = "#" + params.mainTemplateId;

		if(params.hasOwnProperty("listTemplateId") && params.listTemplateId != null)
			this.template.list = "#" + params.listTemplateId;
	},
	setModel: function(model){
		this.model = model;
		return this;
	},
	changeWrapper: function(wrapperSelector){
		this.wrapper = $(wrapperSelector)[0];
		return this;
	},
	build: function(){
		if(this.model == null || this.template.main == null)
			return false;

		const elm = this.getMainElm(this.model.kelebihan, this.model.kekurangan);
		$(this.wrapper).html(elm);

		return this;
	},
	show: function(){
		$(this.wrapper).removeClass("d-none");
		return this;
	},
	hide: function(remove = false){
		$(this.wrapper).addClass("d-none");
		remove && $(this.wrapper).html("");

		return this;
	},
	getListElm: function(keyword, keterangan){
		const elm = $(this.template.list)[0].content.cloneNode(true);
		$(elm).find("[data-bind-item='keyword']").html(keyword);
		$(elm).find("[data-bind-item='keterangan']").html(keterangan);

		return elm;
	},
	getMainElm: function(kelebihan, kekurangan){
		const elm = $(this.template.main)[0].content.cloneNode(true);
		
		kelebihan.forEach(item => {
			const listElm = this.getListElm(item.keyword, item.keterangan);
			$(elm).find("[data-bind-list='kelebihan']").append(listElm);
		});

		kekurangan.forEach(item => {
			const listElm = this.getListElm(item.keyword, item.keterangan);
			$(elm).find("[data-bind-list='kekurangan']").append(listElm);
		});

		return elm;
	}
};

modalAnswers.init({
	wrapperSelector: null,
	mainTemplateId: "modalAnswers",
	listTemplateId: "listForModalAnswers"
});

$(".modal-toggler").click(function(){
	const targetModal = $(this).attr("data-target"),
		targetId = $(this).attr("data-target-id");

	targetId && modalAnswers.setModel(answers[targetId]).changeWrapper(targetModal + " .modal-answers").build().show();

	$(targetModal).modal('show');
});

$(".modal").each(function(){
	const modalId = $(this).attr("id");
	$("#" + modalId).on("hidden.bs.modal", function(e){
		$(this).find("[data-createdBy='modalAnswersTemplate']").length > 0 && modalAnswers.hide(true);
	});
});

</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
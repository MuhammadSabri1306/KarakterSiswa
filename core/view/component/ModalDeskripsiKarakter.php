<?php
/**
 * 
 */
class ModalDeskripsiKarakter
{
	private $data = array(
		'sanguin' => array(
			'deskripsi' => 'Seorang sanguin adalah orang yang memiliki tipe kepribadian yang khas. Mereka memiliki sifat sedikit seperti anak-anak. Sanguin biasanya tidak menemukan masalah dalam kehidupan sosialnya karena mudah bergaul dan akrab walau dengan orang-orang yang baru dikenal. Sanguin sangat suka bicara, gampang untuk mengikuti sebuah kelompok. Di balik sisi positifnya, individu bertipe kepribadian sanguin memang agak susah untuk berkosentrasi pada suatu hal, ia juga egois, pelupa, suka terlambat, dan seringkali membuat satu hal kecil menjadi besar. Meskipun sanguin bukan menjadi seorang pemimpin dalam sebuah kelompok, namun sanguin biasanya ingin tampil lebih mencolok ketimbang anggota kelompok lainnya.',
			'kecenderungan' => array(
				'Seorang sanguin selalu ingin diperhatikan',
				'Cara yang digunakan sanguin adalah cara yang dianggap paling menyenangkan.',
				'Kebutuhan dasar emosi sanguin adalah kesenangan.',
				'Tingkat stress sanguin adalah jika tidak ada perhatian.',
				'Watak dasar sanguin : Ekstrovert, pembicara, optimis.',
				'Personality secara umum dari sanguin adalah bersikap spontan, lincah, dan periang.'
			),
			'komunikasi' => array(
				'Berikan penghargaan yang benar-benar tulus.',
				'Lebih banyak mendengar.',
				'Beri perhatian yang lebih dibandingkan orang lain.',
				'Jangan mengkritik secara langsung.',
				'Jangan bicara hal-hal yang detail.',
				'Bertanyalah hal-hal yang dia suka.'
			)
		),
		'koleris' => array(
			'deskripsi' => 'Manusia dengan kepribadian koleris memiliki kemampuan memimpin yang bagus karena bisa dengan mudah mengambil sebuah keputusan. Orang-orang koleris memiliki tujuan yang baik untuk ke depannya serta selalu produktif dan dinamis. Koleris pun adalah pribadi yang menyukai kebebasan dan selama hidupnya akan selalu bekerja keras. Hanya saja, tipe koleris suka memerintah karena sifat kepemimpinannya, susah untuk mengalah, menyukai pertentangan, mudah terpancing emosi, tidak mudah untuk disuruh sabar, dan termasuk tipe yang keras kepala karena kemauannya yang keras.',
			'kecenderungan' => array(
				'Seorang koleris cenderung ingin dihargai.',
				'Cara yang digunakan koleris adalah caranya sendiri.',
				'Kebutuhan dasar emosi koleris adalah mengendalikan.',
				'Tingkat stress koleris adalah jika orang lain tak suka menurut.',
				'Watak dasar koleris : Ekstrovert dan optimis.',
				'Personality secara umum koleris adalah suka petualangan, persuasif, percaya diri.'
			),
			'komunikasi' => array(
				'Menghargai secara tulus atas hasil kerjanya.',
				'Berbicara langsung pada pokok persoalan.',
				'Berbicara dengan fakta dan bukti.',
				'Mintalah pandangan atau pendapatnya.',
				'Libatkan dia dalam proses pengambilan keputusan.',
				'Mepersiapkan diri untuk dikritik langsung olehnya.',
				'Jangan menyalahkan secara langsung.'
			)
		),
		'melankolis' => array(
			'deskripsi' => 'Individu dengan pribadi melankolis adalah tipe manusia yang memiliki sifat analitis, suka memerhatikan orang lain, perfeksionis, hemat, tidak begitu menyukai perhatian, serius, artistik, sensitif dan senantiasa rela berkorban. Hanya saja tipe pribadi melankolis biasanya berfokus pada sebuah cara atau proses ketimbang tujuan. Mereka yang melankolis pun kurang bisa menyuarakan opininya, seringkali juga memandang masalah dari sisi buruknya, serta kurang mampu bersosialisasi dengan baik. Banyak orang yang melankolis berbakat menjadi seorang pengusaha yang hebat dan sukses.',
			'kecenderungan' => array(
				'Seorang melankolis membutuhkan orang yang mampu memahami pola pikirnya.',
				'Cara yang digunakan melankolis adalah cara yang dianggap paling benar.',
				'Kebutuhan dasar emosi melankolis adalah kesempurnaan (perfeksionis).',
				'Tingkat stress melankolis adalah jika tidak ada keteraturan.',
				'Watak dasar melankolis : Introvert, pemikir, pesimistis.',
				'Personality secara umum melankolis adalah setia, penuh pemikiran, tekun'
			),
			'komunikasi' => array(
				'Bersikap sopan.',
				'Berbicara sistematis.',
				'Penjelasan terperinci disertai fakta atau bukti.',
				'Buatlah daftar kelebihan dan kelemahan dari suatu solusi untuk meyakinkannya.',
				'Siapkan opsi alternatif.',
				'Jangan didesak untuk mengambil keputusan.'
			)
		),
		'plegmatis' => array(
			'deskripsi' => 'Plegmatis adalah jenis kepribadian individu yang selalu cinta damai dengan menjadi netral dalam segala kondisi konflik tanpa ingin memilih kubu. Dalam kehidupan sosialnya, individu plegmatis akan lebih senang menjadi pendengar yang baik daripada sebagai pelaku cerita. Manusia berkepribadian plegmatis mempunyai selera humor yang bagus walau sarkatik (sifat humor yang menyinggung atau mengejek), menyukai keteraturan, mudah bergaul, serta suka mencari jalan pintas. Individu ini juga tidak suka dipaksa, suka menunda sesuatu hal dan memiliki antusias yang kurang terhadap hal-hal baru.',
			'kecenderungan' => array(
				'Kepribadian plegmatis adalah hormatilah saya.',
				'Cara yang digunakan plegmatis adalah cara yang dianggap paling mudah',
				'Kebutuhan dasar emosi pleghmatis adalah kedamaian.',
				'Tingkat stress pleghmatis adalah tidak ada kedamaian.',
				'Watak dasar pleghmatis : introvert, pengamat, pesimis.',
				'Personality secara umum pleghmatis adalah bersikap tenang, setia, tekun.'
			),
			'komunikasi' => array(
				'Berbicaralah dengan cara yang bersahabat.',
				'Jelaskan masalah dengan sederhana dan jangan telalu rumit.',
				'Bisa meyakinkan dia pada sebuah solusi.',
				'Jangan berbicara terlalu agresif.',
				'Jangan didesak atau diburu-buru.'
			)
		)
	);

	function getToggler($tipe, $classname, $targetId = null){
		$tipe = strtolower($tipe);
		$dataKey = array_keys($this->data);

		if(!in_array($tipe, $dataKey)){
			return false;
		}else{

			?><button type="button" class="<?=$classname?> modal-toggler" <?=$targetId != null ? 'data-target-id="'.$targetId.'"' : ''?> data-target="#<?=$tipe?>DescriptionModal"><?=ucfirst($tipe)?></button><?php

		}
	}

	function getModals(){
		foreach($this->data as $tipe => $data){

?><div class="modal fade" id="<?=$tipe?>DescriptionModal" tabindex="-1" aria-labelledby="<?=$tipe?>DescriptionModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content border-primary">
			<div class="modal-header border-primary">
				<h5 class="modal-title" id="<?=$tipe?>DescriptionModalLabel">Deskripsi Kepribadian <?=ucfirst($tipe)?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="p-3">
					<p><?=$data['deskripsi']?></p>
					<p>Kecenderungan karakter:<ol type="a" class="text-light"><?php

			foreach($data['kecenderungan'] as $kecenderungan){

						?><li><?=$kecenderungan?></li><?php

			}

					?></ol></p>
					<p>Pola komunikasi yang disarankan:<ul class="text-light"><?php

			foreach($data['komunikasi'] as $komunikasi){

						?><li><?=$komunikasi?></li><?php

			}

					?></ul></p>
					<div class="modal-answers d-none"></div>
				</div>
			</div>
		</div>
	</div>
</div><?php
		
		}
	}

}
<?php

$template = $this->getTemplate('MainTemplate');
$template->header();

?><div class="container">
    <div class="row mb-5">
        <div class="col-md-12 col-lg-6 mx-auto">
            <h3 class="text-center m-0">Sistem Klasifikasi Karakter Kepribadian Siswa (K3S)</h3>
            <div class="row justify-content-center my-5">
                <div class="col-md-8 col-lg-6"><img src="<?=DEFAULT_VIEW_ASSETS_URL?>/img/logo-disdik.png" class="img-fluid" alt="Logo Dinas Pendidikan"></div>
            </div>
            <h4 class="text-center">UPT SD Inpres 12/79 Palattae</h4>
            <p class="text-center mb-5">Kecamatan Kahu, Kabupaten Bone</p>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="border border-primary rounded px-4 py-5" style="max-width: 900px;">
            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <p class="mb-4">Dikembangkan dari Penelitian berjudul <b>Sistem Klasifikasi Karakter<br>Kepribadian Siswa Sekolah Dasar Berdasarkan Tipologi <i>Hippocrates<br>Galenus</i> Menggunakan Metode <i>Naive Bayes</i></b> yang disusun oleh:</p>
                    <p>Dedy Kasriadi (162322)</p>
                    <p class="mb-0">Muhammad Sabri (162307)</p>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="<?=DEFAULT_VIEW_ASSETS_URL?>/img/logo-undipa.png" width="25%" class="img-fluid">
                    </div>
                    <h6 class="text-center mb-0">Universitas Dipa Makassar</h6>
                    <p class="text-center mb-0">Prodi Teknik Informatika<br>Tahun 2022</p>
                </div>
            </div>
        </div>
    </div>
</div><?php

$template->footer();
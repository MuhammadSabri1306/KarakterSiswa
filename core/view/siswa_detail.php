<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 1;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Data Siswa</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<form method="post" action="<?=BASEDOMAIN?>/siswa/edit">
					<div class="form-row my-4">
						<div class="col">
							<label>Nama</label>
							<input type="text" class="form-control"  name="nama" id="nama" value="<?=$siswa['nama_siswa']?>">
							<p class="text-danger" id="error-nama"></p>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>NIS</label>
							<input type="text" class="form-control"  name="nis" id="nis" value="<?=$siswa['nis']?>">
							<p class="text-danger" id="error-nis"></p>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>Username</label>
							<input type="text" class="form-control"  name="user_name" id="user_name" value="<?=$siswa['username']?>">
							<p class="text-danger" id="error-user_name"></p>
						</div>
					</div>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<label class="input-group-text">Jenis Kelamin</label>
						</div>
						<div class="d-flex align-items-stretch">
							<div class="form-check form-check-inline ml-3">
								<input name="jenis_kelamin" type="radio" value="L" class="form-check-input" required=""<?=($siswa['jenis_kelamin'] == 'L' ? 'checked' : '')?>>
								<label class="form-check-label">Laki-laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input name="jenis_kelamin" type="radio" value="P" class="form-check-input" required=""<?=($siswa['jenis_kelamin'] == 'P' ? 'checked' : '')?>>
								<label class="form-check-label">Perempuan</label>
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>Usia</label>
							<input type="number" class="form-control"  name="usia" id="usia" value="<?=$siswa['usia']?>">
							<p class="text-danger" id="error-usia"></p>
						</div>
					</div>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<label class="input-group-text">Sekolah</label>
						</div>
						<div class="d-flex align-items-stretch">
							<div class="form-check form-check-inline ml-3">
								<input name="sekolah" type="radio" value="Negeri" class="form-check-input" required="" checked>
								<label class="form-check-label">Negeri</label>
							</div>
							<div class="form-check form-check-inline">
								<input name="sekolah" type="radio" value="Swasta" class="form-check-input" required="" disabled>
								<label class="form-check-label">Swasta</label>
							</div>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>Nama Orang Tua/Wali</label>
							<input type="text" class="form-control"  name="nama_orgtua" id="nama_orgtua" value="<?=$siswa['nama_orgtua']?>">
							<p class="text-danger" id="error-nama_orgtua"></p>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>No. Telepon/Whatsapp Orang Tua/Wali</label>
							<input type="telp" class="form-control"  name="telp_orgtua" id="nama_orgtua" value="<?=$siswa['telp_orgtua']?>">
							<p class="text-danger" id="error-telp_orgtua"></p>
						</div>
					</div>
					<div class="d-flex justify-content-center px-5">
						<a href="<?=BASEDOMAIN?>/siswa/" class="btn btn-secondary mr-3">Kembali</a>
						<button type="submit" name="edit" class="btn btn-success" value="<?=$siswa['id_user']?>">Simpan</button>
						<a href="<?=BASEDOMAIN?>/siswa/del/<?=$siswa['id_user']?>" onclick="return confirmDelete()" class="btn btn-danger ml-auto">Hapus Data</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php

$template->footer(TEMPLATE_SECTION_OPEN);

?><script type="text/javascript">	
function confirmDelete(){
    return confirm("Semua data latih akan dihapus. Lanjutkan?");
}
</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
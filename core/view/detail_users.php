<?php

$template = $this->getTemplate('MainTemplate');
$template->activeNav = 6;
$template->header();

?><div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="page-head-line">Edit User</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="container-fluid">
				<form method="post" action="<?=BASEDOMAIN?>/users/edit/<?=$user['id_user']?>" onsubmit="return validatePass()">
					<div class="form-row my-4">
						<div class="col">
							<label>Nama</label>
							<input type="text" class="form-control"  name="nama" id="nama" value="<?=$user['nama']?>" required>
							<p class="text-danger" id="error-nama"></p>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>Username</label>
							<input type="text" class="form-control"  name="user_name" id="user_name" value="<?=$user['username']?>" required>
							<p class="text-danger" id="error-user_name"></p>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>Masukkan Password</label>
							<input type="password" class="form-control"  name="pass1" id="pass1">
							<p class="text-danger" id="error-pass1"></p>
						</div>
					</div>
					<div class="form-row mb-4">
						<div class="col">
							<label>Masukkan Ulang Password</label>
							<input type="password" class="form-control"  name="pass2" id="pass2">
							<p class="text-danger" id="error-pass2"></p>
						</div>
					</div>
					<div class="d-flex justify-content-center px-5">
						<a href="<?=BASEDOMAIN?>/users/" class="btn btn-secondary mr-3">Kembali</a>
						<button type="submit" name="edit" class="btn btn-success" value="<?=$user['id_user']?>">Simpan</button>
						<a href="<?=BASEDOMAIN?>/users/del/<?=$user['id_user']?>" onclick="return confirmDelete()" class="btn btn-danger ml-auto">Hapus Data</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php

$template->footer(TEMPLATE_SECTION_OPEN);

?><script type="text/javascript">	
function confirmDelete(){
    return confirm("Data Pengguna akan dihapus. Lanjutkan?");
}

function validatePass(){
	const pass1 = document.getElementById("pass1"),
		pass2 = document.getElementById("pass2");

	if(pass1.value.length < 1 && pass2.value.length < 1)
		return true
	else if(pass1.value.length < 6){
		alert("Password harus minimal berisi 6 karakter");
		pass1.focus();
		return false;
	}

	if(pass1.value == pass2.value)
		return true;

	alert("Password tidak sama!");
	pass2.focus();
	return false;
}
</script><?php

$template->footer(TEMPLATE_SECTION_CLOSE);
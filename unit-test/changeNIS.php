<?php
/**
 * 
 */
class TableSiswa extends Controller
{
	public $db;

	public function __construct(){
		$this->use('Database');
		$this->db = new Database();
	}

	function getData(){
		$this->db->query('SELECT id, nis FROM data_siswa');
		return $this->db->resultSet();
	}

	function updateData($nis, $id){
		$this->db->query('UPDATE data_siswa, users SET data_siswa.nis=:nis, users.username=:nis, users.password=:nishash WHERE data_siswa.id=:id AND users.id_user=data_siswa.id_user');
		$this->db->bind('nis', $nis);
		$this->db->bind('nishash', password_hash($nis, PASSWORD_DEFAULT));
		$this->db->bind('id', $id);
		return $this->db->execute();
	}

	function getKelas($nis){
		if($nis[1] == '6'){
			return 6;
		}elseif($nis[1] == '7'){
			return 5;
		}
		return 20;
	}
}

$siswa = new TableSiswa();
$dataSiswa = $siswa->getData();
$kelas = 0;
$nisIndex = 0;

$update = true;
foreach($dataSiswa as $ds){
	if($kelas != $siswa->getKelas($ds['nis'])){
		$kelas = $siswa->getKelas($ds['nis']);
		$nisIndex = 1;
	}

	$newNIS = substr($ds['nis'], 0, -1) . strval($nisIndex);
	$nisIndex++;

	if($update && !$siswa->updateData($newNIS, $ds['id'])){
		$update = false;
	}
}

echo $update ? 'Success' : 'Failed';


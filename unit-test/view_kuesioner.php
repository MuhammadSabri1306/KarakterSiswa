<?php
/**
 * url: https://www.scribd.com/document/341152825/Tes-Kepribadian-Personality-Plus
 */
class Kuesioner extends Controller
{
	function getData(){
		$this->use('Database');
		$database = New Database();
		$database->query('SELECT * FROM data_soal ORDER BY id');
		$result = $database->resultSet();

		return $result;
	}
}

$kuesioner = new Kuesioner();
$data = $kuesioner->getData();

?><table border="1" cellpadding="10" style="border-spacing: 0;">
	<thead>
		<tr><th>No.</th><th>Keyword</th><th>Tipe Karakter</th><th>Kategori</th><th>Keterangan</th></tr>
	</thead>
	<tbody><?php

for($i=0; $i<count($data); $i++){

		?><tr>
			<td><?=$i+1?></td>
			<td><?=$data[$i]['keyword']?></td>
			<td><?=$data[$i]['tipe_karakter']?></td>
			<td><?=$data[$i]['kategori']?></td>
			<td><?=$data[$i]['keterangan']?></td>
		</tr><?php

}

	?></tbody>
</table>
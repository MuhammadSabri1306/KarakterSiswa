<?php
/**
 * 
 */
class Kuesioner extends Controller
{
	function getData(){
		$this->use('Database');
		$database = New Database();
		$database->query('SELECT * FROM data_soal');
		$result = $database->resultSet();

		return $result;
	}
}

$kuesioner = new Kuesioner();
$data = $kuesioner->getData();

?><table border="1" cellpadding="10" style="border-spacing: 0;">
	<thead>
		<tr><th>No.</th><th>A</th><th>B</th><th>C</th><th>D</th></tr>
	</thead>
	<tbody><?php

for($i=0; $i<count($data); $i++){

		?><tr>
			<td><?=$i+1?></td>
			<td><?=$data[$i]['pilihan_a']?></td>
			<td><?=$data[$i]['pilihan_b']?></td>
			<td><?=$data[$i]['pilihan_c']?></td>
			<td><?=$data[$i]['pilihan_d']?></td>
		</tr><?php

}

	?></tbody>
</table>
<?php
/**
 * 
 */
class Kuesioner extends Controller
{
	function getData(){
		$database = $this->call('Database');
		$database->query('SELECT * FROM data_soal');
		$result = $database->resultSet();

		return $result;
	}
}

$kuesioner = new Kuesioner();
$data = $kuesioner->getData();

?><table border="1" cellpadding="10" style="border-spacing: 0;">
	<tbody><?php

for($i=0; $i<count($data); $i++){

		?><tr>
			<td rowspan="5"><?=$i + 1?></td>
			<td>A</td>
			<td><?=$data[$i]['pilihan_a']?></td>
		</tr>
		<tr>
			<td>B</td>
			<td><?=$data[$i]['pilihan_b']?></td>
		</tr>
		<tr>
			<td>C</td>
			<td><?=$data[$i]['pilihan_c']?></td>
		</tr>
		<tr>
			<td>D</td>
			<td><?=$data[$i]['pilihan_d']?></td>
		</tr>
		<tr>
			<td>JAWABAN</td>
			<td></td>
		</tr><?php

}

	?></tbody>
</table>
<?php
/**
 * 
 */
class TrainingSet extends Controller
{
	function getData(){
		$database = $this->call('Database');
		$database->query('SELECT * FROM data_latih');
		$result = $database->resultSet();

		return $result;
	}
}

$trainingSet = new TrainingSet();
$data = $trainingSet->getData();

$tableHeading = array_keys($data[0]);

?><table border="1" cellpadding="10" style="border-spacing: 0;">
	<thead>
		<tr><?php

foreach($tableHeading as $th){

			?><th><?=$th?></th><?php

}

		?></tr>
	</thead>
	<tbody><?php

for($i=0; $i<count($data); $i++){

		?><tr><?php

	foreach($data[$i] as $td){

				?><td><?=$td?></td><?php

	}

		?></tr><?php

}

	?></tbody>
</table>
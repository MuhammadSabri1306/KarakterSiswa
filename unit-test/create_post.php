<?php

if(isset($_POST['test'])){
	var_dump($_POST['test']);
}

$_POST['test'] = 'TEST';
?>

<form method="post">
	<button type="submit">Submit</button>
</form>
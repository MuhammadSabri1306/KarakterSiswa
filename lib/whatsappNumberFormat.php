<?php

function whatsappNumberFormat($number){

	if(substr($number, 0, 1) == '0'){
		$number = substr_replace($number, '62', 0, 1);
	}

	if(substr($number, 0, 1) == '+'){
		$number = substr_replace($number, '', 0, 1);
	}

	return $number;
}
<?php
/**
 * Format the phone number string to consume Whatsapp API
 * @author Muhammad Sabri <muhammadsabri1306@gmail.com>
 * @param String $number - phoneNumber
 * @return String
 */
function whatsappNumberFormat($number){

	if(substr($number, 0, 1) == '0'){
		$number = substr_replace($number, '62', 0, 1);
	}

	if(substr($number, 0, 1) == '+'){
		$number = substr_replace($number, '', 0, 1);
	}

	return $number;
}
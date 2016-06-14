<?php
require_once('refresh.php');
$token_json = refresh();
$token_array = json_decode($token_json, true);

$bearer = $token_array['access_token'];
$str_bearer = 'Authorization: Bearer '.$bearer;
$url_base = 'https://www.googleapis.com/calendar/v3';

$url = $url_base.'/'.'users/me/calendarList';

$curl = curl_init($url);
$options = [
	CURLOPT_HTTPHEADER => [
		$str_bearer
	],
	CURLOPT_HTTPGET => true,
	CURLOPT_RETURNTRANSFER => true,
];
curl_setopt_array($curl, $options);

$result = curl_exec($curl);


$dob = json_decode($result); // decoded object
print_r($dob);


<?php
require_once('refresh.php');

$q = $argv[1];
$min = $argv[2];
$max = $argv[3];

$token_json = refresh();
$token_array = json_decode($token_json, true);

$bearer = $token_array['access_token'];
$str_bearer = 'Authorization: Bearer '.$bearer;
$url_base = 'https://www.googleapis.com/calendar/v3';

$cal_id = 'primary';
$service = 'calendars';
$operation = 'events';

$encoded_q = urlencode($q);
$str_q = 'q='.$encoded_q;

$encoded_min = urlencode($min);
$str_min = 'timeMin='.$encoded_min;

$encoded_max = urlencode($max);
$str_max = 'timeMax='.$encoded_max;

$url = $url_base.'/'.$service.'/'.$cal_id.'/'.$operation.'?'.$str_q.'&'.$str_max.'&'.$str_min;

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

$items = $dob->items;
foreach ($items as $item) {
  print $item->summary . ' ' . $item->start->dateTime . ' ' .$item->id . "\n";
}

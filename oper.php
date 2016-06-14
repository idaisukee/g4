<?php 
require_once('refresh.php');
require_once('calendar_id.php');

function oper($array)
{
	$q = $array['q'];
	$min = $array['min'];
	$max = $array['max'];
	$calendar_name = $array['calendar_name'];
	$service = $array['service'];
	$operation = $array['operation'];
	$http_method = $array['http_method'];
	$id = $array['id'];

	$query = http_build_query(
		[
			'q' => $q,
			'timeMin' => $min,
			'timeMax' => $max,
		]
	);
	
	$calendar_id = calendar_id($calendar_name);

	$token_json = refresh();
	$token_array = json_decode($token_json, true);
	$bearer = $token_array['access_token'];
	$str_bearer = 'Authorization: Bearer '.$bearer;

	$url_base = 'https://www.googleapis.com/calendar/v3';
	$url_address = implode('/', [$url_base, $service, $calendar_id, $operation]);
	if (isset($id)) {
		$url_address = implode('/', [$url_address, $id]);
	}
	
	if (isset($query)) {
		$url = $url_address.'?'.$query;
	} else {
		$url = $url_address;
	}
	
	$curl = curl_init($url);
	$options = [
		CURLOPT_HTTPHEADER => [
			$str_bearer
		],
		CURLOPT_CUSTOMREQUEST => $http_method,
		CURLOPT_RETURNTRANSFER => true,
	];
	curl_setopt_array($curl, $options);

	$result = curl_exec($curl);
	return $result;
}

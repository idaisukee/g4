<?php
require_once('oper.php');

$options = getopt('n:i:');
$calendar_name = $options['n'];
$id = $options['i'];

$result = oper(
	[
		'service' => 'calendars',
		'id' => $id,
		'calendar_name' => $calendar_name,
		'operation' => 'events',
		'http_method' => 'DELETE',
	]
);
$dob = json_decode($result); // decoded object
print_r($dob);


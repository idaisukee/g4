<?php 

function calendar_id($calendar_name)
{
	$json = file_get_contents('constants/calendar_id.json');
	$hash = json_decode($json, true);
	return $hash[$calendar_name];
}

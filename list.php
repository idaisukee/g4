<?php
require_once('refresh.php');
$q = $argv[1];
$min = $argv[2];
$max = $argv[3];
$token_json = refresh();
$token_array = json_decode($token_json, true);
$bearer = $token_array['access_token'];
$str_bearer = '"Authorization: Bearer '.$bearer.'"';
$url_base = 'https://www.googleapis.com/calendar/v3';
$cal_id = 'primary';
$resource = 'calendars';
$item = 'events';
$encoded_q = urlencode($q);
$str_q = 'q='.$encoded_q;
$encoded_min = urlencode($min);
$str_min = 'timeMin='.$encoded_min;
$encoded_max = urlencode($max);
$str_max = 'timeMax='.$encoded_max;


$str = 'curl -s -H '.$str_bearer.' '."'".$url_base.'/'.$resource.'/'.$cal_id.'/'.$item.'?'.$str_q.'&'.$str_max.'&'.$str_min."'";

$obj = shell_exec($str);

$dob = json_decode($obj); // decoded object
$items = $dob->items;
foreach ($items as $item) {
    print $item->summary . ' ' . $item->start->dateTime . ' ' .$item->id . "\n";
}

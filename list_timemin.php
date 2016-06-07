<?php
$token_json = shell_exec('sh reflesh.sh');
//        print_r($token_json);
$token_array = json_decode($token_json, true);
//        print_r($token_array);
$bearer = $token_array['access_token'];

$timeMin = $argv[1];
$encoded_timeMin = urlencode($timeMin);
print $encoded_timeMin;
print "\n";


$str = 'curl -s -H "Authorization: Bearer '. $bearer . '" https://www.googleapis.com/calendar/v3/calendars/primary/events' . '?timeMin=' . $encoded_timeMin;
print $str;
print "\n";
$obj = shell_exec($str);

$dob = json_decode($obj); // decoded object
$items = $dob->items;
foreach ($items as $item) {
    print $item->summary . ' ' . $item->start->dateTime . ' ' .$item->id . "\n";
}

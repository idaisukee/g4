<?php
$token_json = shell_exec('sh reflesh.sh');
//        print_r($token_json);
$token_array = json_decode($token_json, true);
//        print_r($token_array);
$bearer = $token_array['access_token'];

$str = 'curl -H "Authorization: Bearer '. $bearer . '" https://www.googleapis.com/calendar/v3/calendars/primary/events';
print $str;
$obj = shell_exec($str);

$dob = json_decode($obj); // decoded object
$items = $dob->items;
foreach ($items as $item) {
    print $item->summary . ' ' . $item->start->dateTime . ' ' .$item->id . "\n";
}

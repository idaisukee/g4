<?php
$token_json = shell_exec('sh reflesh.sh');
//        print_r($token_json);
$token_array = json_decode($token_json, true);
//        print_r($token_array);
$bearer = $token_array['access_token'];
$id = trim(fgets(STDIN));

$str = 'curl -s -H "Authorization: Bearer '. $bearer . '" https://www.googleapis.com/calendar/v3/calendars/primary/events/' . $id;
print $str;
print "\n";
$obj = shell_exec($str);

$dob = json_decode($obj); // decoded object
print $dob->id . ' ' . $dob->summary . ' ' . $dob->start->dateTime . ' ' . $dob->end->dateTime;
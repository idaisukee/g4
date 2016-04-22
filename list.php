<?php

$bearer = exec('cat constants/bearer');
$str = 'curl -H "Authorization: Bearer '. $bearer . '" https://www.googleapis.com/calendar/v3/calendars/primary/events';
print $str;
$obj = shell_exec($str);

$dob = json_decode($obj); // decoded object
print_r($dob->items[0]->summary);

<?php
require_once('oper.php');

$options = getopt('q:m:M:n:');
$q = $options['q'];
$min = $options['m'];
$max = $options['M'];
$calendar_name = $options['n'];

$result = oper(
	[
		'q' => $q,
		'min' => $min,
		'max' => $max, 
		'service' => 'calendars',
		'calendar_name' => $calendar_name,
		'operation' => 'events',
		'http_method' => 'GET',
	]
);

$dob = json_decode($result); // decoded object

$items = $dob->items;
foreach ($items as $item) {
    if(isset($item->start->dateTime)){
        $str = 'echo '.$item->start->dateTime.' | ruby $SRC/rdatetime/gc_to_rc_ajd.rb';
        $rd_start = rtrim(shell_exec($str));
    } else {
        $rd_start = null;
    }
  print $rd_start . ' ' . $item->summary . "\n";
}

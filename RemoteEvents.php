<?php 
require_once('oper.php');

class RemoteEvents
{

	function __construct($options)
	{

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
		$this->dob = $dob;
		print_r($this->dob);
	}

	function simple_list()
	{

		$dob = $this->dob;
		print_r($dob);
		$items = $dob->items;
		foreach ($items as $item) {
			print $item->summary . ' ' . $item->start->dateTime . ' ' .$item->id . "\n";
		}
	}



}

?>

<?php
require_once('oper.php');

// oper をそのまま利用するため， calendar_name が me とか変な擬制をする．
$result = oper(
	[
		'service' => 'users',
		'calendar_name' => 'me',
		'operation' => 'calendarList',
		'http_method' => 'GET',
	]
);

$dar = json_decode($result, true); // decoded array

$items = $dar['items'];
foreach ($items as $k => $item) {
	$summary = $item['summary'];
	$id = $item['id'];
	$out[$summary] = $id;
}
// json に改行を入れる．日本語を日本語のまま出力する．
$json = json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo $json;

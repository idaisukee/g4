<?php 

$json = file_get_contents('constants/client_secret.json');
$array = json_decode($json);


echo $client_id = $array->installed->client_id;
echo "\n";
echo $client_secret = $array->installed->client_secret;


<?php

require('LectureLine.php');

$filename = '/home/daisuke/dat/med/2015_3_2.csv';
//$filename = '/tmp/bi.csv';
if(is_readable($filename)) {
    $lines = file($filename);
    foreach ($lines as $line) {
        if (0 === preg_match('/^#/', $line)) {
            $line_object = new LectureLine(trim($line));
            $line_objects[] = $line_object;
        }
    }
}
//print_r($line_objects->to_event()->insert());

foreach($line_objects as $o) {
    print_r($o);
    print_r($o->to_lecture()->to_event()->insert());
}
<?php

require('LectureLine.php');

$line = trim(fgets(STDIN));
if (0 === preg_match('/^#/', $line)) {
    $lecture_line = new LectureLine($line);
}

$lecture = $lecture_line->to_lecture();
$event = $lecture->to_event();
print_r($event);
print_r($event->to_json());
//$event->insert();
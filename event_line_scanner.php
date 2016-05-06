<?php

require('EventLine.php');

$line = trim(fgets(STDIN));
if (0 === preg_match('/^#/', $line)) {
    $event_line = new EventLine($line);
}

$event = $event_line->to_event();
$event->insert();
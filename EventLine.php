<?php

require ('Event.php');
class EventLine {
    function calendar_id($calendar_name) {
        $json = shell_exec('cat constants/calendar_id.json');
        $hash = json_decode($json, true);
        return $hash[$calendar_name];
        
    }

    function to_event() {
        $event = new Event($this->year, $this->month, $this->day, $this->start_time, $this->finish_time, $this->title, $this->calendar_id);
        return $event;
    }

    function __construct($line) {
        $cols =  explode(',', $line);
        $year = $cols[0];
        $month = $cols[1];
        $day = $cols[2];
        $start_time = $cols[3];
        $finish_time = $cols[4];
        $title = $cols[5];
        $calendar_name = $cols[6];
        $calendar_id = self::calendar_id($calendar_name);

        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->start_time = $start_time;
        $this->finish_time = $finish_time;
        $this->title = $title;
        $this->calendar_name = $calendar_name;
        $this->calendar_id = $calendar_id;
    }
}


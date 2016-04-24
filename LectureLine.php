<?php
require ('Lecture.php');

class LectureLine {
    function calendar_id($calendar_name) {
        $json = shell_exec('cat constants/calendar_id.json');
        $hash = json_decode($json, true);
        return $hash[$calendar_name];

    }

    function to_lecture() {
        $lecture = new Lecture($this->year, $this->month, $this->day, $this->frame, $this->subject, $this->th, $this->calendar_id);
        return $lecture;
    }

    function __construct($line) {
        $cols =  explode(',', $line);
        $year = $cols[0];
        $month = $cols[1];
        $day = $cols[2];
        $frame = $cols[3];
        $subject = $cols[4];
        $th = $cols[5];
        $calendar_name = $cols[6];
        $calendar_id = self::calendar_id($calendar_name);

        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->frame = $frame;
        $this->subject = $subject;
        $this->th = $th;
        $this->calendar_name = $calendar_name;
        $this->calendar_id = $calendar_id;
    }
}


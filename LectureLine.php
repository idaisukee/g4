<?php
require ('Lecture.php');

class LectureLine {
    function calendar_id($calendar_name) {
        $json = shell_exec('cat constants/calendar_id.json');
        $hash = json_decode($json, true);
        return $hash[$calendar_name];
    }

    function to_lecture() {
        $lecture = new Lecture($this->year, $this->month, $this->day, $this->frame, $this->subject, $this->content, $this->teacher_section, $this->teacher_rank, $this->teacher_name, $this->calendar_id);
        return $lecture;
    }

    function __construct($line) {
        $cols =  explode(',', $line);
        $subject = $cols[0];
        $month = $cols[1];
        $day = $cols[2];
        $frame = $cols[3];
        $content = $cols[4];
        $teacher_section = $cols[5];
        $teacher_rank = $cols[6];
        $teacher_name $cols[7]

        $this->year = '2016';
        $this->subject = $subject;
        $this->month = $month;
        $this->day = $day;
        $this->frame = $frame;
        $this->content = $content;
        $this->teacher_section = $teacher_section;
        $this->teacher_rank = $teacher_rank;
        $this->teacher_name = $teacher_name;
        $this->calendar_name = '2016e4';
        $this->calendar_id = self::calendar_id($this->calendar_name);
    }
}


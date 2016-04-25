<?php

require('Event.php');
/*
# year,month,day,frame,subject,th
2015,10,22,2,mp2,1

といふ csv から gcal api で扱へる data を吐く．
 */

function start($frame) {
    if ($frame === '1')
        $output = '08:45';
    if ($frame === '2')
        $output =  '10:30';
    if ($frame === '3')
        $output =  '13:00';
    if ($frame === '4')
        $output =  '14:45';
    if ($frame === '5')
        $output = '16:30';
    return $output;
}

function finish($frame) {
    $start_str = '1000-10-10 ' . start($frame);
    $start = new DateTime($start_str);
    $finish = $start->add(DateInterval::createFromDateString('1hour 30min'));
    $output = $finish->format('H:i');
    return $output;
}


class Lecture {

    public $year;
    public $month;
    public $day;
    public $frame;
    public $subject;
    public $teacher_name;
    public $teacher_rank;
    public $teacher_section;
    public $content;
    public $detail;

    
    public $start;
    public $finish;

    
    function to_event() {
        $event = new Event($this->year, $this->month, $this->day, $this->start_time, $this->finish_time, $this->subject, $this->detail, $this->calendar_id);
        return $event;
    }

    function __construct($year, $month, $day, $frame, $subject, $content, $teacher_section, $teacher_rank, $teacher_name, $calendar_id) {
        $start_time = start($frame);
        $finish_time = finish($frame);

        $start = $year . '-' . $month . '-' . $day . ' ' . $start_time;
        $finish = $year . '-' . $month . '-' . $day . ' ' . $finish_time;
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->start_time = $start_time;
        $this->finish_time = $finish_time;
        $this->start = $start;
        $this->finish = $finish;
        $this->subject = $subject;
        $this->content = $content;
        $this->teacher_section = $teacher_section;
        $this->teacher_rank = $teacher_rank;
        $this->teacher_name = $teacher_name;
        $this->detail = $content . '\n' . $teacher_section . '\n' . $teacher_rank . '\n' . $teacher_name;
        $this->calendar_id = $calendar_id;
    }
}


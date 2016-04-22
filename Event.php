class Event {
    function __construct($year, $month, $day, $start_time, $finish_time, $title, $detail, $calendar_id) {

        $start = $year . '-' . $month . '-' . $day . ' ' . $start_time;
        $finish = $year . '-' . $month . '-' . $day . ' ' . $finish_time;
        $dt_start = new DateTime($start);
        $dt_start_c = $dt_start->format('c');
        $dt_finish = new DateTime($finish);
        $dt_finish_c = $dt_finish->format('c');
        $this->dt_start_c = $dt_start_c;
        $this->dt_finish_c = $dt_finish_c;
        $this->start = $start;
        $this->finish = $finish;
        $this->title = $title;
        $this->detail = $detail;
        $this->calendar_id = $calendar_id;
    }
}

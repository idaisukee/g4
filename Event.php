<?php
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

    function to_array() {
        $array = [
            "start" => [
                "dateTime" => $this->dt_start_c,
            ],
            "end" => [
                "dateTime" => $this->dt_finish_c,
            ],
            "summary" => $this->title,
            "description" => $this->detail,
        ];

        return $array;
    }

    function to_json() {
        $json = json_encode($this->to_array(), JSON_UNESCAPED_UNICODE);
        return $json;
    }

    function insert() {
        $token_json = shell_exec('sh reflesh.sh');
        //        print_r($token_json);
        $token_array = json_decode($token_json, true);
        //        print_r($token_array);
        $bearer = $token_array['access_token'];
        //print_r($bearer);
        $escaped_json = str_replace('"', '\"',$this->to_json());
        $endpoint = 'https://www.googleapis.com/calendar/v3/calendars/' . $this->calendar_id .  '/events';
        $command = 'curl -v -H "Accept: application/json" -H "Content-type: application/json" -H "Authorization: Bearer ' . $bearer . '" -X POST -d "' . $escaped_json . '" ' . $endpoint;


        echo $command;
        shell_exec($command);

        print_r($this);



    }

}

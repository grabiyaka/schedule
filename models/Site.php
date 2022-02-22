<?php

namespace models;

use components\Db;
use components\Router;

class Site
{

    public $array;

    public function __construct()
    {
        $this->db = new Db;
        $this->db = $this->db->getConnection();
        $this->router = new Router;
    }

    public function removeDuplicate($schedules, $value)
    {
        foreach($schedules as $schedule){
            $array[] = $schedule[$value];
        }
        $array = array_unique($array);
        foreach($schedules as $key => $schedule){
            if(in_array($schedule[$value], $array)){
                $array = array_flip($array);
                unset($array[$schedule[$value]]);
                $array = array_flip($array);
            } else{
                unset($schedules[$key]);
            }
        }
        return $schedules;
    }

    public function getWeek($dateUri)
    {
        $date = strtotime($dateUri);
        if(date('w', $date) == 1){
            $date = strtotime("monday $dateUri");
        } else{
            $date = strtotime("last monday $dateUri");
        }
       
        //$date = $dateUri;
        $array = [];
        for($i = 1;$i < 7;$i++) {
            $array[] = date("Y-m-d", $date); 
            $date = strtotime('+1 day', $date);
        } return $array;
    }

    public function getCurrentWeek($current_schedules, $events)
    {
        $array = [];

        foreach($current_schedules as $key => $items){
            $date = $items[0]['date'];
            for($i = 0;$i <= count($items); $i++){
                unset($items[$i]['date']);
            }
            foreach($items as $key => $item){
                $items[$key]['event'] = $events[$item['event_id'] - 1];
            }
            $items['date'] = $date;
           $array[] = $items; 
        }
        $this->array = $array;
        return $array;
    }


    public function selectAllFrom($table)
    {
        return $this->router->stdToArray(json_decode($this->db->q(" SELECT * FROM $table ")->json()));
    }

    public function getAllEventsForWeek($thisWeek)
    {
        $array = [];
        foreach($thisWeek as $date){
            $array[] = $this->router->stdToArray(json_decode($this->db->q(" SELECT * FROM schedule WHERE date = '$date' ")->json()));
        }
        return $array;
    }

    public function deleteEmptyArrays($array)
    {
        $array = array_filter($array, function($element) {
            return !empty($element);
        });
        return $array;
    }

    public function getLinks()
    {
        $linkSchedules = $this->selectAllFrom('schedule');
        $array = [];
        foreach($linkSchedules as $item){
            $date = strtotime("last monday ".$item['date']);
            $date = date("Y-m-d", $date);
            $array[] = $date;
        }
        $linkSchedules = array_unique($array);
        return $linkSchedules;
    }
}
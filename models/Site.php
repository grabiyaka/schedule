<?php

namespace models;

class Site
{

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
}
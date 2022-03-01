<?php 

use models\Site;

class SiteController
{  

    public function actionIndex($year, $mounth, $day)
    {
    
        $site = new Site;
        
        $dateUri = date( "$year-$mounth-$day");

        $_SESSION['date'] = $dateUri;

        $thisWeek = $site->getWeek($dateUri);

        //Достаём всё из бд
        $schedules = $site->selectAllFrom('schedule');
        $events = $site->selectAllFrom('events');

        //$schedules = $site->removeDuplicate($schedules, 'date');

        $schedules = $site->getLinks();
        
        $current_schedules = $site->getAllEventsForWeek($thisWeek);
        //Удаляем пустые массивы
        $current_schedules = $site->deleteEmptyArrays($current_schedules);

        $array = $site->getCurrentWeek($current_schedules, $events);

        $lang = 'ru';
        $days = include ROOT . '/config/days.php';

        require_once ROOT . '/views/site/index.php';

        return true;

    }

    public function actionForwarding()
    {

        $date = date('Y-m-d');
        header("Location: ".HREF."$date");

        return true;

    }

}
<?php 

use components\Db;
use components\Router;
use models\Site;

class AdminController
{

    public function actionIndex()
    {

        $site = new Site;

        $schedules = $site->getLinks();

        $lang = 'ru';
        $days = include ROOT . '/config/days.php';

        require_once ROOT .  "/views/admin/index.php";

        return true;

    }
    
    public function actionSchedule($year, $mounth, $day)
    {

        $site = new Site;
        
        $dateUri = date( "$year-$mounth-$day");
        $thisWeek = $site->getWeek($dateUri);

        //Достаём всё из бд
        $schedules = $site->selectAllFrom('schedule');
        $events = $site->selectAllFrom('events');

        $schedules = $site->getLinks();
        
        $current_schedules = $site->getAllEventsForWeek($thisWeek);
        //Удаляем пустые массивы
        $current_schedules = $site->deleteEmptyArrays($current_schedules);

        $array = $site->getCurrentWeek($current_schedules, $events);

        $lang = 'ru';
        $days = include ROOT . '/config/days.php';

        require_once ROOT .  "/views/admin/index.php";

        return true;

    }

}
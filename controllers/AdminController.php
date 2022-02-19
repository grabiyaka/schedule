<?php 

use models\Site;
use models\User;

class AdminController
{

    public function __construct()
    {
        $this->user = new User;
    }

    public function actionIndex()
    {
        $this->user->checkUser();
    
        $site = new Site;

        $schedules = $site->getLinks();

        $lang = 'ru';
        $days = include ROOT . '/config/days.php';

        require_once ROOT .  "/views/admin/index.php";

        return true;

    }
    
    public function actionSchedule($year, $mounth, $day)
    {

        $this->user->checkUser();

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
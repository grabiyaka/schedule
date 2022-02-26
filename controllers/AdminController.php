<?php 

use models\Site;
use models\User;
use models\Admin;
use components\Db;

class AdminController
{

    public function __construct()
    {
        $this->user = new User;
        $this->admin = new Admin;
        $this->db = new Db;
        $this->site = new Site;
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

        // if(isset($_POST['submit'])){
        //     $responsible[] = $_POST['responsible'];
        //     $id[] = $_POST['id'];
        //     $event[] = $_POST['event'];

        //     d($responsible);

        //     //$this->admin->update($responsible, $event, $id);
        // }

        $site = new Site;
        
        $dateUri = date( "$year-$mounth-$day");

        $_SESSION['date'] = $dateUri;
    
        $thisWeek = $site->getWeek($dateUri);

        //Достаём всё из бд
        $schedules = $site->selectAllFrom('schedule');
        $events = $site->selectAllFrom('events');

        $schedules = $site->getLinks();
        
        $current_schedules = $site->getAllEventsForWeek($thisWeek);
        //Удаляем пустые массивы
        $current_schedules = $site->deleteEmptyArrays($current_schedules);

        $array = $site->getCurrentWeek($current_schedules, $events);

        $_SESSION['array'] = $array;

        $lang = 'ru';
        $days = include ROOT . '/config/days.php';

        require_once ROOT .  "/views/admin/index.php";

        return true;

    }

}
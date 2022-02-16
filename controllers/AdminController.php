<?php 

use components\Db;
use components\Router;
use models\Site;

class AdminController
{

    public function actionIndex()
    {

        $db = new Db;
        $site = new Site;
        $router = new Router;
        
        $db = $db->getConnection();

        $linkSchedules = $router->stdToArray(json_decode($db->q("SELECT * FROM schedule")->json()));
        $array = [];
        foreach($linkSchedules as $item){
            $array[] = $item['date'];
        }
        $linkSchedules = array_unique($array);


        require_once ROOT .  "/views/admin/index.php";

        return true;

    }
    
    public function actionSchedule($year, $mounth, $day)
    {

        //Подключение дб
        $db = new Db;
        $site = new Site;
        $router = new Router;
        
        $db = $db->getConnection();

        $linkSchedules = $router->stdToArray(json_decode($db->q("SELECT * FROM schedule")->json()));
        $array = [];
        foreach($linkSchedules as $item){
            $array[] = $item['date'];
        }
        $linkSchedules = array_unique($array);

        $date = date('Y-m-d');
        $dateUri = date( "$year-$mounth-$day");

        $schedules = $router->stdToArray(json_decode($db->q(" SELECT * FROM schedule ")->json()));

        $schedules = $site->removeDuplicate($schedules, 'date');

        $events = $router->stdToArray(json_decode($db->q(" SELECT * FROM events ")->json()));
        $current_schedules = $router->stdToArray(json_decode($db->q(" SELECT * FROM schedule WHERE date = '$dateUri' ")->json()));

        $array = [];
        $lang = 'ru';
        $lang = 'ru';

        $days = include ROOT . '/config/days.php';

        require_once ROOT .  "/views/admin/index.php";

        return true;

    }

}
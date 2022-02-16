<?php 

use components\Db;
use components\Router;
use models\Site;

class SiteController
{  

    public function actionIndex($year, $mounth, $day)
    {
        //Подключение дб
        $db = new Db;
        $site = new Site;
        $router = new Router;
        
        $db = $db->getConnection();

        $date = date('Y-m-d');
        $dateUri = date( "$year-$mounth-$day");

        $schedules = $router->stdToArray(json_decode($db->q(" SELECT * FROM schedule ")->json()));
        //$schedules = array_unique($schedules);

        $schedules = $site->removeDuplicate($schedules, 'date');

        $events = $router->stdToArray(json_decode($db->q(" SELECT * FROM events ")->json()));
        $current_schedules = $router->stdToArray(json_decode($db->q(" SELECT * FROM schedule WHERE date = '$dateUri' ")->json()));

        
        // usort($events, function ($a, $b) {
        //     return strtotime($a['time']) - strtotime($b['time']);
        // });

        $array = [];
        $lang = 'ru';
        $days = include ROOT . '/config/days.php';

        require_once ROOT . '/views/site/index.php';

        return true;

    }

    public function actionForwarding()
    {

        $date = date('Y-m-d');
        header("Location: http://localhost/schedule/$date");

        return true;

    }

}
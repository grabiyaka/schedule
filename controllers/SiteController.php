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
        $dateUri = date( "$year-$mounth-$day");
        $thisWeek = [];

        $date = strtotime("last monday $dateUri");
        for($i = 1;$i < 7;$i++) {
            $thisWeek[] = date("Y-m-d", $date); 
            $date = strtotime('+1 day', $date);
        } 

        $schedules = $router->stdToArray(json_decode($db->q(" SELECT * FROM schedule ")->json()));
        //$schedules = array_unique($schedules);

        $schedules = $site->removeDuplicate($schedules, 'date');

        $events = $router->stdToArray(json_decode($db->q(" SELECT * FROM events ")->json()));
        foreach($thisWeek as $date){
            $current_schedules[] = $router->stdToArray(json_decode($db->q(" SELECT * FROM schedule WHERE date = '$date' ")->json()));
        }
        //Удаляем пустые массивы
        $current_schedules = array_filter($current_schedules, function($element) {
            return !empty($element);
        });

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

        echo "<hr>";
        //dd($array);
        
        // usort($events, function ($a, $b) {
        //     return strtotime($a['time']) - strtotime($b['time']);
        // });

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
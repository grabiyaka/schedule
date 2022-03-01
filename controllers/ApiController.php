<?php

use components\Db;
use models\User;
use models\Site;

class ApiController
{

    public function __construct()
    {
        $db = new Db;
        $this->getConnection = $db->getConnection();

        $this->user = new User;
        $this->pc = $db->postCheck();

        $this->site = new Site;
    }

    public function actionGet_events()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo $this->getConnection->q("SELECT * FROM events")->json();
        } else{
            header('Location: '.HREF);
        }

        return true;
    }
    public function actionGet_schedule()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo $this->getConnection->q("SELECT * FROM schedule")->json();
        } else{
            header('Location: '.HREF);
        }
    
        return true;
    }
    public function actionGet_current_week()
    {

        $site = $this->site;

        $thisWeek = $site->getWeek($_SESSION['date']);

        $current_schedules = $site->getAllEventsForWeek($thisWeek);
        $current_schedules = $site->deleteEmptyArrays($current_schedules);
        $events = $site->selectAllFrom('events');

        $array = $site->getCurrentWeek($current_schedules, $events);

        
        echo json_encode($array);

        return true;

    }

    public function actionAdd_shedule()
    {

        $responsible = $_POST['responsible'];
        $date = $_POST['date'];
        $event = $_POST['event'];
        $this->getConnection->q("INSERT INTO `schedule` (`responsible`, `date`, `event_id`) VALUES ('$responsible', '$date', '$event') ");
        header("Location: ".HREF."admin");

        return true;

    }

    public function actionUpdate_schedule()
    {

        $post = $this->pc;

        //echo json_encode($post);

        $this->getConnection->q("UPDATE schedule SET `".$post['name']."` = '".$post['value']."' WHERE `id` = '".$post['id']."' ");

        return true;

    }

    public function actionDelete_schedule()
    {
       
        $post = $this->pc;

        $this->getConnection->q("DELETE FROM schedule WHERE `id` = '".$post['id']."' ");

        echo $this->getConnection->q("SELECT * FROM schedule")->json();

        return true;

    }

    public function actionGetDays()
    {
        $days = include('config/days.php');
        echo json_encode($days);
        return true;
    }
    
}
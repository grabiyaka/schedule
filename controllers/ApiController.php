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
            header('Location: http://localhost/schedule');
        }

        return true;
    }
    public function actionGet_schedule()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo $this->getConnection->q("SELECT * FROM schedule")->json();
        } else{
            header('Location: http://localhost/schedule');
        }
    
        return true;
    }
    public function actionGet_current_week()
    {
        
        echo json_encode($_SESSION['array']);

        return true;

    }

    public function actionAdd_shedule()
    {

        $responsible = $_POST['responsible'];
        $date = $_POST['date'];
        $event = $_POST['event'];
        $this->getConnection->q("INSERT INTO `schedule` (`responsible`, `date`, `event_id`) VALUES ('$responsible', '$date', '$event') ");
        header("Location: http://localhost/schedule/admin");

        return true;

    }

    public function actionUpdate_schedule()
    {

        $post = $this->pc;

        echo json_encode($post);

    }
    
}
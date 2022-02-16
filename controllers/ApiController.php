<?php

use components\Db;

class ApiController
{

    public function __construct()
    {
        $db = new Db;
        $this->getConnection = $db->getConnection();
    }

    public function actionGet_events()
    {

        echo $this->getConnection->q("SELECT * FROM events")->json();

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

    public function actionGet_schedule()
    {

        echo $this->getConnection->q("SELECT * FROM schedule")->json();

        return true;

    }
    
}
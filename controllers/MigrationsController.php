<?php 

use models\Migrations;

class MigrationsController
{

    public function actionGetAllMigrations()
    {

        $mg = new Migrations;

        $mg->createEvents();
        $mg->createSchedule();
        $mg->createUsers();

    }

}
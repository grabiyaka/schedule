<?php

namespace models;

use components\Db;

class Admin
{

    public function __construct()
    {
        $db = new Db;
        $this->db = $db->getConnection();
    }

    public function update($responsible, $event, $id)
    {

        $this->db->q("UPDATE `schedule` SET `responsible` = '$responsible', `event_id` = '$event' WHERE `id` = $id ");

    }

}
<?php 

namespace models;

use components\Db;

class Migrations
{

    public function __construct()
    {
        $db = new Db;
        $this->db = $db->getConnection();
    }

    public function createEvents()
    {

        $this->db->q("CREATE TABLE `events` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `day` int(1) unsigned NOT NULL,
            `time` time NOT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;");

    }

    public function createSchedule()
    {

        $this->db->q("CREATE TABLE `schedule` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `event_id` int(10) unsigned NOT NULL,
            `responsible` varchar(255) NOT NULL,
            `date` date NOT NULL,
            PRIMARY KEY (`id`),
            KEY `event_id_fk` (`event_id`),
            CONSTRAINT `event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;");
    }

    public function createUsers()
    {

        $this->db->q("CREATE TABLE `users` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `login` varchar(255) DEFAULT NULL,
            `password` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;");
    }

}
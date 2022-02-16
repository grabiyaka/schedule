<?php

namespace components;

use MySQLi;
use MySQLi_Result;

class myDB extends MySQLi
{
    public function q($query)
    {
        $this->real_query($query);
        return new myDB_Result($this);
    }
}

class myDB_Result extends MySQLi_Result
{
    public function json(){
		$output = [];
		while ($row = $this->fetch_assoc()){
			$output[] = $row;
		}
		return json_encode($output, JSON_UNESCAPED_UNICODE);

    }
}

class Db
{
    public function __construct()
    {
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);
        $this->params = $params;
    }

    public function getConnection()
    {
        $params = $this->params;
        $db = new myDB($params['host'], $params['user'], $params['password'], $params['dbname']);
        $db->set_charset("utf8mb4");
        
        return $db;
    }
    public function postCheck()
    {
        $post = [];   
        foreach (array_keys($_POST) as $filed){
            $post[$filed] = $_POST[$filed] ? $_POST[$filed] : false;
        }
        return $post;
    }
}
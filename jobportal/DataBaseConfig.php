<?php

class DataBaseConfig
{
    public $servername;
    public $username;
    public $password;
    public $databasename;

    public function __construct()
    {

        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->databasename = 'graduatetracer';

        
        // $this->servername = 'localhost';
        // $this->username = 'u523111758_UCUGradTracer';
        // $this->password = 'CrisObosa21';
        // $this->databasename = 'u523111758_ucugraduated';


    }
}

?>

<?php 

class BaseModel 
{
    public $dbConnection;

    public function __construct()
    {
        $this->dbConnection = dbConnection();
    }

}
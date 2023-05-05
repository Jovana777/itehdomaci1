<?php

class Nastavnik{

    public $id;   
    public $imePrezime;   

    public function __construct($id=null, $imePrezime=null)
    {
        $this->id = $id;
        $this->imePrezime = $imePrezime;
    }

    public static function getAll(Broker $broker)
    {
        $query = "SELECT * FROM nastavnik";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker)
    {
        $query = "SELECT * FROM nastavnik WHERE id=$id";
        return $broker->executeQuery($query);
    }
}

?>
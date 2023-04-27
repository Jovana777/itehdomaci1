<?php
class Termin {

    public $id;   
    public $jezik;   
    public $klijent;   
    public $datum;   
    public $ucionica;

    public function __construct($id=null, $jezik=null, $klijent=null, $datum=null,  $ucionica=null)
    {
        $this->id = $id;
        $this->jezik = $jezik;
        $this->klijent = $klijent;
        $this->ucionica = $ucionica;
        $this->datum = $datum;
    }


    public static function getAll(Broker $broker)
    {
        $query = "SELECT t.*, u.naziv as jezik_naziv FROM termin t INNER JOIN jezik u on (t.jezik=u.id)";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker){
        $query = "SELECT * FROM termin WHERE id=$id";
        return $broker->executeQuery($query);
    }

    public static function getAllByJezik($id,Broker $broker){
        $query = "SELECT * FROM termin WHERE jezik=$id";
        return $broker->executeQuery($query);
    }

    public function deleteById(Broker $broker)
    {
        $query = "DELETE FROM termin WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public function update(Termin $termin, Broker $broker)
    {
        $query = "UPDATE termin set jezik = $termin->jezik,klijent = '$termin->klijent',datum = '$termin->datum',ucionica = $termin->ucionica WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(Termin $termin, Broker $broker)
    {
        $query = "INSERT INTO termin(jezik, klijent, datum, ucionica) VALUES('$termin->jezik','$termin->klijent','$termin->datum','$termin->ucionica')";
        return $broker->executeQuery($query);
    }
}
?>
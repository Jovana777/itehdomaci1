<?php

class Jezik {

    public $id;   
    public $naziv;   
    public $nastavnik;   

    public function __construct($id=null, $naziv=null, $nastavnik=null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->nastavnik = $nastavnik;
    }

    public static function getAll(Broker $broker)
    {
        $query = "SELECT j.*, n.imePrezime as nastavnik_imePrezime, count(t.id) as broj_termina FROM jezik j
        INNER JOIN nastavnik n on (j.nastavnik=n.id) LEFT JOIN termin t on (j.id=t.jezik) GROUP BY j.id ORDER BY j.id";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker){
        $query = "SELECT * FROM jezik WHERE id=$id";
        return $broker->executeQuery($query);
    }

    public function deleteById(Broker $broker)
    {
        $query = "DELETE FROM jezik WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    # ili da zovemo nad objektom koji menjamo a prosledjujemo id
    public function update(Jezik $jezik,Broker $broker)
    {
        $query = "UPDATE jezik set naziv = '$jezik->naziv',nastavnik = $jezik->nastavnik WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(Jezik $jezik,Broker $broker)
    {
        $query = "INSERT INTO jezik(naziv, nastavnik) VALUES('$jezik->naziv','$jezik->nastavnik')";
        return $broker->executeQuery($query);
    }
}

?>
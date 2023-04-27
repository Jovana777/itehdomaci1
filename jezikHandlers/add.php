<?php

require "../Broker.php";
require "../model/Jezik.php";

$broker=Broker::getBroker();

if(isset($_POST['naziv']) && isset($_POST['nastavnik'])) {

    $jezik = new Jezik(null,$_POST['naziv'],$_POST['nastavnik']);
    $rezultat = Jezik::add($jezik, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
    }else{ 
         echo '1';
    }

}


?>
<?php

require "../Broker.php";
require "../model/Termin.php";

$broker=Broker::getBroker();

if(isset($_POST['jezik']) && isset($_POST['klijent']) && isset($_POST['datum']) && isset($_POST['ucionica'])){
        $termin = new Termin(null,$_POST['jezik'],$_POST['klijent'],$_POST['datum'],$_POST['ucionica'] );
        $rezultat = Termin::add($termin, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
    }else{ 
         echo '1';
    }
}

?>
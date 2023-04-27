<?php

require "../Broker.php";
require "../model/Termin.php";

$broker=Broker::getBroker();

if(isset($_POST['jezik']) && isset($_POST['klijent']) && isset($_POST['datum']) && isset($_POST['ucionica'])
 && isset($_POST['id'])) {

    $terminKojiSeMenja = new Termin($_POST['id']);
    $terminKojimSeMenja = new Termin(null,$_POST['jezik'],$_POST['klijent'],$_POST['datum'],$_POST['ucionica']);
    $rezultat = $terminKojiSeMenja->update($terminKojimSeMenja, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }
}

?>
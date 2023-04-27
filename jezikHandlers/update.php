<?php

require "../Broker.php";
require "../model/Jezik.php";

$broker=Broker::getBroker();

if(isset($_POST['naziv']) && isset($_POST['nastavnik']) && isset($_POST['id'])) {

    $jezikKojiSeMenja = new Jezik($_POST['id'], null, null);
    $jezikKojimSeMenja = new Jezik(null,$_POST['naziv'],$_POST['nastavnik']);
    $rezultat = $jezikKojiSeMenja->update($jezikKojimSeMenja, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }

}

?>
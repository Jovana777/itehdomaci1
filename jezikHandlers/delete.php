<?php

require "../Broker.php";
require "../model/Jezik.php";

$broker=Broker::getBroker();

if(isset($_POST['id'])){
    $jezik = new Jezik($_POST['id']);
    $rezultat = $jezik->deleteById($broker);
    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{
         echo '1';
     }
}

?>
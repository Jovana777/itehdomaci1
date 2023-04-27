<?php

require "../model/Jezik.php";
require '../Broker.php';

$broker=Broker::getBroker();

if(isset($_GET['id'])){

    $resultSet = Jezik::getById($_GET['id'], $broker);
    $response=[];

    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
    $response['jezik']=$resultSet->fetch_object();

    }

    echo json_encode($response);
}

?>
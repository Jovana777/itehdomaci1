<?php

require "../model/Jezik.php";
require '../Broker.php';

$broker=Broker::getBroker();

    $resultSet = Jezik::getAll($broker);
    $response=[];

    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
        while($row=$resultSet->fetch_object()){
            $response['jezici'][]=$row;
        }
    }
    echo json_encode($response);

?>
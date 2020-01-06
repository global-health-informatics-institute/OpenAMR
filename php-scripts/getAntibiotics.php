<?php

require("dbconnect.php");


    $getAntibiotics = $dbh->prepare("SELECT an.abx_name , an.abx_code FROM eucast eu INNER JOIN  antibiotics an " .
            " INNER JOIN bacteria ab on ab.bacteria_id = eu.bacteria_id AND an.abx_id = eu.abx_id " .
            " WHERE eu.bacteria_id = (SELECT bacteria_id FROM bacteria WHERE bacteria_name='" . $_REQUEST["isolatename"] . "')");
    $data_isolatename = array();
    if ($getAntibiotics->execute()) {
        foreach ($getAntibiotics->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["isolatename"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }

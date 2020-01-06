<?php

require("dbconnect.php");


    $getCZone = $dbh->prepare("SELECT disc from zones where sample_id = ". $_REQUEST["sample_id"]);
    $data_isolatename = array();
    if ($getCZone->execute()) {
        foreach ($getCZone->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["zone_num"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }




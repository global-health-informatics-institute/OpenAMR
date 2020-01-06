<?php

require("dbconnect.php");


    $getCDiameter = $dbh->prepare("SELECT diameter FROM discs WHERE sample_id  = ". $_REQUEST["sample_id"]);
    $data_isolatename = array();
    if ($getCDiameter->execute()) {
        foreach ($getCDiameter->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["diameter_num"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }



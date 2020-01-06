<?php

require("dbconnect.php");


    $getCDiscs = $dbh->prepare("SELECT disc_id  FROM discs WHERE sample_id = ". $_REQUEST["sample_id"]);
    $data_isolatename = array();
    if ($getCDiscs->execute()) {
        foreach ($getCDiscs->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["metadata"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }




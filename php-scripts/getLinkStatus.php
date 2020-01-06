<?php

require("dbconnect.php");



    $getTestStatus = $dbh->prepare("SELECT status FROM links");
    $data_bacteria = array();
    if ($getTestStatus->execute()) {
        foreach ($getTestStatus->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_bacteria["testlink"][] = $metadata;
        }
        echo json_encode($data_bacteria);
    } else {
        echo 0;
    }

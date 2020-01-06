<?php

require("dbconnect.php");



    $getTestStatus = $dbh->prepare("SELECT * FROM teststatus");
    $data_bacteria = array();
    if ($getTestStatus->execute()) {
        foreach ($getTestStatus->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_bacteria["teststatus"][] = $metadata;
        }
        echo json_encode($data_bacteria);
    } else {
        echo 0;
    }

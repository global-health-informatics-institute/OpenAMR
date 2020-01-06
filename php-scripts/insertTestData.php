<?php

require("dbconnect.php");


    $insertTestData = $dbh->prepare("INSERT INTO samples (uniquecode,bacteria_id,test_on) VALUES (? ,(SELECT bacteria_id FROM bacteria WHERE bacteria_name=?), NOW())");
    if ($insertTestData->execute(array( $_REQUEST["uniquecode"],  $_REQUEST["isolatename"]))) {
        echo 1;
    } else {
        echo 0;
    }

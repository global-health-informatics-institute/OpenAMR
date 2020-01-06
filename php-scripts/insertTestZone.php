<?php

require("dbconnect.php");


    $insertTestZone = $dbh->prepare("INSERT INTO zones (disc,sample_id) VALUES ('" . $_REQUEST["discs"] . "','" . $_REQUEST["sample_id"] . "')");
    if ($insertTestZone->execute()) {
        echo 1;
    } else {
        echo 0;
    }

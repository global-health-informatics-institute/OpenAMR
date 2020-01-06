<?php

require("dbconnect.php");


    $deleteZoneIfFound = $dbh->prepare("DELETE FROM zones WHERE sample_id='" . $_REQUEST["sample_id"] . "'");
    if ($deleteZoneIfFound->execute()) {
        echo 1;
    } else {
        echo 0;
    }
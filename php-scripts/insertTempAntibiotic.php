<?php

require("dbconnect.php");

    $insertTempAntibiotic = $dbh->prepare("INSERT INTO temp_abx (abx_name) VALUES ('" . $_REQUEST["temp_abx"] . "' )");
    if ($insertTempAntibiotic->execute()) {
        echo 1;
    } else {
        echo 0;
    }


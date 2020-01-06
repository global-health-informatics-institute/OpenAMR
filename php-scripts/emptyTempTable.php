<?php

require("dbconnect.php");

    $emptyTempTable = $dbh->prepare("TRUNCATE temp_abx");
    if ($emptyTempTable->execute()) {
        echo 1;
    } else {
        echo 0;
    }


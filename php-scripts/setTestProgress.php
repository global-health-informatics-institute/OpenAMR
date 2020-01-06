<?php

require("dbconnect.php");
    $position = $dbh->prepare("INSERT INTO temp_progress (num) VALUES (" . $_REQUEST["num"] . " )");
    if ($position->execute()) {
        echo 1;
    } else {
        echo 0;
    }


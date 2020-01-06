<?php

require("dbconnect.php");

    $transactionTerminate = $dbh->prepare("SELECT concat('KILL ',id,';') FROM information_schema.processlist
WHERE user='id5990451_calmwalija' and time > 200");
    if ($transactionTerminate->execute()) {
        echo 1;
    } else {
        echo 0;
    }
    
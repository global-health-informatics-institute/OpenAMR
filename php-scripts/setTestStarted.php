<?php

require("dbconnect.php");
    $tsetTestStatus = $dbh->prepare("UPDATE teststatus  set started = ".$_REQUEST["started"]);
    if ($tsetTestStatus->execute()) {
        echo 1;
    } else {
        echo 0;
    }


<?php

require("dbconnect.php");
    $tsetTestStatus = $dbh->prepare("UPDATE teststatus  set locked = ".$_REQUEST["locked"]);
    if ($tsetTestStatus->execute()) {
        echo 1;
    } else {
        echo 0;
    }


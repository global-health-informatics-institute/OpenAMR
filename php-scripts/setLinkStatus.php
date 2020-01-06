<?php



require("dbconnect.php");

    $tsetTestStatus = $dbh->prepare("UPDATE teststatus  set link= ".$_REQUEST["link"]);

    if ($tsetTestStatus->execute()) {

        echo 1;

    } else {

        echo 0;

    }


<?php

require("dbconnect.php");
    $deLdiscs = $dbh->prepare("DELETE FROM discs WHERE sample_id = ".  $_REQUEST["sample_id"]);
    if ($deLdiscs->execute()) {
        echo 1;
    } else {
        echo 0;
    }


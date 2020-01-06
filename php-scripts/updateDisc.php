<?php

require("dbconnect.php");
    $updateDisc = $dbh->prepare("UPDATE discs set diameter=? WHERE sample_id=? and disc_id =?");
    if ($updateDisc->execute(array($_REQUEST["distances"], $_REQUEST["sample_id"], $_REQUEST["disc_num"]))) {
        echo 1;
    } else {
        echo 0;
    }

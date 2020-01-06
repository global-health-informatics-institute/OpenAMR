<?php

require("dbconnect.php");


    $updateCDiscs = $dbh->prepare("UPDATE discs set diameter= ". $_REQUEST["diameter"]." WHERE sample_id=" . $_REQUEST["sample_id"]." and disc_id = ".$_REQUEST["disc_id"]);
    $data_isolatename = array();
    if ($updateCDiscs->execute()) {
        echo 1;
    } else {
        echo 0;
    }




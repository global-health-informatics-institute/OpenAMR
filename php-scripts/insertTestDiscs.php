<?php

require("dbconnect.php");



    $insertTestDiscs = $dbh->prepare("INSERT INTO discs (abx_id, sample_id, test_on) VALUES ((SELECT abx_id FROM antibiotics
     WHERE abx_code = '" . $_REQUEST["abx_discs"] . "'), (SELECT  sample_id  FROM samples  WHERE uniquecode = ? ORDER BY sample_id DESC LIMIT 1), NOW())");
    if ($insertTestDiscs->execute(array($_REQUEST["uniquecode"]))) {
        echo 1;
    } else {
        echo 0;
    }
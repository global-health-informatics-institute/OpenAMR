<?php

require("dbconnect.php");

 $getCDiscs = $dbh->prepare("SELECT abx_code  FROM antibiotics");
$data_isolatename = array();
    if ($getCDiscs->execute()) {
        foreach ($getCDiscs->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["ancode"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }


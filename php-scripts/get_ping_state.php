<?php

require("dbconnect.php");

    $pingSql = $dbh->prepare("SELECT ping_state  FROM ping_pi");
    $pingArray = array();
    if ($pingSql->execute()) {
        foreach ($pingSql->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $pingArray["ping"][] = $metadata;
        }
        echo json_encode($pingArray);
    } else   echo 1;




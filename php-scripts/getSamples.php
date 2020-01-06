<?php
require("dbconnect.php");
$getSampleList = $dbh->prepare("SELECT  *  FROM samples sa inner join bacteria ba on sa.bacteria_id = ba.bacteria_id order by sa.sample_id desc");
$_List = array();
if ($getSampleList->execute()) {
foreach ($getSampleList->fetchAll(PDO::FETCH_OBJ) as $values) {
$_List["_List"][] = $values;
}
echo json_encode($_List);
} else {
echo 0;
}




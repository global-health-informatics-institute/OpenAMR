<?php
require("dbconnect.php");
$tempvals= array();
foreach(explode('"',$_POST["abx_discs"]) as $values) {  
$tempvals[] = $values;
}$sortedvals = array();
for ($i=0; $i < count($tempvals); $i++) {
 if($i%2 == 1)$sortedvals[] = $tempvals[$i];
}
$insertTestDiscs = $dbh->prepare("INSERT INTO discs (abx_id, sample_id, test_on) VALUES ((SELECT abx_id FROM antibiotics
 WHERE abx_code = ? ), (SELECT  sample_id  FROM samples  WHERE uniquecode = ? ORDER BY sample_id DESC LIMIT 1), NOW())");
$count = 0;
for ($i=0; $i <count($sortedvals) ; $i++) { 
if($insertTestDiscs->execute(array($sortedvals[$i], $_REQUEST["uniquecode"])))
$count ++;
}
if($count == sizeof($sortedvals))
echo(1);
else echo(0);


<?php
include "dbConnect.php";

$sqlQuery = 'SELECT * FROM support';
$GetHiking = $db->prepare($sqlQuery);
$GetHiking->execute();
$data = $GetHiking->fetchAll();

var_dump($data);
echo $data[0]['file'];
?>
<?php
$host = 'localhost';
$dbname = 'hackers-poulette';
$username = 'root';
$password = '';
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$username","$password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
      echo $e->getMessage();
  }
?>
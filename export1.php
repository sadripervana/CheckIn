<?php
require_once 'includes/DatabaseConnection.inc.php';
// (B) HTTP CSV HEADERS
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"export.csv\"");
 
// (C) GET USERS FROM DATABASE + DIRECT OUTPUT
$stmt = $pdo->prepare("SELECT * FROM `guest`");
$stmt->execute();
while ($row = $stmt->fetch()) {
  echo implode(",", [$row["id"], $row["name"], $row["surname"], (($row["checkin"] ==1)?'YES':"NO")]);
  echo "\r\n";
}
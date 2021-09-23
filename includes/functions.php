<?php

function loadTemplate($templateFileName, $t = [], $v =[], $off =[], $p = [], $c = []){
 ob_start();
  $total = $t;
  $variables = $v;
  $offset = $off;
  $page = $p;
  $case = $c;
  include __DIR__ . '/../templates/' . $templateFileName;
  return ob_get_clean();
}

function sanitizeString($var){
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
  }

function query($pdo, $sql, $parameters = []){
  $query = $pdo->prepare($sql);
  $query->execute($parameters);
  return $query;
}

function createDatabase($pdo, $name){
  $pdo->exec("CREATE DATABASE `$name`;
    CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
    GRANT ALL ON `$name`.* TO '$user'@'localhost';FLUSH PRIVILEGES;")
    or die(print_r($name->errorInfo(), true));
}

function createTable($pdo, $name, $query){
   query($pdo,"CREATE TABLE IF NOT EXISTS $name($query)");
   echo "Table '$name' created or already exists.<br>";
}

function insert($pdo, $table, $primaryKey, $fields){
  $query = 'INSERT INTO `' . $table . '` (';
  foreach ($fields as $key => $value) {
    $query .= '`' . $key . '`,';
  }

  $query = rtrim($query, ',');
  $query .= ') VALUES (';
  foreach ($fields as $key => $value) {
    $query .= ':' . $key . ',';
  }
  $query = rtrim($query, ',');
  $query .= ')';
  query($pdo, $query, $fields);
}

function update($pdo, $primaryKey){
  $query = "UPDATE  `guest` SET `checkin` = 1 WHERE `id` = $primaryKey";
  query($pdo, $query);
}

function save($pdo, $table, $primaryKey, $record) {
  try {
    if($record[$primaryKey] == ''){
      $record[$primaryKey] = null;
    }
    insert($pdo, $table, $primaryKey, $record);
  }
  catch (\PDOException $e){
    update($pdo, $table, $primaryKey, $record);
  }
}

function findAll($pdo, $table, $orderBy = null, $limit = null, 
  $offset = null, $checkin = null, $like = null)
{
  $query = "SELECT * FROM `$table` WHERE `checkin` = $checkin";

  if($like !=null){
    $query .= " AND `name` LIKE '%$like%' OR `surname` LIKE '%$like%' ";
  }
  if($orderBy != null) {
    $query .= " ORDER BY   $orderBy ";
  }

  if ($limit != null) {
    $query .= " LIMIT  $limit ";
  }

  if ($offset != null) {
    $query .= " OFFSET  $offset ";
  }

  $result = query($pdo, $query);

  return $result->fetchAll(\PDO::FETCH_BOTH);
}

function total($pdo, $table, $checkin = null, $like = null){
  $sql = "SELECT COUNT(*) FROM `$table` WHERE `checkin`=$checkin ";
  if($like !=null){
    $sql .= " AND `name` LIKE '%$like%' OR `surname` LIKE '%$like%' ";
  }
  $query = query($pdo,$sql);
  $result = $query->fetch(\PDO::FETCH_BOTH);
  if (count($result) > 0) {
    return $result[0];
  }
  else {
    return null;
  }
}

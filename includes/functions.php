<?php

 function loadTemplate($templateFileName, $t = [],$v =[]){

  ob_start();
  $total = $t;
  $variables = $v;
  include __DIR__ . '/../templates/' . $templateFileName;
  return ob_get_clean();
}

function sanitizeString($var)
  {
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
  }

function query($pdo, $sql, $parameters = []){
  $query = $pdo->prepare($sql);
  $query->execute($parameters);
  return $query;
}

function createTable($pdo, $table, $name, $query){
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

function update($pdo, $table, $primaryKey, $fields){
  $query = 'UPDATE  `' . $table . '` SET ';
  foreach ($fields as $key => $value) {
    $query .= '`' . $key . '` =:' . $key . ',';
  }
  $query = rtrim($query, ',');
  $query .= ' WHERE `' . $primaryKey . '` =:primaryKey';
  $fields['primaryKey'] = $fields['id'];
  query($pdo, $query, $fields);
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

function findAll($pdo, $table, $orderBy = null, $limit = null, $offset = null){
$query = 'SELECT * FROM `' . $table . '`';

if($orderBy != null) {
  $query .= ' ORDER BY ' . $orderBy;
}

if ($limit != null) {
  $query .= ' LIMIT ' . $limit;
}

if ($offset != null) {
  $query .= ' OFFSET ' . $offset;
}

$result = query($pdo, $query);

return $result->fetchAll();
}

function total($pdo, $table){
  $query = query($pdo,'SELECT COUNT(*) FROM `' . $table . '`');
  $result = $query->fetchAll();
  if (count($result) > 0) {
      return $result[0];
      }
  else {
      return null;
  }
}

function findById($pdo, $table,$primaryKey, $value){
$query = 'SELECT * FROM `' . $table . '` WHERE `' . $primaryKey . '` = :value';

$parameters = [':value'=>$value];

$query = query($pdo, $query,$parameters);
return $query->fetchObject();
}

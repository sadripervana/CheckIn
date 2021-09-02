<?php
namespace Framework;

class DatabaseTable {
  private $pdo;
  private $table;
  private $primaryKey;

  public function __construct(\PDO $pdo, string $table, string $primaryKey){
    $this->pdo = $pdo;
    $this->table = $table;
    $this->primaryKey = $primaryKey;
  }

  private function query($sql, $parameters = []){
    $query = $this->pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
  }
  public function createTable($name, $query){
      $this->query("CREATE TABLE IF NOT EXISTS $name($query)");
      echo "Table '$name' created or already exists.<br>";
  }

  private function insert($fields){
    $query = 'INSERT INTO `' . $this->table . '` (';
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
    $this->query($query, $fields);
  }

  private function update($fields){
    $query = 'UPDATE  `' . $this->table . '` SET ';
    foreach ($fields as $key => $value) {
      $query .= '`' . $key . '` =:' . $key . ',';
    }
    $query = rtrim($query, ',');
    $query .= ' WHERE `' . $this->primaryKey . '` =:primaryKey';
    $fields['primaryKey'] = $fields['id'];
    $this->query($query, $fields);
  }

  public function save($record) {
    try {
      if($record[$this->primaryKey] == ''){
        $record[$this->primaryKey] = null;
      }
      $this->insert($record);
    }
    catch (\PDOException $e){
      $this->update($record);
    }
  }

  public function findAll($orderBy = null, $limit = null, $offset = null){
  $query = 'SELECT * FROM `'.$this->table . '`';

  if($orderBy != null) {
    $query .= ' ORDER BY ' . $orderBy;
  }

  if ($limit != null) {
    $query .= ' LIMIT ' . $limit;
  }

  if ($offset != null) {
    $query .= ' OFFSET ' . $offset;
  }

  $result = $this->query($query);

  return $result->fetchAll();
  }

  public function total(){
    $query = $this->query('SELECT COUNT(*) FROM `' . $this->table . '`');
    $result = $query->fetchAll();
    if (count($result) > 0) {
        return $result[0];
        }
    else {
        return null;
    }
  }

  public function findById($value){
  $query = 'SELECT * FROM `'.$this->table.'` WHERE `'.$this->primaryKey.'` = :value';

  $parameters = [':value'=>$value];

  $query = $this->query($query,$parameters);
  return $query->fetchObject();
}

}

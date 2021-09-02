<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Setting up Database data</h1>
    <?php

    require_once 'index.php';

    function query($pdo, $sql, $parameters = []){
      $query = $pdo->prepare($sql);
      $query->execute($parameters);
      return $query;
    }

    function createTable($pdo,$name, $query){
        query($pdo, "CREATE TABLE IF NOT EXISTS $name($query)");
        echo "Table '$name' created or already exists.<br>";
    }

    createTable($pdo,'guest',
    'id MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     name VARCHAR(15),
     surname VARCHAR(15),
     checkin TINYINT DEFAULT 0 NOT NULL,
     INDEX(name(5))');


     $record = ['id'=>1,'name'=>'user1','surname'=>'user1s','checkin'=>'0'];
     $database->save($record);

     $record = ['id'=>2,'name'=>'user2','surname'=>'user2s','checkin'=>'0'];
     $database->save($record);

     $record = ['id'=>3,'name'=>'user3','surname'=>'user3s','checkin'=>'0'];
     $database->save($record);

     $record = ['id'=>4,'name'=>'user4','surname'=>'user4s','checkin'=>'0'];
     $database->save($record);

    ?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Setting up Database data</h1>
    <?php

    require_once 'Framework/DatabaseTable.php';
    require_once 'includes/DatabaseConnection.inc.php';

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

    ?>
  </body>
</html>

<?php

  require_once 'templates/header.html.php';
  require_once 'Framework/DatabaseTable.php';
  require_once 'includes/DatabaseConnection.inc.php';
  require_once 'includes/functions.php';

  echo "<div class='center'>Welcome to the Party";

$database = new \FRAMEWORK\DatabaseTable($pdo, 'guest', 'id');
if(isset($_POST['id'])){

  $primaryKey = $_POST['id'];
  $primaryKey[] = 1;


  foreach ($primaryKey as $key => $value ) {
    $values[] = $value;
  }
  $record = ['id'=>$values[0],'name'=>$values[1],'surname'=>$values[2],'checkin'=>'1'];

  $database->save($record);
  header('location: index.php?p=home&r=$randstr');
}

$total = $database->total();
$variables = $database->findAll('id',10,0);

$case = $_GET['p'];
switch ($case) {
  case 'home':
  echo loadTemplate('list.html.php',$total,$variables);
    break;
  case 'checkedin':
  echo loadTemplate('checkedin.html.php',$total,$variables);
  case 'unpermitted':
  echo loadTemplate('unpermitted.html.php',$total,$variables);
  default:
  // echo loadTemplate('list.html.php',$total,$variables);
  break;
}

echo <<<_END
      </div><br>
    </div>
    <div data-role="footer">
      <h4>Web App from SADRI PERVANA</h4>
    </div>
  </body>
</html>
_END;
?>
<script src="script.js">
</script>

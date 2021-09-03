<?php

  require_once 'templates/header.html.php';
  require_once 'Framework/DatabaseTable.php';
  require_once 'includes/DatabaseConnection.inc.php';
  require_once 'includes/functions.php';


// $database = new \FRAMEWORK\DatabaseTable($pdo, 'guest', 'id');
$page =  $_GET['page'] ?? 1;
$offset = ($page-1)*10;


  if(isset($_POST['id'])){
    $primaryKey =$_POST['id'] ;
    $primaryKey[] = 1;

    foreach ($primaryKey as $key => $value ) {
      $values[] = $value;
    }
    $record = ['id'=>$values[0],'name'=>$values[1],'surname'=>$values[2],'checkin'=>'1'];
    save($pdo, 'guest', 'id', $record);
    header('location: index.php?p=home&r=$randstr');
  }

    if(isset($_POST['name'] )){
      if(isset($_POST['surname'])){
      $name = sanitizeString($_POST['name']) ;
      $surname = sanitizeString($_POST['surname']);
      $record = ['id'=>null ,'name'=>$name,'surname'=>$surname,'checkin'=>'0'];
      save($pdo, 'guest', 'id', $record);
      header('location: index.php?p=home&r=$randstr');
     }
    }

$totalGuest = total($pdo, 'guest', 0);
$totalCheckedin = total($pdo, 'guest', 1);
$guest = findAll($pdo, 'guest','id',10,$offset,0);
$checkedin = findAll($pdo, 'guest','id',10,$offset,1);


$case = $_GET['p'];
switch ($case) {
  case 'home':
  echo loadTemplate('list.html.php',$totalGuest,$guest,$offset, $page, $randstr, $case);
    break;
  case 'checkedin':
  echo loadTemplate('checkedin.html.php',$totalCheckedin,$checkedin,$offset, $page, $randstr, $case);
    break;
  case 'addguest':
  echo loadTemplate('addguest.html.php');
   break;
  default:
  // echo loadTemplate('list.html.php',$total,$variables);
  break;
}

require_once 'templates/footer.html.php';
?>

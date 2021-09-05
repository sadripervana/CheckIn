<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once 'templates/header.html.php';
  require_once 'includes/DatabaseConnection.inc.php';
  require_once 'includes/functions.php';

$page =  $_GET['page'] ?? 1;
$offset = ($page-1)*10;
$case = $_GET['p'] ?? null;

  if(isset($_POST['id'])){
    $primaryKey =$_POST['id'] ;
    $primaryKey[] = 1;

    foreach ($primaryKey as $key => $value ) {
      $values[] = $value;
    }
    $record = ['id'=>$values[0], 'name'=>$values[1], 'surname'=>$values[2], 'checkin'=>'1'];
    save($pdo, 'guest', 'id', $record);

    header('location: index.php?p=home&r=$randstr');
  }

    if(!empty($_POST['name'])){
      if(!empty($_POST['surname'])){
      $name = ucfirst(sanitizeString($_POST['name'])) ;
      $surname = ucfirst(sanitizeString($_POST['surname']));
      $record = ['id'=>null ,'name'=>$name,'surname'=>$surname, 'checkin'=>'0'];
      save($pdo, 'guest', 'id', $record);
      header('location: index.php?p=home&r=$randstr');
     }
    }

    if (isset($_POST['submit-search'])) {
      $like = sanitizeString($_POST['search']);
      $checkin = null;
      if($case == 'home')
      {
        $checkin = 0;
        $search = findAll($pdo, 'guest', 'name', 10, $offset, $checkin , $like);
        $totalsearch = total($pdo, 'guest', $checkin, $like);
        echo loadTemplate('list.html.php',$totalsearch , $search , $offset, $page, $randstr, $case);
      } else{
        $checkin = 1;
        $search = findAll($pdo, 'guest', 'name', 10, $offset, $checkin , $like);
        $totalsearch = total($pdo, 'guest', $checkin, $like);
        echo loadTemplate('list.html.php',$totalsearch , $search , $offset, $page, $randstr, $case);
      }
    }


$totalGuest = total($pdo, 'guest', 0);
$totalCheckedin = total($pdo, 'guest', 1);
$guest = findAll($pdo, 'guest', 'name', 10, $offset, 0);
$checkedin = findAll($pdo, 'guest', 'name', 10, $offset, 1);



switch ($case) {
  case 'home':
  echo loadTemplate('list.html.php',$totalGuest,$guest,$offset, $page, $randstr, $case);
    break;
  case 'checkedin':
  echo loadTemplate('list.html.php',$totalCheckedin,$checkedin,$offset, $page, $randstr, $case);
    break;
  case 'addguest':
  echo loadTemplate('addguest.html.php');
   break;
  default:
    header('location: index.php?p=home&r=$randstr');
  break;
}

require_once 'templates/footer.html.php';
?>

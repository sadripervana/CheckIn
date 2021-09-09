<?php require_once 'templates/header.html.php'; 

if (isset($_POST['submit'])) {
  if(!empty($_POST['name'])){
    if(!empty($_POST['surname'])){
      $name = ucfirst(sanitizeString($_POST['name'])) ;
      $surname = ucfirst(sanitizeString($_POST['surname']));
      $record = ['id'=>null ,'name'=>$name,'surname'=>$surname, 'checkin'=>'0'];
      save($pdo, 'guest', 'id', $record);
    }
  }
}
?>
<script src="script.js"></script> 
<h1 class="center">Add Guest</h1>
<form class="addguest" action="" method="post">
  <div class="center center addguestf">
  <input type="text" data-inline="true" name="name" placeholder="Name">
  <input type="text" data-inline="true" name="surname" placeholder="Surname">
  <input type="submit" name="submit" data-icon="plus" name="btn" value="Add">
</form>
</div>
</div>

<?php require_once 'templates/footer.html.php' ?>
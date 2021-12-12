<?php
require_once 'templates/header.html.php';
if(!is_logged_in()){
  login_error_redirect();
}

if (isset($_POST['submit'])) {
  if(!empty($_POST['name']) && !empty($_POST['surname'])){
      $name = ucfirst(sanitizeString($_POST['name'])) ;
      $surname = ucfirst(sanitizeString($_POST['surname']));
      $record = ['id'=>null ,'name'=>$name,'surname'=>$surname, 'checkin'=>'0'];
      insert($pdo, 'guest', 'id', $record);
  }
}
?>

<form class="addguest"  action="" method="post">
  <div class="form-group row">
    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Surname</label>
    <div class="col-sm-10">
      <input type="text" name="surname" class="form-control" placeholder="Surname">
    </div>
  </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 add">
      <button type="submit" name="submit" class="btn btn-primary ">Add Guest</button>
    </div>
  </div>
</form>
</div>

<?php require_once 'templates/footer.html.php' ?>
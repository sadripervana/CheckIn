<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'core/init.php';
require_once 'templates/header.html.php';

$email = ((isset($_POST['email']))?sanitize($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?sanitize($_POST['password']):'');
$password = trim($password);

$errors = array();
?>

<style type="text/css">

  
</style>

<div id="login-form">
  <div>
    <?php

    if($_POST) {
      //form validation
      if(empty($_POST['email']) || empty($_POST['password'])){
        $errors[] = 'You must provide email and password.';
      }

      //validate email
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = 'You must enter a valid email.';
      }

      //password is more than 6 characters
      if(strlen($password) < 6){
        $errors[] = 'Password must be at least 6 characters.';
      }

      //check if email exists indatabase
      $query = $db->query("SELECT * FROM users where email = '$email'");
      $user = mysqli_fetch_assoc($query);
      $userCount = mysqli_num_rows($query);
      if($userCount < 1){
        $errors[] = 'That email doesn\'t exist in our database.';
      }

      if(!password_verify($password, $user['password'])){
        $errors[] = "The password does not match our records. Please try again."; 
      }

      //check for errors
      if (!empty($errors)){
        echo display_errors($errors);
      } else {
        //Log user in
        $user_id = $user['user_id'];
      }
        login($user_id);      
    }
    ?>
  </div>
  <h2 class="text-center" style="margin-top: 65px;color: white;">Login</h2><hr>

  <form class="addguest"  action="login.php" method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Email..." value="<?=$email;?>">
    </div>
      <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password..." value="<?=$password;?>">
    </div>
    <div class="form-group">
      <input type="submit" value="Login" class="btn btn-primary">
    </div>
  </form>
</div>
<?php require_once 'templates/footer.html.php' ?>
<?php
$randstr = substr(md5(rand()), 0, 7);
$case = $_GET['p'] ?? null;
$page =  $_GET['page'] ?? 1;
?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <script src="script.js"></script>
      <link rel='stylesheet' href='style.css'>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>



      <title>Guest CheckIN</title>
    </head>
    <body>
      <nav>
        <div class="guest">
         <a  href='index.php?p=home&r=<?=$randstr?>'>
                <h4> <img class="logo" src="checkin.png" width="40px" height="40px" alt=""> 
          Guest CheckIn</h4></a>
        </div>
          <div class='header'>
            <ul class="nav__links">
              <li><a  href='index.php?p=home&r=<?=$randstr?>'>
                <h4><i class="fas fa-home">&nbsp Home</h4></i></a>
              </li>
              <li><a  href='index.php?p=checkedin&r=<?=$randstr?>'>
                <h4><i class="fas fa-check">&nbsp CheckedIn</i></h4></a>
              </li>
              <li><a href='index.php?p=addguest&r=<?=$randstr?>'>
                <h4><i class="fas fa-plus">&nbsp Add Guest</i></h4></a></li>
            </ul>
          </div>
      </nav>
        
        <div class='content' >



 <?php if($case == 'home' ): ?>
    <h1 class="center"> Guest List</h1>
<?php elseif($case =='checkedin'): ?>
  <h1 class="center"> Checkedin List</h1>
<?php else: ?>
  <h1 class="center">Add Guest</h1>
<?php endif; ?>

<?php if($case != 'addguest'): ?> 
  <div class="search">
  <form action="" method="post">
    <div ><input id="one" type="text" name="search" placeholder="Search..."></div>
    <div id="two"><button  
   type="submit" class="btn btn-light"  name="submit-search"><i class="fas fa-search"></i></button></div>
   
   
  </form></div>
<?php endif; ?>
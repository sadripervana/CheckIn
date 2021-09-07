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
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

      <title>Guest CheckIN</title>
    </head>
    <body>
      <div data-role='page'>
        <div data-role='header'>
          <div class="guest">Guest CheckIN</div>
        </div>
        <div class='content' data-role='content'>

  <div class='center'>
      <a data-role='button' data-inline='true' class="ui-btn ui-icon-home ui-btn-icon-bottom"
        data-transition='slide' href='index.php?p=home&r=<?=$randstr?>'>Home</a>
      <a data-role='button' data-inline='true' class="ui-btn ui-icon-check ui-btn-icon-bottom"
        data-transition="slide" href='index.php?p=checkedin&r=<?=$randstr?>'>CheckedIn</a>
      <a  data-role='button' data-inline='true' class="ui-btn ui-icon-plus ui-btn-icon-bottom"
        data-transition="slide" href='index.php?p=addguest&r=<?=$randstr?>'>Add Guest</a>



<?php if($case != 'addguest'): ?> 

  <form action="" method="post">
   <input type="text" name="search" placeholder="Search...">
   <button  class="ui-btn ui-icon-search ui-btn-icon-bottom"
   type="submit"  name="submit-search"></button>
  </form>


<?php endif; ?>

</div>

 <?php if($case == 'home' ): ?>
    "<h1> Guest List</h1>
<?php elseif($case =='checkedin'): ?>
  <h1> Checkedin List</h1>
<?php else: ?>
  <h1>Add Guest</h1>
<?php endif; ?>

<?php 
require_once 'templates/header.html.php';

if(!is_logged_in()){
  login_error_redirect();
}

$totalCheckedin = total($pdo, 'guest', 1);
$checkedin = findAll($pdo, 'guest', 'name', 10, $offset, 1);

if (isset($_POST['submit-search'])) {
  $searchActive = TRUE;
  $like = sanitizeString($_POST['search']);

  $checkedin = findAll($pdo, 'guest', 'name', 10, $offset, 1 , $like);
  $totalCheckedin = total($pdo, 'guest', 1, $like);
}
?>
 <h1 class="center"> Checkedin List</h1>

 <?php include_once "templates/search-bar.html" ?>

<table>
  <tr>
    <th>Name</th>
    <th>Surname</th>
  </tr>
    <?php for($i =0; $i < ($totalCheckedin - $offset) && $i < 10; $i++): ?>
    <?php if($checkedin[$i]['checkin'] == 1) : ?>
  <tr>
    <td><?= htmlspecialchars($checkedin[$i]['name'], ENT_QUOTES, 'UTF-8') ?>
    </td>
    <td><?= htmlspecialchars($checkedin[$i]['surname'], ENT_QUOTES, 'UTF-8')?>
    </td>
    <?php endif; ?>
    <?php endfor; ?>
  </tr>
</table>
</div>

<div class="select-page center">
<h3>Select page:
<?php
  $numPages = ceil($totalCheckedin/10);
  for($i = 1; $i <= $numPages; $i++){
    if($i == $page){
      echo "<a class='currentpage'  href='checkedin.php'> [$i] </a>";
    }
    else {
      echo "<a href='checkedin.php?page=$i'> $i </a>";
    }
  }
?>
</h3>
</div>
<?php require_once 'templates/footer.html.php' ?>
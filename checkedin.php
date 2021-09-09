<?php 
require_once 'templates/header.html.php';
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
 <nav class="navbar navbar-light search">
  <form class="form-inline" action="" method="post">
    <input id="one" class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button id="two" name="submit-search" class="btn btn-light my-2 my-sm-0" type="submit">
      <i class="fas fa-search"></i>
    </button>
  </form>
</nav>
<table>
<tr>
  <th>Name</th>
  <th>Surname</th>
</tr>
  <?php for($i =0; $i < ($totalCheckedin - $offset) && $i < 10; $i++): ?>
  <?php if($checkedin[$i]['checkin'] == 1) : ?>
<tr>
  <td><?= htmlspecialchars($checkedin[$i]['name'], ENT_QUOTES, 'UTF-8') ?></td>
  <td><?= htmlspecialchars($checkedin[$i]['surname'], ENT_QUOTES, 'UTF-8')?></td>
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
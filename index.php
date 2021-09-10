<?php 
require_once 'templates/header.html.php';

$totalGuest = total($pdo, 'guest', 0);
$guest = findAll($pdo, 'guest', 'name', 10, $offset, 0);

if(isset($_POST['submit-search'])) {
  $like = sanitizeString($_POST['search']);
  $guest = findAll($pdo, 'guest', 'name', 10, $offset, 0 , $like);
  $totalGuest = total($pdo, 'guest', 0, $like);
}

?> 
<h1 class="center"> Guest List</h1>

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
          <th>CheckIn</thd>
      </tr>
        <?php for($i =0; $i < ($totalGuest - $offset) && $i < 10; $i++):?>
      <tr id="<?=$guest[$i]['id']?>">
        <td><?= htmlspecialchars($guest[$i]['name'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($guest[$i]['surname'], ENT_QUOTES, 'UTF-8')?></td>
        <td>
         <input type="hidden" name="id" value='<?=$guest[$i]['id']?>'>
         <input value='<?=$guest[$i]['id']?>' id="id"  class="mychoice" type="checkbox">
        </td>
        <?php endfor; ?>
       <tr>
    </table>
</div>

<div class="select-page center">
<h3>Select page:
<?php
  $numPages = ceil($totalGuest/10);
  for($i = 1; $i <= $numPages; $i++){
    if($i == $page){
      echo "<a class='currentpage' href='index.php'>[$i]</a>";
    }
    else {
      echo "<a href='index.php?page=$i'> $i </a>";
    }
  }
?>
</h3>
</div>

<?php require_once 'templates/footer.html.php' ?>
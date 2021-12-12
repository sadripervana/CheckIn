<?php
require_once 'templates/header.html.php';
if(!is_logged_in()){
  login_error_redirect();
}
$totalGuest = total($pdo, 'guest', 0);
$guest = findAll($pdo, 'guest', 'name', 10, $offset, 0);

if(isset($_POST['submit-search'])) {
  $like = sanitizeString($_POST['search']);
  $guest = findAll($pdo, 'guest', 'name', 10, $offset, 0 , $like);
  $totalGuest = total($pdo, 'guest', 0, $like);
}

?>
<h1 class="center"> Guest List</h1>

<?php include_once "templates/search-bar.html" ?>


    <table>
      <thead>
          <th>Name</th>
          <th>Surname</th>
          <th>CheckIn</thd>
      </thead>
        <?php for($i =0; $i < ($totalGuest - $offset) && $i < 10; $i++):?>
          <tbody>


      <tr id="<?=$guest[$i]['id']?>">
        <td><?=htmlspecialchars($guest[$i]['name'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?=htmlspecialchars($guest[$i]['surname'], ENT_QUOTES, 'UTF-8')?></td>
        <td>
         <input type="hidden" name="id" value='<?=$guest[$i]['id']?>'>
         <input value='<?=$guest[$i]['id']?>' id="id"  class="mychoice" type="checkbox">
        </td>
        <?php endfor; ?>
       <tr>
         </tbody>
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

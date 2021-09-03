<table style="border:1px solid black" >
  <tr id="tablehead">
    <td>Name</td>
    <td>Surname</td>
    <td>CheckIN</td>
  </tr>

  <?php
    for($i =0; $i < ($total['COUNT(*)'] - $offset) && $i < 10; $i++):
  ?>
  <?php  if($variables[$i]['checkin'] == 0): ?>
    <tr>
    <td id="<?= htmlspecialchars($variables[$i]['id'], ENT_QUOTES, 'UTF-8')?>"><?= htmlspecialchars($variables[$i]['name'], ENT_QUOTES, 'UTF-8') ?></td>
    <td><?= htmlspecialchars($variables[$i]['surname'], ENT_QUOTES, 'UTF-8')?></td>
    <td>
      <?php echo '
      <form action="" method="post">
        <input type="hidden" name="id[]" value='.$variables[$i]['id'].'>
        <input type="hidden" name="id[]" value='.$variables[$i]['name'].'>
        <input type="hidden" name="id[]" value='.$variables[$i]['surname'].'>
        <input type="submit" data-inline="true"  data-icon="check" value="CheckIn">
      </form>
      ';
     ?>
      </td>
  </tr>
<?php endif; ?>
<?php endfor; ?>



</table>
<h3>Select page:
<?php

$numPages = ceil($total['COUNT(*)']/10);
for($i = 1; $i <= $numPages; $i++){
  if ($case == 'home') {
    if($i == $page){
      echo "<a class='currentpage'  href='index.php?p=home&page=$i&r=$randstr'> $i </a>";
    }
    else {
      echo "<a href='index.php?p=home&page=$i&r=$randstr'> $i </a>";
    }
  } else {
    if($i == $page){
      echo "<a class='currentpage'  href='index.php?p=checkedin&page=$i&r=$randstr'> $i </a>";
    }
    else {
      echo "<a href='index.php?p=checkedin&page=$i&r=$randstr'> $i </a>";
    }
  }
}
?>
</h3>

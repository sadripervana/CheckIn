<table style="border:1px solid black" >
  <tr id="checkedin">
    <td>Name</td>
    <td>Surname</td>
  </tr>

  <?php for($i =0; $i < $total['COUNT(*)'] - $offset && $i < 10; $i++): ?>
      <?php if($variables[$i]['checkin'] == 1): ?>
    <tr>
    <td><?php echo $variables[$i]['name'];  ?></td>
    <td><?php echo $variables[$i]['surname'];  ?></td>
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

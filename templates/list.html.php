
  <h1> Guest List</h1>;
<div class="list">
  <ul id="parent" data-role="listview" data-inline='true' data-filter="true" data-filter-placeholder="Search guest..." data-inset="true">
    <div id="top" class="top"><span class="one">Name</span><span class="two">Surname</span><span class="thre">CheckIN</span></div>

  <?php
    for($i =0; $i < ($total['COUNT(*)'] - $offset) && $i < 10; $i++):
  ?>
  <?php  if($variables[$i]['checkin'] == 0): ?>
  <div class="top">
    <li class="one"><?= htmlspecialchars($variables[$i]['name'], ENT_QUOTES, 'UTF-8') ?></li>
      <li class="two"><?= htmlspecialchars($variables[$i]['surname'], ENT_QUOTES, 'UTF-8')?></li>
      <li class="thre"><?php echo '
          <form action="" method="post">
            <input type="hidden" name="id[]" value='.$variables[$i]['id'].'>
            <input type="hidden" name="id[]" value='.$variables[$i]['name'].'>
            <input type="hidden" name="id[]" value='.$variables[$i]['surname'].'>
            <input type="submit" data-inline="true" class="ui-btn ui-mini"  data-icon="check" value="CheckIn">
          </form>
        ';
     ?>
   </li>

 </div>
<?php endif; ?>
<?php endfor; ?>
</ul>
</div>

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

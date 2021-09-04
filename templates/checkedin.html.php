  <h1> Checked In</h1>;
  <div class="checkedin">
    <ul id="parent" data-role="listview" data-inline='true' data-filter="true" data-filter-placeholder="Search guest..." data-inset="true">
      <table>
        <div class="top">
        <tr>
            <td><span class="one">Name</span></td>
            <td><span class="two">Surname</span></td>
        </tr>
          </div>
        <?php for($i =0; $i < ($total - $offset) && $i < 10; $i++):?>
          <?php  if($variables[$i]['checkin'] == 1): ?>
            <tr>
              <td> <li class="one"><?= htmlspecialchars($variables[$i]['name'], ENT_QUOTES, 'UTF-8') ?></li></td>
              <td><li class="two"><?= htmlspecialchars($variables[$i]['surname'], ENT_QUOTES, 'UTF-8')?></li></td>
            <?php endif; ?>
          <?php endfor; ?>
      </tr>
    </table>
  </ul>
  </div>

<h3>Select page:
<?php

$numPages = ceil($total/10);
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

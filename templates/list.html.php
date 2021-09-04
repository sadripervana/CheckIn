
  <h1> Guest List</h1>
  <div class="search-box">
    <form  action="" method="post">
      <input type="text" name="search" placeholder="Search">
    <button type="submit" placeholder="Search" name="submit-search"><i class="fas fa-search"></button></i>
    </form>
  </div>

<div class="list">
  <ul id="parent" data-role="listview" data-inline='true'  data-inset="true">
<table>


      <div id="top">
      <tr>
          <td><span class="one">Name</span></td>
          <td><span class="two">Surname</span></td>
          <?php  if($case == 'home'): ?>
          <td><span class="three">CheckIN</span></td>
        <?php endif; ?>
      </tr>
        </div>
      <?php
        for($i =0; $i < ($total - $offset) && $i < 10; $i++):
      ?>
      <?php  if($variables[$i]['checkin'] == 0): ?>
    <tr>
      <td><li><?= htmlspecialchars($variables[$i]['name'], ENT_QUOTES, 'UTF-8') ?></li></td>
      <td><li><?= htmlspecialchars($variables[$i]['surname'], ENT_QUOTES, 'UTF-8')?></li></td>
      <td><li><?php echo '
         <form action="" method="post">
           <input type="hidden" name="id[]" value='.$variables[$i]['id'].'>
           <input type="hidden" name="id[]" value='.$variables[$i]['name'].'>
           <input type="hidden" name="id[]" value='.$variables[$i]['surname'].'>
           <input type="submit" data-inline="true" class="ui-btn ui-mini"  data-icon="check" value="CheckIn">
         </form>
             ';
          ?>
          </li>
          </td>
        <?php else : ?>
          <tr>
            <td><li><?= htmlspecialchars($variables[$i]['name'], ENT_QUOTES, 'UTF-8') ?></li></td>
            <td><li><?= htmlspecialchars($variables[$i]['surname'], ENT_QUOTES, 'UTF-8')?></li></td>
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
<?php
echo <<<_END
<div data-role="footer">

_END; ?>


  <?php  if($case == 'home' ): ?>
<h1> Guest List</h1>
<?php else: ?>
  <h1> Checkedin List</h1>
  <?php endif; ?>

<div class="list">
  <div class="search-box">
    <form action="" method="post">
     <input type="text" name="search" placeholder="Search">
     <button type="submit" class ="ui-btn ui-icon-search ui-btn-icon-bottom"
      data-icon="search" placeholder="Search" name="submit-search"></button>
    </form>
  </div>

    <table>
      <tr>
          <th>Name</th>
          <th>Surname</th>
          <?php  if($case == 'home' ): ?>
          <th>CheckIn</thd>
        <?php endif; ?>
      </tr>
        <?php
        for($i =0; $i < ($total - $offset) && $i < 10; $i++):
          ?>
          <?php  if($variables[$i]['checkin'] == 0 && $case == 'home' ): ?>
      <tr>
        <td><?= htmlspecialchars($variables[$i]['name'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($variables[$i]['surname'], ENT_QUOTES, 'UTF-8')?></td>
        <td>
            <?php echo '
               <form  action="" method="post">
                 <input type="hidden" name="id[]" value='.$variables[$i]['id'].'>
                 <input type="hidden" name="id[]" value='.$variables[$i]['name'].'>
                 <input type="hidden" name="id[]" value='.$variables[$i]['surname'].'>
                 <input data-role="button" data-inline="true" data-icon="check"
                   data-transition="slide" type="submit" class="btn" value="CheckIn">
               </form>';
               ?>
        </td>
          <?php elseif($variables[$i]['checkin'] == 1 && $case == 'checkedin') : ?>
      <tr>
        <td><?= htmlspecialchars($variables[$i]['name'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($variables[$i]['surname'], ENT_QUOTES, 'UTF-8')?></td>
        <?php endif; ?>
        <?php endfor; ?>
      </tr>
      </table>
  </ul>
</div>

<div class="select-page">
<h3>Select page:
<?php
  $numPages = ceil($total/10);
  for($i = 1; $i <= $numPages; $i++){
    if ($case == 'home') {
      if($i == $page){
        echo "<a class='currentpage' href='index.php?p=home&page=$i&r=$randstr'> $i </a>";
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
</div>

<table style="border:1px solid black" >
  <tr id="tablehead">
    <td>Name</td>
    <td>Surname</td>
    <td>CheckIN</td>
  </tr>
  <?php for($i =0; $i <$total['COUNT(*)']; $i++): ?>
  <?php if($variables[$i]['checkin'] == 0): ?>
    <tr>
    <td id="<?= $variables[$i]['id']?>"><?php echo $variables[$i]['name'];  ?></td>
    <td><?= $variables[$i]['surname'];  ?></td>
    <td>
      <?php echo '
      <form action="" method="post">
        <input type="hidden" name="id[]" value='.$variables[$i]['id'].'>
        <input type="hidden" name="id[]" value='.$variables[$i]['name'].'>
        <input type="hidden" name="id[]" value='.$variables[$i]['surname'].'>
        <input type="submit" data-inline="true" value="CheckIn">
      </form>
      ';
      ?>
      </td>
  </tr>
<?php endif; ?>
<?php endfor; ?>

</table>
<!--   <input type='button' id='btn' data-role='button' data-inline='true data-icon='heart' name='button1' onclick=\"hide()\" > -->

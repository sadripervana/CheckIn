<table style="border:1px solid black" >
  <tr id="checkedin">
    <td>Name</td>
    <td>Surname</td>
    <td>CheckIN</td>
  </tr>

  <?php for($i =0; $i <$total['COUNT(*)']; $i++): ?>
      <?php if($variables[$i]['checkin'] == 1): ?>
    <tr>
    <td><?php echo $variables[$i]['name'];  ?></td>
    <td><?php echo $variables[$i]['surname'];  ?></td>
    <td>
      <?php  echo "<input type='button' id='btn' data-role='button' data-inline='true  name='button1' onclick='hide()' value='Checkedin'> ";
      ?></td>
  </tr>
  <?php endif; ?>
<?php endfor; ?>


</table>

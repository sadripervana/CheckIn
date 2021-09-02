<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div>
 // your div
</div>
<input type="hidden" id="hiddencontainer" name="hiddencontainer"/>

<script>
  var myhidden = document.getElementById("hiddencontainer");
  myhidden.value=boxHeight;
</script>
In PHP side you can get value using,
<?php
$boxsize=$_REQUEST["hiddencontainer"];
echo $boxsize;
?>
  </body>
</html>

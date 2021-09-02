<?php

 function loadTemplate($templateFileName, $t = [],$v =[]){

  ob_start();
  $total = $t;
  $variables = $v;
  include __DIR__ . '/../templates/' . $templateFileName;
  return ob_get_clean();
}

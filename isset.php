<?php 
require_once 'includes/DatabaseConnection.inc.php';
require_once 'includes/functions.php';


if(isset($_POST['id'])){
    update($pdo, $_POST['id']);
    echo json_encode($_POST['id']);
 }


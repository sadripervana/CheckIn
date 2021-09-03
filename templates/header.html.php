<?php
$randstr = substr(md5(rand()), 0, 7);
    echo <<<_INIT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' href='style.css'>
      <link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
      <link rel='stylesheet' href='styles.css' type='text/css'>
      <script src='jquery-2.2.4.min.js'></script>
      <script src='jquery.mobile-1.4.5.min.js'></script>
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  _INIT;

  echo <<<_MAIN
      <title>Guest CheckIN</title>
    </head>
    <body>
      <div data-role='page'>
        <div data-role='header'>
          <div>Guest CheckIN</div>
        </div>
        <div data-role='content'>
  _MAIN;

  echo <<<_GUEST
          <div class='center'>
            <a data-role='button' data-inline='true' data-icon='home'
              data-transition='slide' href='index.php?p=home&r=$randstr''>Home</a>
            <a data-role='button' data-inline='true' data-icon='check'
              data-transition="slide" href='index.php?p=checkedin&r=$randstr''>CheckedIn</a>
            <a data-role='button' data-inline='true' data-icon='plus'
              data-transition="slide" href='index.php?p=addguest&r=$randstr''>Add Guest</a>
          </div>
  _GUEST;
  echo "<image src='image.jpeg' width='40%' height='250px' >";

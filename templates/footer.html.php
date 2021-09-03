Select page:
  <?php //Calculate the number of pages
    $numPages = ceil($total['COUNT(*)']/10);
    for($j = 1; $j <= $numPages; $j++){
      if($j == $page){
        echo "<a class='currentpage'  href='index.php?p=home&page=$j&r=$randstr'> $j </a>";
      }
     else {
      echo "<a href='index.php?p=home&page=$j&r=$randstr'> $j </a>";
      }
    }

    echo <<<_END
          </div><br>
        </div>
        <div data-role="footer">
          <h4>Web App from SADRI PERVANA</h4>
        </div>
      </body>
    </html>
    _END;
      ?>

      <script src="script.js">
      </script>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Setting up Database data</h1>
    <?php
    require_once 'includes/DatabaseConnection.inc.php';
    require_once 'includes/functions.php';

 // Duke krijuar tabelen
    createTable($pdo,'guest',
    'id MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     name VARCHAR(15),
     surname VARCHAR(15),
     checkin TINYINT DEFAULT 0 NOT NULL,
     INDEX(name(5))'
   );

    $sql =" INSERT INTO `guest` (`id`, `name`, `surname`, `checkin`) VALUES
(1, 'new', 'user1s', 0),
(2, 'user2', 'user2s', 0),
(3, 'user3', 'user3s', 10),
(4, 'user4', 'user4s', 0),
(5, 'sadro', 'sadri', 0),
(6, 'sdaf', 'fasd', 1),
(7, 'sfd', 'fghdj', 1),
(8, 'fasd', 'sdaf', 1),
(9, 'sfd', 'fasdfasd', 1),
(10, 'fasd', 'fasds', 1),
(11, 'sdfa', 'fasd', 1),
(12, 'gadf', 'adgf', 1),
(13, 'csdzxg', 'afsdg', 1),
(14, 'gafd', 'afdg', 1),
(15, 'asdfg', 'fadg', 1),
(16, 'adfg', 'fadg', 1),
(17, 'fadg', 'adfg', 1),
(18, 'aagsdf', 'adfg', 1),
(19, 'fdhasg', 'fasdg', 1),
(20, 'sdfg', 'fsdg', 1),
(21, 'dsfga', 'adfg', 0),
(22, 'fdgs', 'asdfg', 0),
(23, 'asdgf', 'adfg', 0),
(24, 'afdgg', 'adfg', 1),
(25, 'adfghh', 'adfygh', 0),
(26, 'asdfhfg', 'adsfhg', 1),
(27, 'sfdgh', 'sfdgh', 1),
(28, 'adfghd', 'adfh', 0),
(29, 'adfhfgasj', 'fsgjfj', 0),
(30, 'sfgjdfsghj', 'dghjdj', 0),
(31, 'sfghfshjd', 'dhgjdghj', 0)
";
// Insertin data
 query($pdo, $sql);



    ?>
  </body>
</html>

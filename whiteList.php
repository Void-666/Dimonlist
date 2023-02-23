<title>Whitelist</title>
<link rel="stylesheet" href="css/styles.css">
<table align="center" border="1" width="100%">
  <tr>
    <th><a href="index.php"><h2>List</h2></a></th>
    <th><a href="editors.php"><h2>Editors</h2></a></th>
    <th><a href="leaderboard.php"><h2>Leaderboard</h2></a></th>
        <th><a href="whiteList.php"><h2>Whitelist</h2></a></th>
    <th><a href="docs"><h2>Правила</h2></a></th>
  </tr>
</table>
<div class="level"><h1>Whitelist</h1></div>
<?php
include "data.php";
$whitelist = [0];
echo '<div class="level"><h2>'.$rawplayers[implode($whitelist)]['name'].'</h2></div><br>';
?>
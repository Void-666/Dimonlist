<title>Editors</title>
<table align="center" border="1" width="100%">
  <tr>
    <th><a href="index.php"><h2>List</h2></a></th>
    <th><a href="editors.php"><h2>Editors</h2></a></th>
    <th><a href="leaderboard.php"><h2>Leaderboard</h2></a></th>
        <th><a href="whiteList.php"><h2>Whitelist</h2></a></th>
    <th><a href="docs"><h2>Правила</h2></a></th>
  </tr>
</table>
<link rel="stylesheet" href="css/styles.css">
<h1>Editors:</h1>
<?php
include 'data.php';
for ($i = 0; $i < count($raweditors); $i++){
$editors = $raweditors[$i];
echo '<div class="editors"> <a href="'.$editors['url'].'"><img src="assets/'.$editors['class'].'.svg" width=32 height=32 alt="'.$editors['class'].'"></div><div class="editors"><h2 valign="top">'.$editors['name'].'</h2></a></div>';
}
?>
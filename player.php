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
<?php
include "data.php";
$id = htmlspecialchars($_GET['id']);
$players = $rawplayers[$id];
$player = $players['name'];
$verified = implode($players['verified']);
$mainList = implode($players['mainList']);
$record = $rawlist[$mainList]['records'][$player];
$fps = $record['fps'];
$percent = $record['percent'];
$percentMlply = ($percent/100);
$legacyList = implode($players['legacyList']);
$vlvl = ($rawlist[$verified]['points']*1.25);
$mlvl = ($rawlist[$mainList]['points']*$percentMlply);
$llvl = $rawlist[$legacyList]['points'];
$points = ($vlvl + $mlvl + $llvl);
echo '<div align="center"><h2>'.$players['name'].'<h2>';
echo '<h3>Points: '.$points.'</h3>';
if (empty($players['verified']) == true) {
	echo '<strong>Player didnt verified levels</strong><br>';
} else {
echo '<h3>Verified levels:<h3><strong><a class="invis" href="https://youtube.com/watch?v='.$rawlist[$verified]['verificationId'].'">'.$rawlist[$verified]['name'].'</a></strong><br>';
}
if (empty($players['mainList']) == true) {
	echo  '<strong>Player didnt completed main list levels</strong><br>';
} else {
echo '<h3>Main list completed levels:<h3><strong><a class="invis" href="https://youtube.com/watch?v='.$record['video'].'">'.$rawlist[$mainList]['name'].'</a></strong><br>';
}
if (empty($players['legacyList']) == true) {
	echo  '<strong>Player didnt completed legacy list levels</strong></div>';
} else {
echo '<h3>Legacy list completed levels:<h3><strong>'.$rawlist[$legacyList]['name'].'</strong></div>';
}
?>
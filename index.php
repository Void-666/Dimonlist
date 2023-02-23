<head><title>Silent GDPS Demonlist</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<table align="center" border="1" width="100%">
  <tr>
    <th><a href="index.php"><h2>List</h2></a></th>
    <th><a href="editors.php"><h2>Editors</h2></a></th>
    <th><a href="leaderboard.php"><h2>Leaderboard</h2></a></th>
    <th><a href="whiteList.php"><h2>Whitelist</h2></a></th>
    <th><a href="docs"><h2>Правила</h2></a></th>
  </tr>
</table>
<div class="level"><h1>List:</h1></div>
<body>
<?php
include "data.php";
	for ($i = 0; $i < count($rawlist); $i++){
		$list = $rawlist[$i];
           	$creatorslength = count($list['creators']);
        echo '<div class="level"><a class="invis" href=level.php?id='.$i.'><h2>#'.$list['pos'].' - '.$list['name'].'</h2>';
                if ($creatorslength > 1) {
            echo '<div class="level"><strong>'.$list['creators'][0].' and more</strong></div>';
        } else {
            echo '<div class="level"><strong>'.implode($list['creators']).'</strong></div>';
        }
      	echo '<div class="level"><img src="https://i3.ytimg.com/vi/'.$list['showcaseId'].'/maxresdefault.jpg" width=480 height=240></a></div>';
    }
?>
</body>
<link rel=stylesheet href="css/styles.css">
<table align="center" border="1" width="100%">
  <tr>
    <th><a href="index.php"><h2>List</h2></a></th>
    <th><a href="editors.php"><h2>Editors</h2></a></th>
    <th><a href="leaderboard.php"><h2>Leaderboard</h2></a></th>
        <th><a href="whiteList.php"><h2>Whitelist</h2></a></th>
    <th><a href="docs"><h2>Правила</h2></a></th>
  </tr>
</table>
<?php
include "data.php";
include "lib/connection.php";
$id = htmlspecialchars($_GET['id']);
$list = $rawlist[$id];
$lid = $list['id'];
echo '<div class="level"><h1>'.$list['name'].'</h1>'; //levelname
echo '<strong>By '.implode(', ',$list['creators']); //creators
echo '<p>Verified by '.$list['verifier']; //verifier
echo '<p>Showcase:<p><iframe src="https://youtube.com/embed/'.$list['showcaseId'].'" width=480 height=270></iframe>'; //showcase embed
echo '<p><a href="https://youtu.be/'.$list['verificationId'].'">Verification video</a>'; //verification redirect
echo '<p>Details:</p></strong>'; //objects, song link, gdbrowser link, etc
echo '<table border="1" align="center"><tr><th>Objects</th><th>In-game difficulty</th><th>Song</th><th>GDBrowser link</th><th>Points</th></tr><tr>';
$stmt = $pdo->prepare('SELECT * FROM levels WHERE levelID = :id');
$stmt->execute([':id'=>$lid]);
$details = $stmt->fetch(PDO::FETCH_ASSOC); //getting server level data
$stmt2 = $pdo->prepare('SELECT * FROM songs WHERE ID = :sid');
$stmt2->execute([':sid'=>$details['songID']]);
$songdetails = $stmt2->fetch(PDO::FETCH_ASSOC); //getting song data
echo '<td>'.$details['objects'].'</td>'; //objects
if ($details['starDemonDiff'] == 3) { //difficulty
echo '<td>Easy Demon</td>';
}
elseif ($details['starDemonDiff'] == 4) {
echo '<td>Medium Demon</td>';
}
elseif ($details['starDemonDiff'] == 5) {
echo '<td>Insane Demon</td>';
}
elseif ($details['starDemonDiff'] == 6) {
echo '<td>Extreme Demon</td>';
} else {
  echo '<td>Hard Demon</td>';
}
if ($details['songID'] > 0) {
  echo '<td><a href="'.$songdetails['download'].'">'.$songdetails['name'].' by '.$songdetails['authorName'].'</td>'; //song
} else {
echo '<td>'.$list['song'].'</td>';
}
echo '<td><a href="https://silentgdpsbrowser21.void6661.repl.co/'.$lid.'">https://silentgdpsbrowser21.void6661.repl.co/'.$lid.'</td>';
echo '<td>'.$list['points'].'</td></tr></table>'
?>
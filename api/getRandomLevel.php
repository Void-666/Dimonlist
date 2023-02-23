<title>Random Level JSON</title>
<?php
include "../data.php";
$listlength = count($rawlist);
$lvlNum = rand(0,--$listlength);
echo json_encode($rawlist[$lvlNum]);
?>
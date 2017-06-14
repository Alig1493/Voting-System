<?php
require_once '../config/dbcnnection.php';
$q = strtolower($_GET["q"]);
if (!$q) return;

$searcSql = "select Name, UserID from std_admissioninfo where (`Name` LIKE '%".$q."%') OR (`UserID` LIKE '%".$q."%')";
$searchQuery = mysql_query($searcSql);
while($dataSearch = mysql_fetch_array($searchQuery)) {
	$UserID = $dataSearch['UserID'];
	$Name = $dataSearch['Name'];
	echo "$Name|$UserID\n";
}

?>

<?php /*?><?php
require_once '../config/dbcnnection.php';
$q = strtolower($_GET["q"]);
if (!$q) return;

$searcSql = "select DISTINCT name as name, email, userid from candidateinfo where (`name` LIKE '%".$q."%') OR (`email` LIKE '%".$query."%') OR (`userid` LIKE '%".$q."%')";
$searchQuery = mysql_query($searcSql);
while($dataSearch = mysql_fetch_array($searchQuery)) {
	$userid = $dataSearch['userid'];
	$name = $dataSearch['name'];
	$email = $dataSearch['email'];
	echo "$name|$userid|email\n";
}

?><?php */?>

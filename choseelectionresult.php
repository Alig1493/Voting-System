<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");
$electionno="";
$msg="";
$submit=(isset($_POST['Submit']) ? strip_tags($_POST['Submit']):'');
if($submit=="Enter"){
if(empty($_POST['eid'])){
$msg="Enter election id.";
}
else{
		$eid=$_POST['eid'];
		$timechk=mysql_query("select starttime, endtime,publish from electionstartend where electionid=$eid");
		$check=mysql_fetch_array($timechk);
		$strt=$check["starttime"];
		$end=$check["endtime"];
		$entry=$check["publish"];
		$datetime=date('Y-m-d H:i:s');
		if($datetime>$end && $entry==1)
		{
			header("location:result.php");
		}
		else
			$msg="Please wait you cannot see the result now!";
	
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| CHOOSE ELECTION SYSTEM ||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php

if(isset($_SESSION['voterid']))
{
require_once('top_nav.php');

?>

<div id = "content_main">

    <?php
    }
    ?>


<div id="header">
</div>
<div id="menu">
    <ul>
        <li> <a href="index.php"> |  Home  |</a></li>
        <li>
            <?php

            if(isset($_SESSION['voterid']))
            {
                echo "<a href='choose_election.php'>";
            }

            else
            {
                echo "<a href='login.php'>";
            }

            ?>|  Voting  |</a></li>
        <li>
            <a href="choseelectionresult.php">|  Result  |</a></li>
        <li>
            <a href="#" >|  About  |</a></li>
        <li>
            <a href="#" >|  Instructions  |</a></li>
        <li>
            <a href="#">|  Contact Us  |</a></li>
    </ul>
</div>

<div id="content">
</div>

<form id="show" method="post" action="">
    <label>PARLIAMENTARY ELECTIONS ID:</label>
    <input type="number" name="eid" value= "<?php echo $electionno?>" />
    <input type="submit" name="Submit" value="Enter" />
    <br>
    <br>
    <?php echo "<h3>$msg</h3>"; ?>
</form>


<div id="footer">
  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>
    </div>

</body>
</html>

<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");
$eid = $_SESSION['electionid'];
$msg="";
$timechk=mysql_query("select starttime, endtime from electionstartend where electionid=$eid");
$check=mysql_fetch_array($timechk);
$strt=$check["starttime"];
$end=$check["endtime"];
$datetime=date('Y-m-d H:i:s');

//echo "$strt, $end, $datetime";

if($datetime>=$strt && $datetime<=$end){
    //echo "something";
if(isset($_POST['Submit'])){
    //echo "something";

    header("location:parliamentary.php");
}

}
else{
	$msg="Please wait you cannot vote now!!";
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
        <h5><?php echo $msg; ?></h5>
        <label>Parliamentary Elections</label>
        <input type="submit" name="Submit" value="PARLIAMENTARY" />
    </form>


<div id="footer">

  <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>

    </div>

</body>
</html>

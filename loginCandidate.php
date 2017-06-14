<?php 
include("functions.php");
include("admin/php/connect_to_mysql.php");
session_start();
global $errormsg;
$errormsg='';
$collect='';
$submit=(isset($_POST['Submit']) ? strip_tags($_POST['Submit']):'');
if($submit=="Submit"){
$collect = login($_POST);
if($collect == 'Success'){
$_SESSION['username']=$_POST['txtusername'];
$_SESSION['voterid']=$_POST['txtvoterid'];
/*echo "Success";*/

    /*$voter_id = $_SESSION['voterid'];

    $chk = mysql_query("select voter.voter_id from voter where voter_id ='$voter_id'");
    $numrows = mysql_num_rows($chk);

    if($numrows > 0)
    {
        echo "Candidate Already Exists.";
        header('Refresh: 5; URL = loginCandidate.php');
    }
    else*/
        header("location:candidateregistration.php");

    exit;
}
else
{
    $errormsg="Please provide username/password/region correctly";}
}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING REGISTRATION SYSTEM||</title>
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
    <p style="text-align:center; color:#FF0000;"><strong>
    <?php echo "$errormsg"; ?>
</div>

<div>

<h3>Candidate login Form</h3>

<form id="login_form" method="post" action="">

    <label>USERNAME</label>
    <input type="text" name="txtusername" id = "u_name" />
    <br>
    <br>
    <label>PASSWORD</label>
    <input type="password" name="txtvoterid" id = "password" /></td>
    <br>
    <br>
    <label>Region/Division</label>
    <select name="txtregion">
        <option value="barisal">barisal</option>
        <option value="chittagong">chittagong</option>
        <option value="dhaka">dhaka</option>
        <option value="khulna">khulna</option>
        <option value="rajshahi">rajshahi</option>
        <option value="rangpur">rangpur</option>
        <option value="syhlet">syhlet</option>
    </select>
    <br>
    <br>

    <input type="submit" name="Submit" value="Submit" id = "submit"/>
    <input type="reset" name="Submit2" value="Reset" id = "reset"/>

</form>

    </div>


<div id="footer">
	<p>&nbsp;</p>
	<p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>
    </div>
</body>
</html>

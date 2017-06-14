<?php
include("functions.php");
include("admin/php/connect_to_mysql.php");
$collect='';
global $errormsg;
$errormsg='';
$submit=(isset($_POST['Submit']) ? strip_tags($_POST['Submit']):'');
if($submit=="Submit"){
$collect = login($_POST);
if($collect == 'Success'){
session_start();
echo "Success";
$_SESSION['username']=$_POST['txtusername'];
$_SESSION['voterid']=$_POST['txtvoterid'];
$_SESSION['region']=$_POST['txtregion'];
$_SESSION['electionid']=$_POST['txtelectionid'];

header("location:profile.php");
exit;}else{ $errormsg="Please provide username/password/region correctly";}
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
}

else
{
require_once('top_nav_2.php');

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
    </strong></p>
</div>

    <div>

        <h3>Login Form</h3>

        <form id="login_form" method="post" action="">

            <label>Username</label>
            <input type="text" name="txtusername" id = "u_name">
            <br>
            <br>

            <label>Password</label>
            <input type="password" name="txtvoterid" id = "password" >
            <br>
            <br>

            <label>ELECTION ID</label>
            <input type="number" name="txtelectionid" id ="election_id">
            <br>
            <br>


            <label>Region</label>
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
            <td><input type="reset" name="Submit2" value="Reset" id = "reset"/></td>

        </form>
    </div>


    <div id="footer">
	<p>&nbsp;</p>
	<p>Copyright &copy; E-VOTING SYSTEM</a></p>
    </div>
    </div>

</body>
</html>

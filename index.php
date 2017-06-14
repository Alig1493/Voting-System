<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING SYSTEM ||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php
session_start();

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

<div>

    <div id = "left">
        </div>

    <div id = "right">
    </div>

<div id="content">

</div>

    <div id = "show">
        <h2>WELCOME SPEECH FROM THE CHIEF OFFICER </h2>
        <img id = "align" src="images/chiefofficer.jpg" alt="" width="149" height="215" />
        <p id = "paragraph">Welcome to the first Electronic voting in Bangladesh.This site allows voter registration, vote casting , vote  counting etc .
        Your vote is valuable.Please vote wisely without any biasness.</p></td>


        </div>

<div id="footer">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>

    </div>

    </div>



</body>
</html>

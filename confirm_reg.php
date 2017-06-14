<?php

    session_start();
    $username = $_SESSION['username'];
    $voter_id = $_SESSION['voterid'];


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

<div id = "show">

    <h4>Your Username:</h4>
    <?php echo $username ?>
    <br>
    <h4>Your Voter_ID (also your login password):</h4>
    <?php echo $voter_id ?>

    <br>
    <br>

    <a href="login.php">Go To Main login Page!</a>


</div>

<div id="footer">

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Copyright &copy; E-voting System</a></p>

</div>

</body>
</html>

<?php


?>

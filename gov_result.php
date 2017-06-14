<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING REGISTRATION SYSTEM||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css"/>

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



<h5><a href="logout.php">LOGOUT</a></h5>

<h3>ALL UPDATED VOTING LIST OF ALL REGION</h3>

<table width="743" height="93" border="1" align="center" cellpadding="7" cellspacing="0" bgcolor="#f0f8ff">
    <tr>
        <th width="263" height="56" scope="col" >CANDIDATE NAME </th>
        <th width="215" scope="col" >PARTY</th>
        <th width="215" scope="col" >VOTES</th>
    </tr>

    <?php
    $sqlSelUsers = mysql_query("select * from electionvotes ") or die(mysql_error());
    if(mysql_num_rows($sqlSelUsers) >= 1){
        while($getRow = mysql_fetch_array($sqlSelUsers)){
            $candidatename = $getRow["cand_name"];
            $party = $getRow["party"];
            $votes = $getRow["vote_count"];
            ?>
            <tr>
                <td> <?php echo $candidatename ; ?> </td>
                <td> <?php echo  $party ; ?> </td>
                <td> <?php echo $votes ; ?> </td>
            </tr>

        <?php }
    }?>


</table>

<div id="footer">


  <p>Copyright &copy; E-Voting System</a></p>
</div>
    </div>

</body>
</html>

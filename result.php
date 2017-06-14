<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");
$sqlSelUsers = mysql_query("select sum(vote_count) from electionvotes group by party having party='BNP'") or die(mysql_error());
		if(mysql_num_rows($sqlSelUsers) >= 1){
				$getRow = mysql_fetch_array($sqlSelUsers);
						$bnpvotes = $getRow[0];
						}
						
		$sqlUsers = mysql_query("select sum(vote_count) from electionvotes group by party having party='AL'") or die(mysql_error());
		if(mysql_num_rows($sqlUsers) >= 1){
				$getRow = mysql_fetch_array($sqlUsers);
						$alvotes = $getRow[0];
						}
						
		$sqlUsersquery = mysql_query("select sum(vote_count) from electionvotes group by party having party='Workers Party'") or die(mysql_error());
		if(mysql_num_rows($sqlUsersquery) >= 1){
				$getRow = mysql_fetch_array($sqlUsersquery);
						$wpvotes = $getRow[0];
						}
						
				if($bnpvotes>$alvotes && $bnpvotes>$wpvotes)
					{
						$winparty="BNP";
						$winvotes=$bnpvotes;
					}
				else if($alvotes>$bnpvotes && $alvotes>$wpvotes)
					{
						$winparty="AL";
						$winvotes=$alvotes;
					}
					else
					{
						$winparty="Workers Party";
						$winvotes=$wpvotes;
					}


$result = mysql_query("SELECT * FROM party_image WHERE party = '$winparty' ");

while($row = mysql_fetch_array($result))
{
    $image98 = $row['path'];
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
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
	font-size: 16px;
}
-->
</style>
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

<h3>UPDATED RESULT</h3>

    <table width="743" height="93" border="1" align="center" cellpadding="7" cellspacing="0" bgcolor="#f0f8ff">
        <tr>
            <th width="263" height="56" scope="col" >CANDIDATE NAME </th>
            <th width="215" scope="col" >PARTY</th>
            <th width="215" scope="col" >VOTES</th>
        </tr>

        <tr style="text-align: center">
            <td><img width ="100" height = "100" src='<?php echo $image98;?>' /></td>
            <td> <?php echo  $winparty ; ?> </td>
            <td> <?php echo $winvotes ; ?> </td>
        </tr>



    </table>


    <div id="footer">
  <p>Copyright &copy; E-Voting System</a></p>
</div>
    </div>
</body>
</html>

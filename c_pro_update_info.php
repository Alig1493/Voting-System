<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 02-Aug-15
 * Time: 1:11 AM
 */

session_start();

include("admin/php/connect_to_mysql.php");

$username = $_SESSION['username'];
$voterid = $_SESSION['voterid'];
$region = $_SESSION['region'];
$electionid = $_SESSION['electionid'];

if (isset($_POST['Submit']))
{
    if (!empty($_POST['wealth']) && !empty($_POST['type']))
    {
        $wealth = mysql_real_escape_string($_POST['wealth'])
            . " " . mysql_real_escape_string($_POST['type']);
        $sql1 = "UPDATE candidates SET wealth = '$wealth' WHERE voter_id = $voterid ";
        $id1 = mysql_query($sql1)or die(mysql_error());
    }

    else
    {
        echo "Must have WEALTH AND wealth TYPE!!";
        header('Refresh: 5; URL = c_profile_update.php');
    }

    header('Refresh: 5; URL = c_profile.php');
}

?>
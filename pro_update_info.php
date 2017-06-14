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
    if (!empty($_POST['username']))
    {
        $username = mysql_real_escape_string($_POST['username']);
        $sql1 = "UPDATE voter SET username = '$username' WHERE voter_id = $voterid ";
        $id1 = mysql_query($sql1)or die(mysql_error());
        $_SESSION['username'] = $username;
    }

    if (!empty($_POST['fname']))
    {
        $firstname = mysql_real_escape_string($_POST['fname']);
        $sql2 = "UPDATE voter SET firstname = '$firstname' WHERE voter_id = $voterid ";
        $id2 = mysql_query($sql2)or die(mysql_error());
    }

    if (!empty($_POST['lname']))
    {
        $lastname = mysql_real_escape_string($_POST['lname']);
        $sql3 = "UPDATE voter SET lastname = '$lastname' WHERE voter_id = $voterid ";
        $id3 = mysql_query($sql3)or die(mysql_error());
    }

    if (!empty($_POST['age']))
    {
        $age = $_POST['age'];
        $sql4 = "UPDATE voter SET age = $age WHERE voter_id = $voterid ";
        $id4 = mysql_query($sql4)or die(mysql_error());
    }

    if (!empty($_POST['address']))
    {
        $address = mysql_real_escape_string($_POST['address']);
        $sql5 = "UPDATE voter SET address = '$address' WHERE voter_id = $voterid ";
        $id5 = mysql_query($sql5)or die(mysql_error());
    }

    if (!empty($_POST['phone']))
    {
        $number = mysql_real_escape_string($_POST['phone']);
        $sql6 = "UPDATE voter SET phone = '$number' WHERE voter_id = $voterid ";
        $id6 = mysql_query($sql6)or die(mysql_error());
    }


    if (!empty($_POST['occupation']))
    {
        $occupation = mysql_real_escape_string($_POST['occupation']);
        $sql7 = "UPDATE voter SET occupation = '$occupation' WHERE voter_id = $voterid ";
        $id7 = mysql_query($sql7)or die(mysql_error());
    }

    header('Refresh: 5; URL = profile.php');
}

?>
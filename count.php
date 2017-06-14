<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");
$vid=$_SESSION['voterid'];

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
$check=mysql_query("select votedornot from voted where voter_id=$vid") or die(mysql_error());
$chk=mysql_fetch_row($check);
if($chk[0]==0){
    $voter_id = $_GET['voterId'];
    $result = mysql_query("SELECT vote_count FROM electionvotes where voter_id=$voter_id");
    while($row = mysql_fetch_row($result)) {
        // $names = $row[1];
        $inc = $row[0];
        $inc = $inc + 1;

        mysql_query("UPDATE electionvotes SET vote_count = $inc WHERE  voter_id=$voter_id  ");
        mysql_query("UPDATE voted SET votedornot=1 where voter_id=$vid");
        mysql_query("UPDATE voted SET party=(select party from candidates where voter_id=$voter_id) where voter_id=$vid");


    }

    echo $inc;
}else
    echo "You have already voted!";
echo '</response>';
?>
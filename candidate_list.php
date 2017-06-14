<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");

$username = $_SESSION['username'];
$voterid = $_SESSION['voterid'];
$region = $_SESSION['region'];
$electionid = $_SESSION['electionid'];


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

</div>

    <div>

        <form id = "login_form3" method="post" action="candidate_list_search.php">
            <h4>Go to Candidates List Search</h4>
            <input type="submit" name="Submit" value="Search" id = "submit"/>

        </form>

    </div>

<h3>UPDATED Regional Candidates List</h3>

<table width="743" border="1" align="center" cellpadding="7" cellspacing="0" bgcolor="#f0f8ff">
    <tr>
        <th width="263"  scope="col" >CANDIDATE IMAGE </th>
        <th width="263"  scope="col" >CANDIDATE NAME </th>
        <th width="215" scope="col" >PARTY</th>
        <th width="215" scope="col" >Profile</th>
    </tr>

        <?php

        $sqlSelUsers = mysql_query("select * from electionvotes where region='$region' ") or die(mysql_error());
        if(mysql_num_rows($sqlSelUsers) >= 1) {

        while ($getRow = mysql_fetch_array($sqlSelUsers)) {
        $candidatename = $getRow["cand_name"];
        $party = $getRow["party"];
        $vid=$getRow["voter_id"];
        /*echo "$voterid";*/

        $image = mysql_query("SELECT * FROM voter_image WHERE voter_id = '$vid'");
        while($row = mysql_fetch_array($image))
        {
            /*echo "$voterid";*/
            $photo = $row['path'];
        }

        $image1 = mysql_query("SELECT * FROM party_image WHERE party = '$party'");
        while($row = mysql_fetch_array($image1))
        {
            /*echo "$voterid";*/
            $photo1 = $row['path'];
        }

        echo " <tr> <td id = 'td'><img width ='100' height = '100' src='$photo' /></td>
                    <td id = 'td'>$candidatename</td>
                    <td id = 'td'><img width ='100' height = '100' src='$photo1' /></td>
                    <td id = 'td'>

                    ";?>
        <form id = "f3" method="post" action="view_c_profile.php">
            <button name = "button" type = submit value = "<?php echo  $vid ; ?> "> Profile </button>
        </form>

        </td>



            <?php


            }
            }



        else{

            echo "<h3>No Candidates Found In Your Region.</h3> ";
        }

        echo " </tr>";

            ?>



</table>


<div id="footer">
    <p>Copyright &copy; E-Voting System</a></p>
</div>

    </div>

</body>
</html>

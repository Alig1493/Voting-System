<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 01-Aug-15
 * Time: 1:49 PM
 */

session_start();

include("admin/php/connect_to_mysql.php");

$username = $_SESSION['username'];
$voterid = $_SESSION['voterid'];
$region = $_SESSION['region'];
$electionid = $_SESSION['electionid'];

$image = mysql_query("SELECT * FROM voter_image WHERE voter_id = '$voterid'");

while($row = mysql_fetch_array($image))
{

    $pro_image = $row['path'];
}

$info = mysql_query("SELECT * FROM voter WHERE voter_id = '$voterid'");

while($row = mysql_fetch_array($info))
{

    $first_name = $row['firstname'];
    $last_name = $row['lastname'];
    $gender = strtolower($row['sex']);
    $age = $row['age'];
    $address = $row['address'];
    $phone_number = $row['phone'];
    $email = $row['email'];
    $occupation = $row['occupation'];
}

if($gender == 'f' || $gender == 'female')
    $gender = "Female";

else if($gender == 'm' || $gender == 'male')
    $gender = "Female";

else
    $gender = "other";



$cand_reg = mysql_query("SELECT * FROM candidates WHERE voter_id = '$voterid'");
$numrows = mysql_num_rows($cand_reg);

while($row1 = mysql_fetch_array($cand_reg))
{

    $wealth = $row1['wealth'];
    $party = $row1['party'];
}

$party_image = mysql_query("SELECT * FROM party_image WHERE party = '$party'");

while($row2 = mysql_fetch_array($party_image))
{

    $picture1 = $row2['path'];
    /*echo "<br>"?>
    <img id = "photo" width ='100' height = '100' src="<?php echo $picture1;?>" />
    <?php
    echo "<br>";*/
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
    /*echo $party;
    echo $voterid;*/
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

<div id = "main">

        <div id = "pro_left">

            <img id = "photo" width ='200' height = '200' src="<?php echo $pro_image;?>" />

            <table id="table_short">

                <tbody>

                <tr id = "tr_short">
                    <td id = "td_short1"><h4 id = "h4">Username</h4></td>
                    <td id = "td_short2"><?php echo "$username"?></td>
                </tr>

                <tr id = "tr_short">
                    <td id = "td_short1"><h4 id = "h4">Voter ID</h4></td>
                    <td id = "td_short2"><?php echo "$voterid"?></td>
                </tr>

                <tr id = "tr_short">
                    <td id = "td_short1"><h4 id = "h44"><?php echo "$gender"?></h4></td>
                </tr>

                <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>

                </tbody>

            </table>

        </div>


    <div id = "pro_right">

        <h1>Candidate Profile Information:</h1>

        <table id="table_short1">

            <tbody>

            <tr id = "tr_short1">
                <td id = "td_short3"><h2>Full name:</h2></td>
                <td id = "td_short4"><?php echo "$first_name $last_name"?></td>
            </tr>

            <tr id = "tr_short1">
                <td id = "td_short4"><h2>Age:</h2></td>
                <td id = "td_short4"><?php echo "$age"?></td>
            </tr>

            <tr id = "tr_short1">
                <td id = "td_short3"><h2>Address:</h2></td>
                <td id = "td_short4"><?php echo "$address"?></td>
            </tr>

            <tr id = "tr_short1">
                <td id = "td_short3"><h2>Phone:</h2></td>
                <td id = "td_short4"><?php echo "$phone_number"?></td>
            </tr>

            <tr id = "tr_short1">
                <td id = "td_short3"><h2>E-mail ID:</h2></td>
                <td id = "td_short4"><?php echo "$email"?></td>
            </tr>

            <tr id = "tr_short1">
                <td id = "td_short3"><h2>Occupation:</h2></td>
                <td id = "td_short4"><?php echo "$occupation"?></td>
            </tr>

            </tbody>

        </table>

        <table id="table_short2">

            <tbody>

            <tr id = "tr_short1">
                <td id = "td_short3"><h2>Wealth:</h2></td>
                <td id = "td_short4"><?php echo "$wealth"?></td>
            </tr>

            <tr id = "tr_short1">
                <td id = "td_short4"><h2>Party:</h2></td>
                <td id = "td_short4"><?php echo "$party"?></td>
            </tr>

            <tr id = "tr_short1">
                <td id = "td_short3"><h2>Party Logo:</h2></td>
                <td id = "td_short4">
                    <img id = "photo" width ='100' height = '100' src="<?php echo $picture1;?>" />
                    <?php


                    /*$result = mysql_query("SELECT * FROM image");

                    while($row = mysql_fetch_array($result))
                    {
                        echo "<img src='".$row['path']."' />";
                        echo "<br />";
                    }

                    mysql_close($con);*/




                    /*$image = mysql_query("SELECT * FROM party_image WHERE party = '$party'");

                    while($row = mysql_fetch_array($image))
                    {

                        $picture = $row['path'];
                        echo "<br>"?>
                        <img id = "photo" width ='100' height = '100' src="<?php echo $picture;?>" />
                        <?php
                        echo "<br>";
                    }*/
                    ?>





                </td>
            </tr>

            <tr id = "tr_short1">

            </tr>

            </tbody>

        </table>


    </div>

    <div id = "pro_left2">

            <form id = "f" action="c_profile_update.php" method="post" enctype="multipart/form-data">
                <input type = "submit" id = "submit2"
                       value = "Update Profile">
            </form>


            <form id = "f" action="candidate_list_search.php" method="post" enctype="multipart/form-data">
                <input type = "submit" id = "submit2"
                       value = "Candidate List">
            </form>


    </div>

</div>
    </div>



<div id="footer">
    <p>&nbsp;</p>
    <p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>

</body>

</html>
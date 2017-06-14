<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 04-Aug-15
 * Time: 2:50 AM
 */
session_start();

include("admin/php/connect_to_mysql.php");

$username = $_SESSION['username'];
$voterid = $_SESSION['voterid'];
$region = $_SESSION['region'];
$electionid = $_SESSION['electionid'];

if (isset($_POST['button']))
{
    $value =  $_POST['button'];
}



$image = mysql_query("SELECT * FROM voter_image WHERE voter_id = '$value'");

while($row1 = mysql_fetch_array($image))
{
    $pro_image = $row1['path'];
}

$info = mysql_query("SELECT * FROM voter WHERE voter_id = '$value'");

while($row2 = mysql_fetch_array($info))
{

    $first_name = $row2['firstname'];
    $last_name = $row2['lastname'];
    $gender = strtolower($row2['sex']);
    $age = $row2['age'];
    $address = $row2['address'];
    $phone_number = $row2['phone'];
    $email = $row2['email'];
    $occupation = $row2['occupation'];
}


if($gender == 'f' || $gender == 'female')
    $gender = "Female";

else if($gender == 'm' || $gender == 'male')
    $gender = "Female";

else
    $gender = "Other";

//echo "$value";

$cand_reg = mysql_query("SELECT * FROM candidates WHERE voter_id = '$value'");
//$numrows = mysql_num_rows($cand_reg);

while($row3 = mysql_fetch_array($cand_reg))
{
    $wealth = $row3['wealth'];
    $party = $row3['party'];
}

$party_image = mysql_query("SELECT * FROM party_image WHERE party = '$party'");

while($row4 = mysql_fetch_array($party_image))
{

    $picture1 = $row4['path'];
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
            <br><br><br><br><br>
            <tr id = "tr_short">
                <td style="text-align: center" id = "td_short1"><h4 id = "h44"><?php echo "$gender"?></h4></td>
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
                </td>
            </tr>

            <tr id = "tr_short1">

            </tr>

            </tbody>

        </table>


    </div>

    <!--<div id = "pro_left2">

        <form id = "f" action="c_profile_update.php" method="post" enctype="multipart/form-data">
            <input type = "submit" id = "submit2"
                   value = "Update Profile">
        </form>


        <form id = "f" action="candidate_list.php" method="post" enctype="multipart/form-data">
            <input type = "submit" id = "submit2"
                   value = "Candidate List">
        </form>


    </div>-->

</div>



<div id="footer">
    <p>&nbsp;</p>
    <p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>
    </div>

</body>

</html>
<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 01-Aug-15
 * Time: 10:42 PM
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

    $picture = $row['path'];
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
    $occupation = $row['occupation'];
}


?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>|| VOTING REGISTRATION SYSTEM||</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="default.css" rel="stylesheet" type="text/css" />

    <script>
        /*function checkAge()
        {
            var age = document.getElementById('age');

            if(age.value <= 18){
                //The passwords match.
                //Set the color to the good color and inform
                //the user that they have entered the correct password
                alert("Age Cannot be less than 18!")
                return false;
            }

            else
                return true;
        }*/
    </script>

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
<div>

    <h3>Please complete the fields to update your information:</h3>

    <form id="update_form" method="post" action="pro_update_info.php" onsubmit = "return checkAge();">

        <label>Username</label>
        <input type="text" name="username" id = "u_name" placeholder = "<?php echo "$username"?>">
        <br>
        <br>

        <label>First Name</label>
        <input type="text" name="fname" id = "f_name" placeholder = "<?php echo "$first_name"?>">
        <br>
        <br>

        <label>Last Name</label>
        <input type="text" name="lname" id ="l_name" placeholder = "<?php echo "$last_name"?>">
        <br>
        <br>

        <label>Age</label>
        <input type="number" name="age" id ="age" placeholder = "<?php echo "$age"?>"
               onblur="checkAge(); return false;">
        <br>
        <br>

        <label>Address</label>
        <input type="text" name="address" id ="address" placeholder = "<?php echo "$address"?>">
        <br>
        <br>

        <label>Phone</label>
        <input type="text" name="phone" id ="number" placeholder = "<?php echo "$phone_number"?>">
        <br>
        <br>

        <label>Occupation</label>
        <input type="text" name="occupation" id ="occupation" placeholder = "<?php echo "$occupation"?>">
        <br>
        <br>


        <input type="submit" name="Submit" value="Submit" id = "submit"/>
        <td><input type="reset" name="Submit2" value="Reset" id = "reset"/></td>

    </form>
</div>


<div id="footer">
    <p>&nbsp;</p>
    <p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>
    </div>
</body>
</html>
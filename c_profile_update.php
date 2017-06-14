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

$info = mysql_query("SELECT * FROM candidates WHERE voter_id = '$voterid'");

while($row = mysql_fetch_array($info))
{

    $wealth = $row['wealth'];
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

    <h3>Please complete the fields to update your Candidate Information:</h3>

    <form id="update_form" method="post" action="c_pro_update_info.php" onsubmit = "">

        <label>Wealth</label>
        <input type="text" name="wealth" id = "u_name" placeholder = "<?php echo "$wealth"?>">
        <br>
        <br>

        <label>Wealth type</label>
        <select name="type">
            <option value="">----</option>
            <option value="Thousand">Thousand</option>
            <option value="Lakh">Lakh</option>
            <option value="Crore">Crore</option>
        </select>

        <br>
        <br>


        <input type="submit" name="Submit" value="Submit" id = "submit"/>
        <td><input type="reset" name="Submit2" value="Reset" id = "reset"/></td>

    </form>
</div>

    </div>


<div id="footer">
    <p>&nbsp;</p>
    <p>Copyright &copy; E-VOTING SYSTEM</a></p>
</div>
</body>
</html>
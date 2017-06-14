<?php
session_start();
include("admin/php/connect_to_mysql.php");
include("functions.php");


?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING REGISTRATION SYSTEM||</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />

    <script>
        function checkAge()
        {

            var age = document.getElementById('age');

            if(age.value < 18 || age.value == ""){
                //The passwords match.
                //Set the color to the good color and inform
                //the user that they have entered the correct password
                alert("Age Cannot be less than 18!")
                return false;
            }

            else
            return true;
        }
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

    <h3>Voter Registration Form</h3>

    <form action="confirmation.php" method="post" enctype="multipart/form-data" onsubmit = "return checkAge();">

        <label>Username :</label>
        <input id="u_name" name="u_name" placeholder="Username" type="text" required>
        <br>
        <br>

        <label>First Name :</label>
        <input id = "f_name" name="f_name" placeholder = "First Name" type="text" required>
        <br>
        <br>

        <label>Last Name :</label>
        <input id = "l_name" name="l_name" placeholder = "Last Name" type="text" required>
        <br>
        <br>

        <label>Gender :</label>
        <select id = "list1" name="list1" required>
            <option value="">---------</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <br>

        <label>Age :</label>
        <input id="age" name="age" placeholder="Age" type="number" onblur="checkAge(); return false;" required>
        <br>
        <br>

        <label>Phone Number :</label>
        <input id="number" name="number" placeholder="Phone Number" type="text" required>
        <br>
        <br>

        <label>Address :</label>
        <input id="address" name="address" placeholder="Address" type="text" required>
        <br>
        <br>

        <label>E-mail :</label>
        <input id="e_mail" name="e_mail" placeholder="E-Mail" type = "text" required>
        <br>
        <br>

        <label>Occupation :</label>
        <input id="occupation" name="occupation" placeholder="Occupation" type="text" required>
        <br>
        <br>

        <label>Region :</label>
        <select id = "list2" name="list2" required>
            <option value="">---------</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Barisal">Barisal</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Khulna">Khulna</option>
            <option value="Sylhet">Sylhet</option>
        </select>

        <br>
        <br>

        <label>Your Photo (must be less than 100Kb):</label>
        <input type="file" name="file_img" required>

        <p class = "align">
            <input name = "submit_form" type="submit" value="Submit" id = "submit">
            <input type="reset" value="Reset" id = "reset">
        </p>

    </form>
</div>

<div id="footer">
    <p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>Copyright &copy; E-voting System</a></p>
</div>
    </div>
</body>
</html>

<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");

$username = $_SESSION['username'];
$voterid = $_SESSION['voterid'];
$region = $_SESSION['region'];
$electionid = $_SESSION['electionid'];


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
        function showUser(str) {
            if (str == "") {
                document.getElementById("show_party").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("show_party").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","ajax_live.php?q="+str,true);
                xmlhttp.send();
            }
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

<div id="content">

</div>

    <div id = "login_form2">

        <h4>Search by party</h4>

        <select id = "list1" name="users" onchange="showUser(this.value)">
            <option value="">Select a party:</option>
            <option value="Workers Party">Workers Party</option>
            <option value="BNP">BNP</option>
            <option value="AL">AL</option>
        </select>

            <br>
            <br>

        <!--<label>Type name:</label>
        <input type="text" name="users" onchange="showUser(this.value)">-->

    </div>




        <?php


        {
            ?>
            <div id = "show_party">
            </div>
            <?php
        }


        {}



        {
            ?>

    <?php
        }



            ?>



<div id="footer">
    <p>Copyright &copy; E-Voting System</a></p>
</div>

    </div>

</body>
</html>

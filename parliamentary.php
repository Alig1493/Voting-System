<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");
global $names;
global $names2;
global $names3;
global $region;

$username = $_SESSION['username'];
$region=$_SESSION['region'];
$vid=$_SESSION['voterid'];
$electionid = $_SESSION['electionid'];
$MSG="";
//anpp

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>|| VOTING REGISTRATION SYSTEM||</title>

    <script type="text/javascript" src="count.js"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="count.js">
    </script>
    <script type="text/javascript" >
        function preprocess()
        {
            var e = window.event,
                btn = e.target || e.srcElement

            process(btn.id);

        }

    </script>

</head>
<body >

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

<h3>PLEASE PLACE YOUR VOTE!!</h3>


<div id="parl_form">

    <table id = "table">

    <thead>
        <th id = "th">Candidate Image</th>
        <th id = "th">Name</th>
        <th id = "th">Party</th>
        <th id = "th">View Profile</th>
        <th id = "th">
            Cast Your Vote
        </th>
    </thead>

    <tbody>

        <?php

            $sqlSelUsers = mysql_query("select * from electionvotes where region='$region' ") or die(mysql_error());
            if(mysql_num_rows($sqlSelUsers) >= 1) {

                while ($getRow = mysql_fetch_array($sqlSelUsers)) {
                $candidatename = $getRow["cand_name"];
                $party = $getRow["party"];
                $votes = $getRow["vote_count"];
                $voterid=$getRow["voter_id"];
                /*echo "$voterid";*/

                $image = mysql_query("SELECT * FROM voter_image WHERE voter_id = '$voterid'");
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
                    <button name = "button" type = submit value = "<?php echo  "$voterid" ; ?> "> Profile </button>
                </form>

                    </td>

                    <td id = 'td'>

                            <button name = "button" type = "button" id="<?php echo  $voterid ;?>"
                                    value = "<?php echo "$voterid";?>" name = "voteid"
                                    onclick="preprocess()"> Vote </button>


                <?php

                echo "
                    <div id = ".$voterid."1"." ></div>
                    </td> </tr>";
            }
        }

            ?>

             </tbody>

    </table>
</div>


<h5><a href="gov_result.php">click here to view all parties result </a></h5>

<div id="footer">
	<p>&nbsp;</p>
	<p align="center">Copyright &copy; E-VOTING SYSTEM</a></p>
</div>
    </div>
</body>
</html>
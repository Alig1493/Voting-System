<?php
session_start();
include("functions.php");
include("admin/php/connect_to_mysql.php");
global $name;
global $region;
disableComponents();
$successful="";
$welth="";

$vid=$_SESSION['voterid'];

$sqlSelUsers=mysql_query("select * from voter where voter_id='$vid'") or die(mysql_error());

if(mysql_num_rows($sqlSelUsers)==1)
{
    $getRowUser=mysql_fetch_array($sqlSelUsers);
    $fname=$getRowUser["firstname"];
    $lname=$getRowUser["lastname"];
    $name=$fname." ".$lname;
    $age=$getRowUser["age"];
    $address=$getRowUser["address"];
    $region=$getRowUser["region"];
    $phone=$getRowUser["phone"];
    $voterid=$getRowUser["voter_id"];

}



$submit=(isset($_POST["Submit"]) ? strip_tags($_POST["Submit"]):'');
if($submit=="Register")
{
    if(empty($_POST['txtparty'])){ echo 'Please select your party';
    }else if(empty($_POST['txtwealth'])){
        echo 'Please select your wealth';
    }else if(empty($_POST['type'])){
        echo 'Please select your wealth type';
    }else{
        $check=mysql_query("select count(party) from electionvotes where region='$region' AND party='$_POST[txtparty]'");
        $getR=mysql_fetch_row($check);

        if($getR[0]==0 ){
            $wealth = $_POST['txtwealth'] . " " . $_POST['type'];
            mysql_query("insert into candidates(voter_id, wealth,party)
							values('$_POST[txtvoterid]','$wealth','$_POST[txtparty]')") or die(mysql_error());
            mysql_query("insert into electionvotes(cand_name,party,vote_count,region,voter_id) values('$_POST[txtfirstname] $_POST[txtlastname]','$_POST[txtparty]',0,'$_POST[txtregion]','$_POST[txtvoterid]')");

            header("location:c_profile.php");

        }
        else{
            echo "you cannot select the current party!! It EXISTS!!";
        }
    }

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

<div>

    <h3>Candidate Registration Form</h3>

    <form action="" method="post" enctype="multipart/form-data" id="form">

        <label>VOTER'S ID</label>
        <input type="text" name="txtvoterid" id = "u_name" value="<?php echo $_SESSION['voterid']?>" >

        <br>
        <br>

        <label>FIRSTNAME</label>
        <input type="text" name="txtfirstname" id = "u_name" value="<?php echo $fname?>" <?php echo $txtFnameDisable; ?> />

        <br>
        <br>

        <label>LASTNAME</label>
        <input type="text" name="txtlastname" id = "u_name" value="<?php echo $lname?>" <?php echo $txtLnameDisable ?> />

        <br>
        <br>

        <label>AGE</label>
        <input type="text" name="txtage" id = "u_name" value="<?php echo $age?>" <?php echo $txtAgeDisable ?> />

        <br>
        <br>

        <label>ADDRESS</label>
        <input type="text" name="txtaddress" id = "u_name" value="<?php echo $address?>" <?php echo $txtAddressDisable ?>  />

        <br>
        <br>

        <label>STATE/DISTRICT</label>
        <input type="text" name="txtregion" id = "u_name" value="<?php echo $region?>" <?php echo $txtRegionDisable ?> />

        <br>
        <br>

        <label>PHONE</label>
        <input type="text" name="txtphone" id = "u_name" value="<?php echo $phone?>" <?php echo $txtPhoneDisable ?> />

        <br>
        <br>

        <label>SELECT PARTY</label>
        <select name="txtparty">
            <option value="">----</option>
            <option value="BNP">BNP</option>
            <option value="AL">AL</option>
            <option value="Workers Party">Workers party</option>
        </select>

        <br>
        <br>


        <label>Wealth in tk</label>
        <input type="text" name="txtwealth" id = "u_name" value="<?php $welth; ?>" />

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

        <input type="submit" name="Submit" value="Register" id = "submit"/>
        <input type="button" name="Cancel" value="Cancel Registration" onclick="location.href='profile.php';" id = "reset"/>


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

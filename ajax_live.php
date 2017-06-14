<!DOCTYPE html>
<html>
<head>



    <link href="default.css" rel="stylesheet" type="text/css" />

</head>
<body>

<h3>UPDATED Regional Candidates List</h3>

<table width="743" border="1" align="center" cellpadding="7" cellspacing="0" bgcolor="#f0f8ff">
    <tr>
        <th width="263"  scope="col" >CANDIDATE IMAGE </th>
        <th width="263"  scope="col" >CANDIDATE NAME </th>
        <th width="215" scope="col" >PARTY</th>
        <th width="215" scope="col" >Profile</th>
    </tr>


<?php

session_start();

$username = $_SESSION['username'];
$voterid = $_SESSION['voterid'];
$region = $_SESSION['region'];
$electionid = $_SESSION['electionid'];

$con = mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("votingsystem") or die(mysql_error());

$q = $_GET['q'];


?>

<?php

$sqlSelUsers90 = mysql_query("select DISTINCT * from electionvotes where region='$region' AND party = '$q'") or die(mysql_error());
if(mysql_num_rows($sqlSelUsers90) >= 1) {

    while ($getRow90 = mysql_fetch_array($sqlSelUsers90)) {
        $candidatename90 = $getRow90["cand_name"];
        $party90 = $getRow90["party"];
        $vid90=$getRow90["voter_id"];
        /*echo "$voterid";*/

        $image90 = mysql_query("SELECT DISTINCT * FROM voter_image WHERE voter_id = '$vid90'");
        while($row90 = mysql_fetch_array($image90))
        {
            /*echo "$voterid";*/
            $photo90 = $row90['path'];
        }

        $image91 = mysql_query("SELECT DISTINCT * FROM party_image WHERE party = '$party90'");
        while($row91 = mysql_fetch_array($image91))
        {
            /*echo "$voterid";*/
            $photo91 = $row91['path'];
        }

        echo " <tr> <td id = 'td'><img width ='100' height = '100' src='$photo90' /></td>
                    <td id = 'td'>$candidatename90</td>
                    <td id = 'td'><img width ='100' height = '100' src='$photo91' /></td>
                    <td id = 'td'>

                    ";?>
        <form id = "f3" method="post" action="view_c_profile.php">
            <button name = "button" type = submit value = "<?php echo  $vid90 ; ?> "> Profile </button>
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
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 06-Aug-15
 * Time: 10:50 PM
 */

session_start();

include("admin/php/connect_to_mysql.php");

$username = $_SESSION['username'];
$voterid = $_SESSION['voterid'];
$region = $_SESSION['region'];
$electionid = $_SESSION['electionid'];

/*$info = mysql_query("SELECT * FROM voter WHERE voter_id = '$voterid'");

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
}*/

$image = mysql_query("SELECT * FROM voter_image WHERE voter_id = '$voterid'");

while($row = mysql_fetch_array($image))
{

    $image2 = $row['path'];
}

$timechk=mysql_query("select starttime, endtime from electionstartend where electionid = $electionid");
$resultcheck = mysql_query("select * from electionstartend where electionid = $electionid");

$check=mysql_fetch_array($timechk);
$check2 = mysql_fetch_array($resultcheck);

$strt=$check["starttime"];

$end=$check["endtime"];

$datetime=date('Y-m-d H:i:s');

$published = $check2['publish'];

if($datetime>=$strt && $datetime<=$end)
{

    $v = 1;

}

else if($datetime>=$end && $published == 1)
{
    $v = 0;
}

else
$v = "";

?>

<div id = "top_nav">

    <header>
        <table>
            <tr>
                <td><img height = "30px" width="30px" src="<?php echo $image2?>"></td>
                <td><a href="profile.php">Profile</a></td>
                <td><a href="candidate_list_search.php">Candidates List</a></td>
                <td><a href="logout.php">Log Out</a></td>

            </tr>
        </table>
    </header>

    <footer>
        <table>
            <tr>
        <?php

                if($v == 1)
                {
                    ?>

                        <td id = "table_m"><h3><marquee>VOTE NOW!</marquee></h3></td>
                        <td><a href="choose_election.php">Go to voting page!</a></td>

                    <?php
                }
               else if($v == 0)
                {
                    ?>
                        <td id = "table_m"><h3><marquee>VOTING HAS NOW ENDED!</marquee></h3></td>
                        <td><a href="choseelectionresult.php">See Results!</a></td>

                <?php
                }

            ?>

                    </tr>
                </table>
            </footer>


</div>
<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 06-Aug-15
 * Time: 10:50 PM
 */

session_start();

include("admin/php/connect_to_mysql.php");


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

?>

<div id = "top_nav">

    <header>
        <table>
            <tr>

                <td><a href="registration.php">Sign Up!</a></td>

            </tr>
        </table>
    </header>



</div>
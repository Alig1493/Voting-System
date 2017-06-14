<?php
/**
* The logout file
* destroys the session
* expires the cookie
* redirects to index.php
*/
session_start();
	include("php/connect_to_mysql.php");
	include("php/myFunctions.php");

	unset($_SESSION['name']);

$timeout = 5; // Set timeout minutes
$logout_redirect_url = "index.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        header("Location: $logout_redirect_url");
    }
}
$_SESSION['start_time'] = time();



session_destroy();
setcookie('name', '', time() - 1*24*60*60);
setcookie('password', '', time() - 1*24*60*60);
header("location: index.php");
//echo "<meta http-equiv=\"refresh\" content=\"1;url=login.php\">" ;
?>
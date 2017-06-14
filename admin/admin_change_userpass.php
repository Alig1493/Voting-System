<?php
	session_start();
	include("php/connect_to_mysql.php");
	
	
	$msg = "";
	$msg2 = "";
	$submit = $_POST['btnSearch'];
	$submit1 = $_POST['btnChange'];
	$btnChangeDisable = "disabled";
	if($submit == "Search"){	
		if(empty($_POST['txtVoterId']))
			$msg = "User Id field is empty!";
		else{
			$sqlSelUser = mysql_query("select * from tblusers where voter_id = '$_POST[txtVoterId]'limit 1") or die(mysql_error());
			if(mysql_num_rows($sqlSelUser) == 1){
				$getUserInfo = mysql_fetch_array($sqlSelUser);
				$userID = $getUserInfo["voter_id"];
				$fname = $getUserInfo["fname"];
				$mname = $getUserInfo["mname"];
				$lname = $getUserInfo["lname"];
				$name = $lname.", ".$fname." ".$mname;
				$btnChangeDisable = "";
				
				$selUsername = mysql_query("select username from tblaccount where voter_id = '$_POST[txtVoterId]'") or die(mysql_error());
				$getUsername = mysql_fetch_array($selUsername);
				$userN = $getUsername["username"];
			}else
				$msg ="Record not found!";
		}
	}else if($submit1 == "Change"){
		if(empty($_POST['txtPass']) || empty($_POST['txtConPass']))
			$msg2 = "Password is empty!";
		else if($_POST['txtPass'] != $_POST['txtConPass'])
			$msg2 = "Password did not match!";
		else{
			mysql_query("update tblaccount set password = '$_POST[txtPass]' where voter_id = '$_POST[txtVoterId]'") or die(mysql_error());
			$msg = "Successfully changed password!";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/slider.css" />
<title>Dadads - Administrator</title>
</head>
<body id="adminpage">
<div id="main_wrapper">
    <div id="main_header">
        <img style="margin: 10px;" id = "photo" width ='100' height = '100' src="<?php echo $_SESSION["photo"];?>" />
        <br>
        <div id="admin_name"><h1>Welcome <?php echo $_SESSION["name"]; ?></h1></div>
        <br>

    </div><!-- end of header -->
	<div class="cleaner"></div>
	<div id="main_menu" class="menu_sel">
		<ul id="menu_icons">
			<li><a href="admin_addnew_user.php"><img src="images/User-Group-icon.png" /><p class="selected">Users</p></a></li>
			
		</ul>
	</div><!-- end of menu -->
	<div class="cleaner h40"></div>
	<div id="main_top"></div>
	<div id="main_con">
		<div id="sidebar">
			<h3>Manage Users</h3>
			<ul class="sidebar_menu">
			    <li><a href="admin_addnew_user.php">Add New User</a></li>
                <li><a href="admin_editdelete_user.php">Edit / Delete User</a></li>			
				<li><a  class="selected" href="admin_change_userpass.php">Change User's Password</a></li>
                <li><a href="admin_search_user.php">Search User</a></li>
				
			</ul>
		</div><!-- end of sidebar -->
		<div id="content">
			<h2>User Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg; ?><span></h2>
			
			<form name="change_userpass_form" method="post" action="admin_change_userpass.php">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="border border_tlr border_ts border_ls border_bs col_1">Voter ID:</td>
					<td class="border border_ts border_bs col_1"><input type="text" name="txtVoterId" value="<?php echo $userID; ?>" /></td>
					<td class="border border_ts border_bs border_rs border_trr col_1"><input class="src_btn" type="submit" value="Search" name="btnSearch" /></td>
				</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Name:</td>
					<td colspan="2" class="border border_bs border_rs col_4"><input class="col_4" type="text" name="txtName" value="<?php echo $name; ?>" readonly /></td>
				</tr>
			</table>
			<h2>Account Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg2; ?><span></h2>
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="border border_ts border_bs border_ls border_tlr col_1">Username:</td>
					<td colspan="3" class="border border_bs border_ts border_rs border_trr"><input type="text" name="txtUser" placeholder="Username" value="<?php echo $userN; ?>" readonly /></td>
				</tr>
				<tr>
					<td class="border border_bs border_ls col_1">New Password:</td>
					<td class="border border_bs col_1"><input type="password" name="txtPass" placeholder="Password" /></td>
					<td class="border border_bs col_02">Confirm Password:</td>
					<td class="border border_bs border_rs col_2"><input type="password" name="txtConPass" placeholder="Password" /></td>
				</tr>
			</table>
			<div class="marginleft_1">
				<input class="margintop_2 sub_btn" type="submit" name="btnChange" value="Change" <?php echo $btnChangeDisable; ?>/>
			</div>
			</form>
		</div><!-- end of content -->
		<div class="cleaner"></div>
	</div><!-- end of con -->
	<div id="main_footer">
		<div class="cleaner h40"></div>
		<center>
			 Copyright &copy; 2014 E-Voting System
		</center>
	</div><!-- end of footer -->
</div>
</body>
</html>
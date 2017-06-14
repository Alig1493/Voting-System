<?php
	session_start();
	include("php/connect_to_mysql.php");
	
	$msg = "";
	$msg2 = "";
	$submit = (isset($_POST['btnaddnew']) ? strip_tags($_POST['btnaddnew']):'');
	if($submit == "Save"){
		if(empty($_POST['txtVoterId']) || empty($_POST['txtFname']) || empty($_POST['txtMname']) || empty($_POST['txtLname']) || empty($_POST['txtNoStreet']) || empty($_POST['txtRegion']) || empty($_POST['txtDOB']) || empty($_POST['txtAge']) || empty($_POST['selGender']) || empty($_POST['txtUser']) || empty($_POST['txtPass']) || empty($_POST['txtConPass']) || empty($_POST['selUserType'])){
			$msg = "Some field is empty!";
		}else if($_POST['txtPass'] != $_POST['txtConPass']){
			$msg2 = "Password did not match!";
		}else{
			$sqlExistId = mysql_query("select voter_id from tblusers where voter_id = '$_POST[txtVoterId]'") or die(mysql_error());
			$sqlExistUsername = mysql_query("select * from tblaccount where username = '$_POST[txtUser]'") or die(mysql_error());
			if(mysql_num_rows($sqlExistId) >= 1)
				$msg = "User id is already taken";
			else if(mysql_num_rows($sqlExistUsername))
				$msg2 = "Username is already taken!";
			else{
				mysql_query("insert into tblusers(voter_id, fname, mname, lname, no_street, region, contact_no, dob, age, gender, user_type)
							values('$_POST[txtVoterId]','$_POST[txtFname]','$_POST[txtMname]','$_POST[txtLname]','$_POST[txtNoStreet]','$_POST[txtRegion]','$_POST[txtContactNo]','$_POST[txtDOB]','$_POST[txtAge]','$_POST[selGender]','$_POST[selUserType]')") or die(mysql_error());
				mysql_query("insert into tblaccount(voter_id, username, password) values('$_POST[txtVoterId]','$_POST[txtUser]','$_POST[txtPass]')") or die(mysql_error());


                $vid = mysql_real_escape_string($_POST['txtVoterId']);
                $filetmp = $_FILES["file_img"]["tmp_name"];
                $filename = $_FILES["file_img"]["name"];
                $filetype = $_FILES["file_img"]["type"];
                $filesize = getimagesize($_FILES["file_img"]["tmp_name"]);
                $filepath = "images/".$filename;

                move_uploaded_file($filetmp,$filepath);


                $sql = "INSERT INTO user_image (id,voter_id,name,path,type) VALUES ('','$vid','$filename','$filepath','$filetype')";
                $result = mysql_query($sql);

				$msg = "Successfully added new user!";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/styles.css" rel="stylesheet" type="text/css" />
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

	<div id="main_menu" class="menu_sel">
		<ul id="menu_icons">
            <li><a href="admin_addnew_user.php">
                    <img src="images/User-Group-icon.png" />
                    <p class="selected">Users</p>
                </a>
            </li>
		</ul>
	</div><!-- end of menu -->
	<div class="cleaner h40"></div>
	<div id="main_top"></div>
	<div id="main_con">
		<?php require_once('includes/left_nav.php');?>
		<div id="content">
			<h2>User Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg; ?></span></h2>
			
			<form name="addnew_user_form" method="post" action="admin_addnew_user.php" enctype="multipart/form-data">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="border border_tlr border_ts border_ls border_bs col_1">Voter ID:</td>
					<td colspan="3" class="border border_ts border_bs border_rs border_trr col_1"><input type="text" name="txtVoterId" /></td>
				</tr>
				<tr>
					<td class="border border_ls col_1"><br></td>
					<td class="border col_2">First</td>
					<td class="border col_2">Middle</td>
					<td class="border border_rs col_2">Last</td>
				</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Name:</td>
					<td class="border border_bs col_2"><input type="text" name="txtFname" /></td>
					<td class="border border_bs col_2"><input type="text" name="txtMname" /></td>
					<td class="border border_bs border_rs col_2"><input type="text" name="txtLname" /></td>
				</tr>
				<tr>
					<td class="border border_ls col_1"><br></td>
					<td class="border col_2">No. and Street</td>
					<td class="border col_2">Region</td>
					<td class="border border_rs col_2">Contact No.</td>
				</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Address:</td>
					<td class="border border_bs col_2"><input type="text" name="txtNoStreet" /></td>
					<td class="border border_bs col_2"><select id = "list2" name="txtRegion" required>
                            <option value="">---------</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Sylhet">Sylhet</option>
                        </select></td>
					<td class="border border_bs border_rs col_2"><input type="text" name="txtContactNo" /></td>
				</tr>
				<tr>
					<td colspan="2" class="border border_ls col_1"><br></td>
					<td class="border col_2">Age</td>
					<td class="border border_rs col_2">Gender</td>
				</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Date of Birth</td>
					<td class="border border_bs col_2"><input type="date" name="txtDOB" /></td>
					<td class="border border_bs col_2"><input type="text" name="txtAge" /></td>
					<td class="border border_bs border_rs col_2">
						<select name="selGender"><option></option><option>Male</option><option>Female</option></select>
					</td>
				</tr>
                <tr>
                    <td class="border border_ls border_bs col_1">Add Photo:</td>
                    <td class="border border_bs col_2"><input type="file" name="file_img" /></td>
                </tr>
				<tr>
					<td class="border border_bs border_ls">User Type:</td>
					<td colspan="3" class="border border_bs border_rs border_rs"><select name="selUserType"><option></option><option>Administrator</option><option>Regional officer</option></select>
				</tr>
			</table>
			<h2>Account Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg2; ?></span></h2>
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="border border_ts border_bs border_ls border_tlr col_1">Username:</td>
					<td colspan="3" class="border border_bs border_ts border_rs border_trr"><input type="text" name="txtUser" placeholder="Username" /></td>
				</tr>
				<tr>
					<td class="border border_bs border_ls col_1">Password:</td>
					<td class="border border_bs col_1"><input type="password" name="txtPass" placeholder="Password" /></td>
					<td class="border border_bs col_02">Confirm Password:</td>
					<td class="border border_bs border_rs col_2"><input type="password" name="txtConPass" placeholder="Password" /></td>
				</tr>
			</table>
			<div class="marginleft_1">
				<input class="margintop_2 sub_btn" type="submit" name="btnaddnew" value="Save"/>
				<input class="margintop_2 sub_btn" type="reset" name="btnreset" value="Reset" />
			</div>
			</form>
		</div><!-- end of content -->
		<div class="cleaner"></div>
	</div><!-- end of con -->
	<div id="main_footer">
		<div class="cleaner h40"></div>
			 Copyright &copy; 2014 E-Voting System
	</div><!-- end of footer -->
</div>
</body>
</html>
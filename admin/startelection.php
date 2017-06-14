<?php
	session_start();
	include("php/connect_to_mysql.php");
	include("php/myFunctions.php");
	
	$msg = "";
	$start="";
	$electionID="";
	$end="";
	$submit=(isset($_POST['btnadd']) ? strip_tags($_POST['btnadd']):'' );
	if($submit == "add election"){
				mysql_query("insert into electionstartend(electionid,starttime, endtime) 		     
				values('$_POST[txtelectionid]','$_POST[txtstart]','$_POST[txtend]')") or die(mysql_error());
				$msg = "Successfully added election!";
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
			<li><a href="admin_addnew_user.php"><img src="images/User-Group-icon.png" /><p class="selected">Users</p></a></li>
			
		</ul>
	</div><!-- end of menu -->
	<div class="cleaner h40"></div>
	<div id="main_top"></div>
	<div id="main_con">
		<?php require_once('includes/left_nav.php');?>
		
        <div id="content">
			<h2>Election Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg; ?></span></h2>
			
			<form name="editdelete_user_form" method="post" action="startelection.php">
			<table  cellpadding="0" cellspacing="0" border="0" width="630">
                <tbody>
				<tr>
					<td class="border border_tlr border_ts border_ls border_bs col_1">Election ID:</td>
					<td class="border border_ts border_bs col_1"><input type="text" name="txtelectionid" value="<?php echo $electionID; ?>" /></td>
					<td colspan="2" class="border border_ts border_bs border_rs border_trr"><input class="src_btn" type="submit" name="btnadd" value="add election" /></td>
				</tr>
				<tr>
					<td class="border border_ls col_1"><br></td>
					<td class="border col_2" >Start Time(year-month-day hr:min:sec)</td>
					<td id = "r" >End Time(year-month-day hr:min:sec)</td>
					</tr>
				<tr>
					<td class="border border_ls border_bs col_1">Time:</td>
					<td class="border border_bs col_2"><input type="datetime-local" name="txtstart" value="<?php echo $start; ?>" /></td>
					<td id = "b"><input type="datetime-local" name="txtend" value="<?php echo $end; ?>" /></td>
					
				</tr>
                </tbody>
				
				
				
			</table>
			
			
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
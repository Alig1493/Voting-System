<?php
session_start();
include("php/connect_to_mysql.php");
$eid="";
$display="";
$sqlSelUsers = mysql_query("select sum(vote_count) from electionvotes group by party having party='BNP'") or die(mysql_error());
		if(mysql_num_rows($sqlSelUsers) >= 1){
				$getRow = mysql_fetch_array($sqlSelUsers);
						$bnpvotes = $getRow[0];
						}
						
		$sqlUsers = mysql_query("select sum(vote_count) from electionvotes group by party having party='AL'") or die(mysql_error());
		if(mysql_num_rows($sqlUsers) >= 1){
				$getRow = mysql_fetch_array($sqlUsers);
						$alvotes = $getRow[0];
						}
						
		$sqlUsersquery = mysql_query("select sum(vote_count) from electionvotes group by party having party='Workers Party'") or die(mysql_error());
		if(mysql_num_rows($sqlUsersquery) >= 1){
				$getRow = mysql_fetch_array($sqlUsersquery);
						$wpvotes = $getRow[0];
						}
						
				if($bnpvotes>$alvotes && $bnpvotes>$wpvotes)
					{
						$winparty="BNP";
						$winvotes=$bnpvotes;
					}
				else if($alvotes>$bnpvotes && $alvotes>$wpvotes)
					{
						$winparty="AL";
						$winvotes=$alvotes;
					}
					else
					{
						$winparty="Workers Party";
						$winvotes=$wpvotes;
					}
	
	$msg = "";
	$displayTitle = "";
	$displayContent = "";
	
	$submit = (isset($_POST['btnSearch']) ? strip_tags($_POST['btnSearch']):'');
	if($submit == "Search"){
		$searchid = $_POST['txteid'];
		if(empty($searchid))
				$msg = "Search option / name is empty!";
			else{
				$eid=$_POST['txteid'];
				
				$sqlSelUsers = mysql_query("select * from electionstartend where electionid= $eid ") or die(mysql_error());
				if(mysql_num_rows($sqlSelUsers) >= 1){
						while($getRowUser = mysql_fetch_array($sqlSelUsers)){
						
                            mysql_query("update electionstartend set publish=1 where electionid=$eid") or die(mysql_error());
                            mysql_query("insert into winner(electionid,party,votes)values($eid,'$winparty',$winvotes)");
                            mysql_query("update voted set votedornot = 0") or die(mysql_error());
																			}
													}
									$display.='<p>Congratulation '.$winparty.' !!</p>
          						  <p>You have won the '.$eid .'election with '.$winvotes.' votes!!</p>';
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
			<li><a href="admin_addnew_user.php"><img src="images/User-Group-icon.png" /><p class="selected">Users</p></a></li>
			
		</ul>
	</div><!-- end of menu -->
	<div class="cleaner h40"></div>
	<div id="main_top"></div>
	<div id="main_con">
		<?php require_once('includes/left_nav.php');?>
		<div id="content">
			<h2>User Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg; ?></span></h2>
			
			<form name="search_user_form" method="post" action="adminresult.php">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td >Input Election ID:</td>
					<td><input type="number" name="txteid" value="<?php $electionid?>" /></td>
					<td ><input type="submit" name="btnSearch" value="Search" /></td>
                    <td ><input type="submit" name="btnpublish" value="publish" /></td>
				</tr>
			</table>
			<div class="cleaner"></div>
			<?php echo $display; ?>
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
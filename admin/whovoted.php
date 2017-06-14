<?php
	session_start();
	include("php/connect_to_mysql.php");
	include("php/myFunctions.php");
	$reg=$_SESSION["reg"];
	$msg = "";
	$displayTitle = "";
	$displayContent = "";
	
	
		
		
		
			 
				$sqlSelUsers = mysql_query("select v.voter_id,v.party,v.time,v.votedornot,e.firstname from voted v, voter e where v.voter_id=e.voter_id ") or die(mysql_error());
				if(mysql_num_rows($sqlSelUsers) >= 1){
					$displayTitle .= '<table cellpadding="0" cellspacing="0" border="0" class="margintop_3">
									<tr style="background-color: #401; color: white;">
									<td class="border border_ts border_bs border_ls col_1">Voter Id</td>
									<td class="border border_ts border_bs border_ls col_03">Name</td>
									<td class="border border_ts border_bs border_ls col_4">Vote time</td>
									<td class="border border_ts border_bs border_ls border_rs col_1">Party voted</td></tr>';
					while($getRowUser = mysql_fetch_array($sqlSelUsers)){
						$voteornot=$getRowUser["votedornot"];
					if($voteornot==1){
						$userID = $getRowUser["voter_id"];
						$party = $getRowUser["party"];
						$name=$getRowUser["firstname"];
						$votetime = $getRowUser["time"];
						
						
						
						$displayContent .= '<tr style="background-color: #2ef; color: black;">
						<td style="font-size: 11px; border-bottom-style: double;">'.$userID.'</td>
						<td style="font-size: 11px; border-bottom-style: double;"><a href="whovoted.php?userid='.$userID.'" style="color: #001;">'.$name.'</a></td>
						<td style="font-size: 11px; border-bottom-style: double;">'.$votetime.'</td>
						<td style="font-size: 11px; border-bottom-style: double;">'.$party.'</td></tr>';
						}
					}
					
					$displayContent .= '</table>';
				}else
					$msg = "No record found!";
			
			
			
		
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<title>Officer</title>
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
			<li><a href="regionalofficerpage.php"><img src="images/User-Group-icon.png" /><p class="selected">Users</p></a></li>
			
		</ul>
	</div><!-- end of menu -->
	<div class="cleaner h40"></div>
	<div id="main_top"></div>
	<div id="main_con">
		<?php if($_SESSION['user']=="Administrator")
		 			require_once('includes/left_nav.php');
				else
					require_once('includes/leftnavreg.php') ?>
		<div id="content">
			<h2>Voted Voters <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg; ?></span></h2>
			
			
			<?php echo $displayTitle; ?>
			<?php echo $displayContent; ?>
			
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
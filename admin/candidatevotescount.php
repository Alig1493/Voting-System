<?php
	session_start();
	include("php/connect_to_mysql.php");
	include("php/myFunctions.php");
	$reg=$_SESSION["reg"];
	$count=0;
	$msg = "";
	$maxname="";
	$maxid="";
	$maxparty="";
	
	$displayTitle = "";
	$displayContent = "";
	$submit = (isset($_POST['btnSearch']) ? strip_tags($_POST['btnSearch']):'');
	if($submit == "Search"){
		$searchName = (isset($_POST['txtNameSearch']) ? strip_tags($_POST['txtNameSearch']):'');
		if(empty($_POST['txtNameSearch']) || empty($_POST['selSearchOption']))
			$msg = "Search option / name is empty!";
		else{
			 if($_POST['selSearchOption'] == "Region"){
				 	$maxquery=mysql_query("select max(vote_count) from electionvotes where region='$searchName'");
					$row=mysql_fetch_array($maxquery);
					$max=$row[0];
					
					$candidatemax=mysql_query("select voter_id,cand_name,party from electionvotes where vote_count=$max");
					if(mysql_num_rows($candidatemax) >= 1){
						while($maxRow = mysql_fetch_array($candidatemax)){
							$maxname=$maxRow["cand_name"];
							$maxid=$maxRow["voter_id"];
							$maxparty=$maxRow["party"];
						
						}
					}
				$sqlSelUsers = mysql_query("select e.voter_id,e.party,e.vote_count,v.firstname from electionvotes e,voter v where e.region='$searchName' and e.voter_id=v.voter_id") or die(mysql_error());
				if(mysql_num_rows($sqlSelUsers) >= 1){
					$displayTitle .= '<table cellpadding="0" cellspacing="0" border="0" class="margintop_3">
									<tr style="background-color: #401; color: white;">
									<td class="border border_ts border_bs border_ls col_1">Voter ID</td>
									<td class="border border_ts border_bs border_ls col_03">Name</td>
									<td class="border border_ts border_bs border_ls col_4">Party</td>
									<td class="border border_ts border_bs border_ls border_rs col_1">Vote count</td></tr>';
					while($getRowUser = mysql_fetch_array($sqlSelUsers)){
						$userID = $getRowUser["voter_id"];
						$name = $getRowUser["firstname"];
						
						$votecount = $getRowUser["vote_count"];
						$party = $getRowUser["party"];
						$count=$count+1;
						
						$displayContent .= '<tr style="background-color: #2ef; color: black;">
						<td style="font-size: 11px; border-bottom-style: double;">'.$userID.'</td>
						<td style="font-size: 11px; border-bottom-style: double;"><a href="admin_editdelete_user.php?userid='.$userID.'" style="color: #001;">'.$name.'</a></td>
						<td style="font-size: 11px; border-bottom-style: double;">'.$party.'</td>
						<td style="font-size: 11px; border-bottom-style: double;">'.$votecount.'</td></tr>';
					}
					$displayContent .= '</table>';
				}else
					$msg = "No record found!";
			}else if($_POST['selSearchOption'] == "Party"){
				$maxquery=mysql_query("select max(vote_count) from electionvotes group by party having party='$searchName'");
					$row=mysql_fetch_array($maxquery);
					$max=$row[0];
					
					$candidatemax=mysql_query("select voter_id,cand_name,party from electionvotes where vote_count=$max and party='$searchName'" );
					if(mysql_num_rows($candidatemax) >= 1){
						while($maxRow = mysql_fetch_array($candidatemax)){
							$maxname=$maxRow["cand_name"];
							$maxid=$maxRow["voter_id"];
							$maxparty=$maxRow["party"];
						
						}
					}
				
				$sqlSelUsers = mysql_query("select v.firstname,e.voter_id,e.vote_count,e.region from electionvotes e,voter v where party='$searchName' and e.voter_id=v.voter_id") or die(mysql_error());
				if(mysql_num_rows($sqlSelUsers) >= 1){
					$displayTitle .= '<table cellpadding="0" cellspacing="0" border="0" class="margintop_3">
									<tr style="background-color: #401; color: white;">
									<td class="border border_ts border_bs border_ls col_1">Voter Id</td>
									<td class="border border_ts border_bs border_ls col_03">Name</td>
									<td class="border border_ts border_bs border_ls col_4">Region</td>
									<td class="border border_ts border_bs border_ls border_rs col_1">Vote Count</td></tr>';
					while($getRowUser = mysql_fetch_array($sqlSelUsers)){
						$userID = $getRowUser["voter_id"];
						$name = $getRowUser["firstname"];
						$region = $getRowUser["region"];
						$votecount = $getRowUser["vote_count"];
						$count=$count+1;
						
						$displayContent .= '<tr style="background-color: #2ef; color: black;">
						<td style="font-size: 11px; border-bottom-style: double;">'.$userID.'</td>
						<td style="font-size: 11px; border-bottom-style: double;"><a href="admin_editdelete_user.php?userid='.$userID.'" style="color: #001;">'.$name.'</a></td>
						<td style="font-size: 11px; border-bottom-style: double;">'.$region.'</td>
						<td style="font-size: 11px; border-bottom-style: double;">'.$votecount.'</td></tr>';
					}
					$displayContent .= '</table>';
				}else
					$msg = "No record found!";
			}
			
			
		}
	}

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
			<li><a href="admin_addnew_user.php"><img src="images/User-Group-icon.png" /><p class="selected">Users</p></a></li>
			
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
			<h2>User Information <span style="color: #a11; font-size: 13px; margin-left: 50px;"><?php echo $msg; ?></span></h2>
			
			<form name="search_user_form" method="post" action="candidatevotescount.php">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="border border_tlr border_ts border_ls border_bs col_1">Search by:</td>
					<td class="border border_ts border_bs"><select name="selSearchOption"><option></option><option>Party</option><option>Region</option></select></td>
					<td class="border border_ts border_bs col_1"><input type="text" name="txtNameSearch" /></td>
					<td class="border border_ts border_bs border_rs border_trr col_1"><input class="src_btn" type="submit" name="btnSearch" value="Search" /></td>
				</tr>
			</table>
			<div class="cleaner"></div>
			<?php echo $displayTitle; ?>
			<?php echo $displayContent; ?>
            <p>Total Result count= <?php echo $count; ?></p>     
			</form>
            <p text-color="red">Max vote got by: <?php echo $maxname ?>, voter id: <?php echo $maxid ?>, party: <?php echo $maxparty ?></p>
        
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

<script src = "jquery-1.11.3.js"></script>

<?php
include("admin/php/connect_to_mysql.php");



function disableComponents(){
		global $txtFnameDisable;	
		global $txtLnameDisable;	
		global $txtAddressDisable;
		global $txtRegionDisable;	
		global $txtPhoneDisable;	
		global $txtAgeDisable;
		global $txtGenderDisable;	
		
		$txtFnameDisable = "readonly";	
		$txtLnameDisable = "readonly";
		$txtAddressDisable = "readonly";	
		$txtRegionDisable = "readonly";	
		$txtPhoneDisable = "readonly";
		$txtAgeDisable = "readonly";
		$txtGenderDisable="readonly";		
		
	}

function insert($data){
	
    if(empty($data['txtfirstname'])) return 'Please enter your Firstname';
	if(empty($data['txtlastname'])) return 'Please choose your Lastname ';
	if(empty($data['txtsex'])) return 'Please choose your Sex';
	if(empty($data['txtaddress'])) return 'Please enter your Address';
	if(empty($data['txtregion'])) return 'Please enter your region ';
	if(empty($data['txtemail'])) return 'Please enter E-mail';
	if(empty($data['txtphone'])) return 'Please enter your Phone';
	if(empty($data['txtage'])) return 'Please enter your Age';
	if(empty($data['txtusername'])) return 'Please choose a username';
	if(empty($data['txtoccupation'])) return 'Please choose your occupation'; 
	
//check if username already exist
$fname = $data['txtusername'];
if($chk = mysql_query("select username from voter where username ='$fname'"));
$numrows = mysql_num_rows($chk);
if($numrows > 0) return 'USERNAME ALREADY EXIST, CHOOSE ANOTHER USERNAME';

		
if(mysql_query("INSERT INTO voter (firstname,lastname,sex,age,address,region,phone,email,occupation,username) values('".$_POST['txtfirstname']."','".$_POST['txtlastname']."','".$_POST['txtsex']."','".$_POST['txtage']."','".$_POST['txtaddress']."','".$_POST['txtregion']."','".$_POST['txtphone']."','".$_POST['txtemail']."','".$_POST['txtoccupation']."','".$_POST['txtusername']."')")){
	
return ' YOUR REGISTRATION WAS SUCCESSFUL';
}
else return 'YOUR REGISTRATION WAS NOT SUCCESSFUL';
}

function login($log){

	if(empty($log['txtusername'])) return 'Username is empty,Kindly insert your Username';
	if(empty($log['txtvoterid'])) return 'Voter ID is empty,Kindly insert your Voter ID';
	
	$uname = $log['txtusername'];
	$pass =  $log['txtvoterid'];
	$reg= $log['txtregion'];
	$elecid=$log['txtelectionid'];
	if(($result = mysql_query("SELECT username,voter_id FROM voter WHERE username = '$uname' AND voter_id = $pass AND region='$reg'")) && ($elec=mysql_query("select starttime,endtime from electionstartend where electionid=$elecid")));

	$numrows = mysql_num_rows($result);
	
	if($numrows == 1){
// Register $myusername, $mypassword and redirect to file "browse_page.php"


return "Success";
}
else 
	{return 'Invalid Login-in';}
}




	?>
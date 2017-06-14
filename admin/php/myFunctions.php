<?php
	function disableComponents(){
		global $txtFnameDisable;	
		global $txtMnameDisable;	
		global $txtLnameDisable;	
		global $txtNoStreetDisable;
		global $txtRegionDisable;	
		global $txtContactNoDisable;	
		global $txtDOBDisable;	
		global $txtAgeDisable;
		global $txtGenderDisable;	
		global $btnUpdateDisable;	
		global $btnDeleteDisable;
		$txtFnameDisable = "readonly";	
		$txtMnameDisable = "readonly";	
		$txtLnameDisable = "readonly";
		$txtNoStreetDisable = "readonly";	
		$txtRegionDisable = "readonly";	
		$txtContactNoDisable = "readonly";
		$txtDOBDisable = "readonly";	
		$txtAgeDisable = "readonly";	
		$txtGenderDisable = "disabled";
		$btnUpdateDisable = "disabled"; 
		$btnDeleteDisable = "disabled";
	}
	//----------------------------------------------------------------------------------------------------------
	function enableComponents(){
		global $txtFnameDisable;	
		global $txtMnameDisable;	
		global $txtLnameDisable;	
		global $txtNoStreetDisable;
		global $txtRegionDisable;	
		global $txtContactNoDisable;	
		global $txtDOBDisable;	
		global $txtAgeDisable;
		global $txtGenderDisable;	
		global $btnUpdateDisable;	
		global $btnDeleteDisable;
		$txtFnameDisable = "";	
		$txtMnameDisable = "";	
		$txtLnameDisable = "";
		$txtNoStreetDisable = "";	
		$txtRegionDisable = "";	
		$txtContactNoDisable = "";
		$txtDOBDisable = "";	
		$txtAgeDisable = "";	
		$txtGenderDisable = "";
		$btnUpdateDisable = ""; 
		$btnDeleteDisable = "";
	}
	//----------------------------------------------------------------------------------------------------------
	
	
	
	function selectUsersUsingId($uID){
		global $msg;
		global $voterID; 
		global $fname; 
		global $mname; 
		global $lname; 
		global $noSt; 
		global $region;
		global $contactNo; 
		global $dob; 
		global $age; 
		global $gender; 
		global $selectMaleGender; 
		global $selectFemaleGender;
		$sqlSelUsers = mysql_query("select * from tblusers where voter_id = '$uID'") or die(mysql_error());
		if(mysql_num_rows($sqlSelUsers) >= 1){
			$getRowUser = mysql_fetch_array($sqlSelUsers);
			$voterID = $getRowUser["voter_id"];
			$fname = $getRowUser["fname"];
			$mname = $getRowUser["mname"];
			$lname = $getRowUser["lname"];
			$noSt = $getRowUser["no_street"];
			$region = $getRowUser["region"];
			$contactNo = $getRowUser["contact_no"];
			$dob = $getRowUser["dob"];
			$age = $getRowUser["age"];
			$gender = $getRowUser["gender"];
			
			if($gender == "Male")
				$selectMaleGender = "selected";
			else if($gender == "Female")
				$selectFemaleGender = "selected";
			enableComponents();
		}else{
			$msg = "No record found!";
			disableComponents();
		}
	}
	//----------------------------------------------------------------------------------------------------------

<?php
	session_start();
	include("admin/php/connect_to_mysql.php");
    include("admin/php/myFunctions.php");
	
	$msg = "";
	$display = "";
	$displayContent = "";

    if(isset($_POST['submit_form']))
    {
        $username = mysql_real_escape_string($_POST['u_name']);
        $first_name = mysql_real_escape_string($_POST['f_name']);
        $last_name = mysql_real_escape_string($_POST['l_name']);
        $gender = $_POST['list1'];
        $age = $_POST['age'];
        $phone_number = mysql_real_escape_string($_POST['number']);
        $region = strtolower(mysql_real_escape_string($_POST['list2']));
        $address = mysql_real_escape_string($_POST['address']);
        $email = mysql_real_escape_string($_POST['e_mail']);
        $occupation = mysql_real_escape_string($_POST['occupation']);

        $filetmp = $_FILES["file_img"]["tmp_name"];
        $filename = $_FILES["file_img"]["name"];
        $filetype = $_FILES["file_img"]["type"];
        $filesize = getimagesize($_FILES["file_img"]["tmp_name"]);
        $filepath = "photo/".$filename;

        $chk = mysql_query("select username from voter where username = '$username'");
        $numrows = mysql_num_rows($chk);

        $chk2 = mysql_query("select firstname, lastname, email from voter where LOWER(firstname)='$first_name'
        AND LOWER(lastname)='$last_name' AND email = '$email'");
        $numrows2 = mysql_num_rows($chk2);

        if($numrows2 > 0)
        {
            echo "You have already registered as a voter!";
            header('Refresh: 5; URL = login.php');
        }

        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE)
        {
            echo "This ($email) email address is considered invalid.";
            header('Refresh: 5; URL = registration.php');
        }

        else if($filesize == false)
        {
            echo "The Uploaded File is not an Image!";
            header('Refresh: 5; URL = registration.php');
        }

        else if($_FILES["file_img"]["size"] >= 100000)
        {
            echo "Sorry, your file is too large.";
            header('Refresh: 5; URL = registration.php');
        }

        else if($numrows > 0)
        {
            echo "USERNAME ALREADY EXIST, CHOOSE ANOTHER USERNAME";
            header('Refresh: 5; URL = registration.php');
        }


        else
        {
            $sql = "INSERT INTO voter (firstname, lastname, sex, age, address, region, phone,
                    email, occupation, username) VALUES ('$first_name', '$last_name',
                    '$gender', $age, '$address', '$region', '$phone_number', '$email', '$occupation', '$username')";

            mysql_query($sql) or die(mysql_error());

            $sql2 = "SELECT * FROM voter WHERE username = '$username'";
            $id = mysql_query($sql2)or die(mysql_error());
            $row = mysql_fetch_assoc($id);

            if($row)
            {
                $voter_id = $row["voter_id"];
            }


            $sql1 = "INSERT INTO voter_image (id,voter_id,name,path,type)
            VALUES ('','$voter_id','$filename','$filepath','$filetype')";

            mysql_query($sql1) or die(mysql_error());
            move_uploaded_file($filetmp,$filepath);

            $sql3 = "INSERT INTO voted (voter_id) values ('$voter_id')";
            mysql_query($sql3) or die(mysql_error());


            header('Refresh: 5; URL = confirm_reg.php');

            $_SESSION['username']=$username;
            $_SESSION['voterid']=$voter_id;

        }


    }
?>
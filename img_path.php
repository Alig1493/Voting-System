<?php
mysql_connect("localhost", "root", "")or die(mysql_error());
mysql_select_db("votingsystem")or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>

<form action="img_path.php" method="post" enctype="multipart/form-data">

    <!--<label>Voter ID:</label>
    <input type="text" name = "id">
    <input type="file" name="file_img" />-->
    <input type="submit" name="btn_upload" value="Upload">
</form>

<?php
if(isset($_POST['btn_upload']))
{
    /*$vid = mysql_real_escape_string($_POST['id']);
    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
    $filesize = getimagesize($_FILES["file_img"]["tmp_name"]);
    $filepath = "images/".$filename;

    move_uploaded_file($filetmp,$filepath);


    $sql = "INSERT INTO user_image (id,voter_id,name,path,type) VALUES ('','$vid','$filename','$filepath','$filetype')";
    $result = mysql_query($sql);*/


}

?>

</body>
</html>

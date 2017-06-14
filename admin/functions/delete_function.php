<?php

// this delete function for std_download table
/*if(isset($_GET['id']))
{
 $query = "DELETE FROM std_download where id='$_GET[id]'";
 $result = mysql_query($query) or die(mysql_error());

}
*/
// this delete function for std_download_catagory table
if(isset($_GET['dcid']))
{
 $query = "DELETE FROM std_download_catagory where dcid='$_GET[dcid]'";
 $result = mysql_query($query) or die(mysql_error());
}


// this delete function for std_photo_gallery_catagory table
if(isset($_GET['gcid']))
{
 $query = "DELETE FROM std_photo_gallery_catagory where gcid='$_GET[gcid]'";
 $result = mysql_query($query) or die(mysql_error());
}
?>
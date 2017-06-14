<?php
$con = mysql_connect("localhost","root","");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("votingsystem", $con);

/*$result = mysql_query("SELECT * FROM image");

while($row = mysql_fetch_array($result))
{
    echo "<img src='".$row['path']."' />";
    echo "<br />";
}

mysql_close($con);*/




                    $image = mysql_query("SELECT * FROM party_image WHERE party = 'Workers Party'");

                    while($row = mysql_fetch_array($image))
                    {

                        $picture = $row['path'];
                        echo "<br>"?>
                        <img id = "photo" width ='100' height = '100' src="<?php echo $picture;?>" />
                    <?php
                        echo "<br>";
                    }
                ?>





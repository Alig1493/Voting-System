<?php
/*$result = mysql_query("SELECT a.id, a.name, a.link, Deriv1.Count FROM `mainmenu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `mainmenu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.parent=" . $parent);
*/
// mainmenu builder function, parentId 0 is the root
$id=$_GET['id'];
$type=$_GET['type'];
$name=$_GET['name'];


function display_children($parent, $level) {
$result = mysql_query("SELECT a.id,a.menutype, a.name, a.link, a.contentid, a.published, Deriv1.Count FROM `mainmenu` a  LEFT OUTER JOIN (SELECT parent, COUNT(*) AS Count FROM `mainmenu` GROUP BY parent) Deriv1 ON a.id = Deriv1.parent WHERE a.published='1' and a.menutype='mainmenu' and a.parent=". $parent. " ORDER BY a.id");
    echo "<ul>";
    while ($row = mysql_fetch_assoc($result)) {
        if ($row['Count'] > 0) {
            //echo "<li><a class='active' href='".'index.php?pages=content&type='.$row['type']."'>".$row['name']."</a>";
            //echo "<li><a class='active' href='".'index.php?pages=content&type='.$row['type']."'>".$row['name']."</a>";
            echo "<li><a href='".$row['link'].$row['contentid']."' title='".$row['name']."'>".$row['name']."</a>";
			display_children($row['id'], $level + 1);
			echo "</li>";
        } elseif ($row['Count']==0) {
            echo "<li><a href='".$row['link'].$row['contentid']."' title='".$row['name']."'>".$row['name']."</a>";
        } else;
    }
    echo "</ul>";
}
?>

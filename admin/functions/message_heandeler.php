<div style="position:relative; top:-18px">
<?php  
	if (isset($_GET['msgsuclog'])) {										
	$msgsuclog = mysql_real_escape_string($_GET['msgsuclog']);
?>		
<div class="headerRightTopLoading">
	<h1><?php echo $msgsuclog;?></h1>
</div>
<?php } ?>   

<?php  
	if (isset($_GET['success_msg'])) {										
	$success_msg = mysql_real_escape_string($_GET['success_msg']);
?>		
<div class="headerRightTopLoading">
	<h1><?php echo $success_msg;?></h1>
</div>
<?php } ?>   

<?php  
	if (isset($_GET['error_msg'])) {										
	$error_msg = mysql_real_escape_string($_GET['error_msg']);
?>		
<div class="headerRightTopLoading">
	<h1><?php echo $error_msg;?></h1>
</div>
<?php } ?>   


<?php  
	if (isset($_GET['msgsucupdate'])) {										
	$msgsucupdate = mysql_real_escape_string($_GET['msgsucupdate']);
?>		
<div class="headerRightTopLoading">
	<h1><?php echo $msgsucupdate;?></h1>
</div>
<?php } ?>   

<?php  
	if (isset($_GET['msgsucdelete'])) {										
	$msgsucdelete = mysql_real_escape_string($_GET['msgsucdelete']);
?>		
<div class="headerRightTopLoading">
	<h1><?php echo $msgsucdelete;?></h1>
</div>
<?php } ?>   
</div>




<?php  
    if (isset($_GET['msg_login_error'])) {										
    $msg_login_error = mysql_real_escape_string($_GET['msg_login_error']);
?>		
<div id="messages" style="display:block">
    <ul class="messages">
        <li class="error-msg">
            <ul><li><?php echo $msg_login_error;?></li></ul>
        </li>
    </ul>
</div>
<?php } ?>                                                    

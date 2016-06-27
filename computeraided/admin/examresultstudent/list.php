<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$classname = (isset($_GET['classname']) && $_GET['classname'] > '') ? $_GET['classname'] : '';
$class = (isset($_GET['class']) && $_GET['class'] > '') ? $_GET['class'] : '';

$sql = "SELECT user_id, user_idnumber, user_regdate, user_last_login, user_fname, user_lname, user_department
        FROM tbl_student where user_class = '$classname'
		ORDER BY user_idnumber";
$result = dbQuery($sql);

?> 


					<!-- Table -->
					<div class="table">
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">


 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <th width="120">ID Number</td>
   <th>Student Name</td>
   <th width="120">Score</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	$i += 1;
	
	$sqls = "SELECT *
        FROM tbl_studentscore where user_name='$user_idnumber' and user_class='$class'";
		$results = mysql_query($sqls);
		$show = mysql_fetch_array($results);
		$count = mysql_num_rows($results);	
		
		if ($count == 0)
		{
		$score ='<font color=red>test not taken</font>';
		}
		else
		{		
		$score = $show['user_check'].' out of '.$show['user_totalitem'].' or '.$show['user_average'].'%';
		
		}	
		
?>
  <tr class="<?php echo $class; ?>"> 
  <td width="120" align="center"><b><?php echo $user_idnumber;?>
   <td><b><?php echo $user_fname; ?> <?php echo $user_lname; ?></b>, <?php echo $user_department; ?></td>
   <td width="120" align="center"><?php echo $score; ?></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>

 </table>
 <p>&nbsp;</p>
</form>
</div>
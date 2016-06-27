<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$classname = (isset($_GET['class']) && $_GET['class'] > '') ? $_GET['class'] : '';

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
   <th>User Name</td>
   <th width="120">Register Date</td>
   <th width="120">Last login</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	$i =0;
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><h3><b><?php echo $user_fname; ?> <?php echo $user_lname; ?></b>, <?php echo $user_department; ?></td>
   <td width="120" align="center"><h3><?php echo $user_regdate; ?></td>
   <td width="120" align="center"><h3><?php echo $user_last_login; ?></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right">
   <input name="btnAddUser" type="button"  value="Add User" class="add-button" onClick="window.location.href='index.php?view=add&class=<?php echo $classname;?>';"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>
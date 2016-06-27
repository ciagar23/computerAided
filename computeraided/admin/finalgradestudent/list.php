<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$class = (isset($_GET['classname']) && $_GET['classname'] > '') ? $_GET['classname'] : '';

$sql = "SELECT user_id, user_idnumber, user_regdate, user_last_login, user_fname, user_lname, user_department
        FROM tbl_student where user_class = '$class'
		ORDER BY user_idnumber";
$result = dbQuery($sql);

?> 


					<!-- Table -->
					<div class="table">
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">


 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <th>User Name</td>
   <th width="120">ID Number</td>
   <th width="70">Delete</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);

	
	$i += 1;
?>
  <tr> 
   <td><b><a href="<?php echo WEB_ROOT;?>admin/finalgradelist/index.php?classname=<?php echo $class; ?>&student=<?php echo $user_idnumber;?>"><?php echo $user_fname; ?> <?php echo $user_lname; ?></b>, <?php echo $user_department; ?></a></td>
   <td width="120" align="center"><?php echo $user_idnumber; ?></td>
   <td width="70" align="center"><a href="javascript:deleteUser(<?php echo $user_id; ?>);" class="ico del">Delete</a></td>
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
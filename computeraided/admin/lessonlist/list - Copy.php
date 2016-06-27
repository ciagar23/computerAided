<?php
if (!defined('WEB_ROOT')) {
	exit;
}
// for paging
// how many rows to show per page
$rowsPerPage = 50;

$sql = "SELECT c_id, c_name, c_classid, c_content, c_status
        FROM tbl_lesson where c_teacher ='$session' and c_classid='$classname'
		ORDER BY c_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);

?> 
<div class="table">
<form action="processProduct.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <th>Lesson Title</td>
   <th width="70">Status</td>
   <th width="70">Delete</td>
  </tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
				if ($c_status ==0) {
			$status = 'Show';
			$status2 = '<font color=blue>Hidden</font>';
		} else {
			$status = 'Hide';
			$status2 = '<font color=red>Showed</font>';
		}
		
		
		$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><a href="<?php echo WEB_ROOT;?>admin/upload/tmp/<?php echo $c_content; ?>"><?php echo $c_name;?></a> (<?php echo $status2;?>)</td>

   <td width="70" align="center"><a href="javascript:ChangeStatus(<?php echo $c_id; ?>,<?php echo $c_status; ?>,<?php echo $classname; ?>);" class="ico del"><?php echo $status;?></a></td>
   <td width="70" align="center"><a href="javascript:deleteClass(<?php echo $c_id; ?>,<?php echo $classname; ?>);" class="ico del">Delete</a></td>
  </tr>
  <?php
	} // end while
?>
  <tr> 
   <td colspan="5" align="center">
 

   <?php 
echo $pagingLink;
   ?>
   
   </td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">No Lessons Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Item" class="add-button" onClick="window.location.href='<?php echo WEB_ROOT;?>admin/upload/upload.php?idnumber=<?php echo $session;?>&classId=<?php echo $classname; ?>'"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>


<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// make sure a product id exists
if (isset($_GET['classname']) && $_GET['classname'] > 0) {
	$classname = $_GET['classname'];
} else {
	// redirect to index.php if product id is not present
	header('Location: index.php');
}

// get product info
$sql = "SELECT c_id, c_name, c_schedule, c_subject
        FROM tbl_class where c_id ='$classname'
		ORDER BY c_name";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);



?> 
<form action="processClass.php?action=modify&productId=<?php echo $classname; ?>" method="post" enctype="multipart/form-data" name="frmAddClass" id="frmAddClass">
 <p align="center" class="formTitle">Modify Product</p>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr><td colspan="2" id="entryTableHeader">Please Add Class</td></tr>

  <tr> 
   <td width="150" class="label">Class Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" value="<?php echo $c_name;?>" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Subject</td>
   <td class="content"> <input name="txtSubject" type="text" class="box" value="<?php echo $c_subject;?>" id="txtSubject" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Schedule</td>
   <td class="content"> <input name="txtSchedule" type="text" class="box" value="<?php echo $c_schedule;?>" id="txtSchedule" size="30" maxlength="100"></td>
  </tr>  
 </table>
 <p align="center"> 
  <input name="btnModifyProduct" type="button" id="btnModifyProduct" value="Modify" onClick="checkModifyClassForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
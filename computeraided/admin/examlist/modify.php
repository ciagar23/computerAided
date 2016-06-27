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
        FROM tbl_exam where c_teacher ='$session' and c_id='$class'
		ORDER BY c_name";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);



?> 
<form action="processClass.php?action=modify&productId=<?php echo $class; ?>" method="post" enctype="multipart/form-data" name="frmAddClass" id="frmAddClass">
 <p align="center" class="formTitle">Modify Product</p>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr><td colspan="2" id="entryTableHeader">Please Add Class</td></tr>

  <tr> 
   <td width="150" class="label">Class Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" value="<?php echo $c_name;?>" size="30" maxlength="100">
   
   <input name="txtId" type="hidden" class="box" id="txtId" value="<?php echo $classname;?>"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Subject</td>
   <td class="content"> <input name="txtSubject" type="text" class="box" value="<?php echo $c_subject;?>" id="txtSubject" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Schedule</td>
   <td class="content"> <input name="txtSchedule" type="text" class="box" value="<?php echo $c_schedule;?>" id="txtSchedule" size="30" maxlength="100"></td>
  </tr>  
    <td width="150" class="label">Time</td>
   <td class="content"> <input name="txtTime" type="text" class="box" id="txtTime" size="15" maxlength="10"onKeyUp="checkNumber(this);">  <select  name="txtMinute" id="countdown_unit">  <option value="1">Seconds</option>  <option value="60">Minutes</option>  <option value="3600">Hours</option>  </select>
   
   </td>
   <tr>  
    <td width="150" class="label">Status</td>
   <td class="content"><select  name="txtStatus">  <option value="1">Show</option>  <option value="0">Hide</option>  </select>
   
   </td>
 </table>
 <p align="center"> 
  <input name="btnModifyProduct" type="button" id="btnModifyProduct" value="Modify" onClick="checkAddExamForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
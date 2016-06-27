<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT *
        FROM tbl_class where c_id='$classname'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	

?> 
<p>&nbsp;</p>
<form action="processClass.php?action=addClass" method="post" enctype="multipart/form-data" name="frmAddClass" id="frmAddClass">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr><td colspan="2" id="entryTableHeader">Please Add Exam</td></tr>

  <tr> 
   <td width="150" class="label">Exam Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="100"> 
   <input name="txtId" type="hidden" class="box" id="txtId" value="<?php echo $classname;?>">
   </td>
  </tr>  <tr> 
   <td width="150" valign="top">Instruction</td>
   <td class="content"> <textarea name="txtIns" rows="5" cols="50" class="box" id="txtIns"> </textarea> 
   </td>
  </tr>  
  <tr> 
   <td width="150" class="label">Subject</td>
   <td class="content"> <input name="txtSubject" type="text" class="box" value="<?php echo $show['c_subject'];?>" id="txtSubject" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Schedule</td>
   <td class="content"> <input name="txtSchedule" type="text" class="box" value="<?php echo $show['c_schedule'];?>" id="txtSchedule" size="30" maxlength="100"></td>
  </tr> 
   <td width="150" class="label">Time</td>
   <td class="content"> <input name="txtTime" type="text" class="box" id="txtTime" size="15" maxlength="10"onKeyUp="checkNumber(this);">  <select  name="txtMinute" id="countdown_unit">  <option value="1">Seconds</option>  <option value="60">Minutes</option>  <option value="3600">Hours</option>  </select>
   
   </td>
  </tr>  
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Item" onClick="checkAddClassForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

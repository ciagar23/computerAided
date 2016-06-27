<?php
if (!defined('WEB_ROOT')) {
	exit;
}


?> 
<p>&nbsp;</p>
<form action="processClass.php?action=addClass" method="post" enctype="multipart/form-data" name="frmAddClass" id="frmAddClass">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr><td colspan="2" id="entryTableHeader">Please Add Class</td></tr>

  <tr> 
   <td width="150" class="label">Class Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Subject</td>
   <td class="content"> <input name="txtSubject" type="text" class="box" id="txtSubject" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Schedule</td>
   <td class="content"> <input name="txtSchedule" type="text" class="box" id="txtSchedule" size="30" maxlength="100"></td>
  </tr>  
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Item" onClick="checkAddClassForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

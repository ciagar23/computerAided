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
   <td width="150" class="label">Lessons Title</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="100"> 
   </td>
  </tr>  
  		

   <input name="txtTeacher" type="hidden" class="box" value="<?php echo $idnumber;?>" id="txtTeacher">
   <input name="txtId" type="hidden" class="box" value="<?php echo $classname;?>" id="txtId">
   </td>
  </tr>     
   </td>
  </tr>  
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Item" onClick="checkAddLessonForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
	
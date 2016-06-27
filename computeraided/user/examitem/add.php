<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$classname = (isset($_GET['class']) && $_GET['class'] > '') ? $_GET['class'] : '';
?> 
<p class="errorMessage">&nbsp;</p>
<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">


 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
 <input name="txtClass" type="hidden" class="box" id="txtClass" value="<?php echo $classname;?>" >
  <tr> 
   <td width="150" class="label">Question</td>
   <td class="content">
   <textarea rows="10" cols="60" name="txtQuestion" id="txtQuestion" class="box"></textarea>
   </td>
  </tr>
    <tr> 
   <td width="150" class="label">Correct Answer</td>
   <td class="content"> <input name="txtAnswer" type="text" class="box" id="txtAnswer" size="50" maxlength="50"></td>
  </tr>
  
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add Question" onClick="checkAddUserForm();" class="box">
   
 </p>
</form>
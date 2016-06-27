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
   <td width="150" class="label">ID Number</td>
   <td class="content"> <input name="txtIdNumber" type="text" class="box" id="txtIdNumber" size="50" maxlength="50"></td>
  </tr>
    <tr> 
   <td width="150" class="label">First Name</td>
   <td class="content"> <input name="txtFName" type="text" class="box" id="txtFName" size="50" maxlength="50"></td>
  </tr>
  
  <tr> 
   <td width="150" class="label">Last Name</td>
   <td class="content"> <input name="txtLName" type="text" class="box" id="txtLName" size="50" maxlength="50"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Password</td>
   <td class="content"> <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="20" maxlength="20"></td>
  
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Register" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='../index.php';" class="box">  
 </p>
</form>
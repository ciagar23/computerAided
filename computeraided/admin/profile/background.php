<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_idnumber, user_department, user_header, user_footer
        FROM tbl_user
        WHERE user_id = $userId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=background" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
    <tr> 

    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
  
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $userId; ?>"></td>
 
  <tr> 
   <td width="150" class="label">Navigation Color</td>
   <td class="content">
   <select name="nav">
   <option value="Purple">- choose -</option>
   <option>Purple</option>
   <option>Red</option>
   <option>Blue</option>
   <option>Green</option>
   <option>White</option>
   <option>Orange</option>
   <option>Brown</option>
   <option>Black</option>
   <option>White</option>
   <option>Pink</option>
   <option>Gray</option>
   <option>Yellow</option>
   <option>Violet</option>
   <option >Turquoise</option>
   <option >BlueViolet </option>
   <option >Chartreuse</option>
   <option >Gold</option>
   
 

   </select>
    
   </td>
  </tr>
  
  
  
    <tr> 
   <td width="150" class="label">Navigation Text</td>
   <td class="content">
   <select name="navtext">
   <option value="#ffffff">- choose -</option>
   <option>Purple</option>
   <option>Red</option>
   <option>Blue</option>
   <option>Green</option>
   <option>White</option>
   <option>Orange</option>
   <option>Brown</option>
   <option>Black</option>
   <option>White</option>
   <option>Pink</option>
   <option>Gray</option>
   <option>Yellow</option>
   <option>Violet</option>
   <option >Turquoise</option>
   <option >BlueViolet </option>
   <option >Chartreuse</option>
   <option >Gold</option>
   
 

   </select>
    
   </td>
  </tr>
    <tr> 
   <td width="150" class="label">Background Color</td>
   <td class="content">
   <select name="background">
   <option value="black">- choose -</option>
   <option>Black</option>
   <option>Red</option>
   <option>Blue</option>
   <option>Green</option>
   <option>White</option>
   <option>Orange</option>
   <option>Brown</option>
   <option>Black</option>
   <option>White</option>
   <option>Pink</option>
   <option>Gray</option>
   <option>Yellow</option>
   <option>Violet</option>
   </select>
    
   </td>
  </tr>    <tr> 
   <td width="150" class="label">Header Color</td>
   <td class="content">
   <select name="headercolor">
   <option value="black">- choose -</option>
   <option>Black</option>
   <option>Red</option>
   <option>Blue</option>
   <option>Green</option>
   <option>White</option>
   <option>Orange</option>
   <option>Brown</option>
   <option>Black</option>
   <option>White</option>
   <option>Pink</option>
   <option>Gray</option>
   <option>Yellow</option>
   <option>Violet</option>
   </select>
    
   </td>
  </tr>
  
  <tr> 
   <td width="150" class="label">Header Text Color</td>
   <td class="content">
   <select name="headertext">
   <option value="#e60498">- choose -</option>
   <option>Black</option>
   <option>Red</option>
   <option>Blue</option>
   <option>Green</option>
   <option>White</option>
   <option>Orange</option>
   <option>Brown</option>
   <option>Black</option>
   <option>White</option>
   <option>Pink</option>
   <option>Gray</option>
   <option>Yellow</option>
   <option>Violet</option>
   </select>
    
   </td>
  </tr>
     
  <tr> 
   <td width="150" class="label">Table Text Color</td>
   <td class="content">
   <select name="tabletext">
   <option value="#999999">- choose -</option>
   <option>Black</option>
   <option>Red</option>
   <option>Blue</option>
   <option>Green</option>
   <option>White</option>
   <option>Orange</option>
   <option>Brown</option>
   <option>Black</option>
   <option>White</option>
   <option>Pink</option>
   <option>Gray</option>
   <option>Yellow</option>
   <option>Violet</option>
   </select>
    
   </td>
  </tr>    
  <tr> 
   <td width="150" class="label">Column Text Color</td>
   <td class="content">
   <select name="columntext">
   <option value="#a97891">- choose -</option>
   <option>Black</option>
   <option>Red</option>
   <option>Blue</option>
   <option>Green</option>
   <option>White</option>
   <option>Orange</option>
   <option>Brown</option>
   <option>Black</option>
   <option>White</option>
   <option>Pink</option>
   <option>Gray</option>
   <option>Yellow</option>
   <option>Violet</option>
   </select>
    
   </td>
  </tr>
   
 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="submit" id="btnModifyUser" value="Modify" onClick="checkAddHeaderForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
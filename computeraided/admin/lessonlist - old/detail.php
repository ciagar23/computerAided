<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$sql = "SELECT c_id, c_name, c_content
        FROM tbl_lesson where c_teacher ='$session' and c_id='$classname'
		ORDER BY c_name";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);



?>
<p>&nbsp;</p>
<form action="processProduct.php?action=addProduct" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Lesson Title:</td>
   <td class="content"><?php echo $c_name; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label" colspan="2">&nbsp;</td>
   <tr>
   <td class="content" colspan="2"> <?php echo $c_content; ?></td>
  </tr>

 </table>
 <p align="center"> 
  <input name="btnModifyProduct" type="button" id="btnModifyProduct" value="Modify Item" onClick="window.location.href='<?php echo WEB_ROOT;?>admin/lessonlist/index.php?view=modify&class=<?php echo $c_id; ?>&classname=<?php echo $classname; ?>';" class="box">
  &nbsp;&nbsp;
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
 </p>
</form>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['msg']) && $_GET['msg'] > '') ? $_GET['msg'] : '';
// for paging
// how many rows to show per page
$rowsPerPage = 5;

$sql = "SELECT c_id, c_name, c_schedule, c_subject, c_time, c_minute
        FROM tbl_quiz where c_teacher ='$session' and c_name = '$name'
		ORDER BY c_name";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));

if ($c_minute ==1)
{
$minute ='second/s';
}
else if ($c_minute ==60)
{
$minute ='minute/s';
}
else
{
$minute ='hour/s';
}


?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title><?php echo $pageTitle;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>user/include/styles/layout.css" type="text/css" />

 <script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<?php



$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'user/library/' . $script[$i]. '"></script>';
	}
}



?>

<!-- ####################################################################################################### -->
<div class="wrapper col4">
 <div id="container">
 <?php echo $successMessage;?>


<form action="processUser.php?action=login" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">

<h1> Please Log In to start the test, "<?php echo $name;?>".<br> This wil take <?php echo $c_time;?> <?php echo $minute;?></h1>
 <table border="0" align="center" cellpadding="5" cellspacing="1">
    <tr> 
   <td width="150" class="label">Student's ID Number</td>
   <td class="content"> <input name="txtsName" type="text" class="box" id="txtsName" size="50" maxlength="50"></td>
  </tr>    <tr> 
   <td width="150" class="label">Password</td>
   <td class="content"> <input name="txtPassword" type="password" class="box" id="txtPassword" size="50" maxlength="50"></td>
  </tr>
  <input name="txtClass" type="hidden" class="box" id="txtClass" value="<?php echo $classname;?>" >
<input name="txtName" type="hidden" class="box" id="txtName" value="<?php echo $name;?>" >
<tr><td colspan="2"> <input name="btnAddUser" type="button" id="btnAddUser" value="Start The Test" onClick="checkStudentForm();" class="box">
  
   </table>

  

</form>
</body>
</html>
<?
if ($errorMessage =='')
{
}
else
{
?>
<script>
alert('<?php echo $errorMessage;?>');
</script>
<?
}
?>

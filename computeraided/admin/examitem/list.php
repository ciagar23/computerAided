

<?php require_once 'add.php';?>
<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$classname = (isset($_GET['class']) && $_GET['class'] > '') ? $_GET['class'] : '';

$sql = "SELECT user_id, user_question, user_correctanswer
	  FROM tbl_examitem where user_class = '$classname'";
$result = dbQuery($sql);

?> 


					<!-- Table -->
                    
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">

 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
<?php
$i =0;
while($row = dbFetchAssoc($result)) {
	extract($row);
	

	$i += 1;
?>
  <tr> 
   <td width="120"><b><?php echo $i;?>) Question: <td></b> <?php echo nl2br($user_question); ?>
   <tr>
   <td><b>Answer:</b> <td><?php echo $user_correctanswer; ?> -<a href="javascript:deleteTest(<?php echo $user_id; ?>,<?php echo $classname; ?>);" class="ico del">Delete?</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>

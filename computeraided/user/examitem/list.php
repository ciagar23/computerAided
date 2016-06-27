
<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$rowsPerPage = 1;

$classname = (isset($_GET['class']) && $_GET['class'] > '') ? $_GET['class'] : '';
$page = (isset($_GET['page']) && $_GET['page'] > '') ? $_GET['page'] : '1';

$sql = "SELECT user_id, user_question, user_correctanswer
	  FROM tbl_examitem where user_class = '$classname'";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLinkExam($sql, $rowsPerPage);
?> 

					<!-- Table -->
					<div class="table">
<form action="processUser.php?action=add" method="post"  name="frmAddUser" id="frmAddUser">

<?php
$i =0;
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
<input name="txtClass" type="hidden" class="box" id="txtClass" value="<?php echo $classname;?>" >
<input name="txtId" type="hidden" class="box" id="txtId" value="<?php echo $user_id;?>" >
<input name="txtPage" type="hidden" class="box" id="txtPage" value="<?php echo $page;?>" >
<input name="txtName" type="hidden" class="box" id="txtName" value="<?php echo $name;?>" >
<input name="txtUser" type="hidden" class="box" id="txtUser" value="<?php echo $_SESSION['student'];?>" >

  <font size="5"><p align="center"><b> Question number <?php echo $page;?>,<br><br>
   <?php echo nl2br($user_question); ?>
   <br><br><br>
   Answer:
 <? 
 $user = $_SESSION['student'];
 
 	 	$sqls = "SELECT *
        FROM tbl_examitemscore where user_name='$user' and user_questionId=$user_id";
		$results = mysql_query($sqls);
		$show = mysql_fetch_array($results);
		$count = mysql_num_rows($results);	
		$answer= $show['user_myanswer'];
		$answerId= $show['user_id'];	
		$check= $show['user_check'];

if($check == 1)
{
$score ='Correct';
}
else
{
$score ='Wrong';
}
	
		
   if ($count ==0)
   {
   ?>
   
   <input name="txtAnswer" type="text" class="box" id="txtAnswer" size="50" maxlength="50">
  <input name="btnAddUser" type="button" id="btnAddUser" value="OK" onClick="checkAddUserForm();" class="box">
  <br>
  <input name="txtCorrect" type="hidden" class="box" id="txtCorrect" value="<?php echo $user_correctanswer; ?>" />
  <?
  }
  else
  {
  ?>
  <?php echo $answer;?> - <a href="javascript:deleteItem(<?php echo $answerId; ?>);" class="ico del">change</a>
  <?php
  
  }
  

} // end while

?>
<br>
<br>
  <?php 
   echo $pagingLink;
   ?><a href="index.php?view=exit&class=<?php echo $classname;?>" target="_parent">[done]</a>

</form>
</div>
<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['msg']) && $_GET['msg'] > '') ? $_GET['msg'] : '';
// for paging
// how many rows to show per page
$rowsPerPage = 5;

$sql = "SELECT c_id, c_name, c_schedule, c_subject, c_time, c_minute
        FROM tbl_quiz where c_teacher ='$session'
		ORDER BY c_name";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));

if ($c_minute ==1)
{
$minute ='second/s';
}
else if ($c_minute ==60)
{
$minute ='minutes/s';
}
else
{
$minute ='hours/s';
}


?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Touch of Purple | Full Width</title>
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
<?
	$user = $_SESSION['student'];
 	 	$sqls = "SELECT * FROM tbl_examitemscore where user_name='$user' and user_check=1 and user_class='$classname'";
		$results = mysql_query($sqls);
		$show = mysql_fetch_array($results);
		$count = mysql_num_rows($results);	
		$answer= $show['user_myanswer'];	
		$check= $show['user_check'];	
		$class= $show['user_class'];
		
		$totalitem = mysql_num_rows(mysql_query("SELECT * FROM tbl_examitem where user_class='$classname'"));
		
			$average = ($count/$totalitem)*100;
		
		$checkstudent = mysql_num_rows(mysql_query("SELECT * FROM tbl_studentscore where user_name='$user' and user_class='$classname'"));
		if ( $checkstudent != 0)
		{
		}
		else
		{
			
			
				$sql3   = "INSERT INTO tbl_studentscore (user_class,user_check,user_name,user_totalitem,user_average)
		          VALUES ('$classname','$count','$user','$totalitem','$average')";
				dbQuery($sql3);
				}
?>

<h1>Your score is <?php echo $count;?> out of <?php echo $totalitem;?></h1>
<br><h1><?php echo number_format($average,0);?> %</h1>
<br> <a href="<?php echo WEB_ROOT;?>user/">click here to go home</a>
  


  

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

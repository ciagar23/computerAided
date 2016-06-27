<?php
if (!defined('WEB_ROOT')) {
	exit;
}
// for paging
// how many rows to show per page
$rowsPerPage = 20;

$sql = "SELECT c_id, c_name, c_schedule, c_subject
        FROM tbl_quiz where c_teacher ='$session' and c_classid='$classname'
		ORDER BY c_id";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);


?> 
<div class="table">
<form action="processProduct.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <h2>Quiz Scores</h2>
   <th>Quiz Name</td>
   <th width="100">Total Item</td>
   <th width="100">Score</td>
   <th width="100">Average</td>
  </tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	$t = 0;
	$s = 0;

	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
	

		$i += 1;
		
				$checkclass = mysql_num_rows(mysql_query("SELECT * FROM tbl_studentscore where user_name='$student' and user_class='$c_id'"));
		if ( $checkclass != 0)
		{
						$sqls = "SELECT *
        FROM tbl_studentscore where user_name='$student' and user_class='$c_id'";
		$results = mysql_query($sqls);
		$show = mysql_fetch_array($results);
		$count = mysql_num_rows($results);	
		$check= $show['user_check'];
		$totalitem= $show['user_totalitem'];
		$average= $show['user_average'].'%';
		
		$t += $totalitem;
		$s += $check;
	
		}
		else
		{
			
	$check= '<font color=red>Test Not Taken';
		$totalitem= '<font color=red>Test Not Taken';
		$average= '<font color=red>Test Not Taken';
				}
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $c_name; ?></td>
   <td><?php echo $totalitem; ?></td>
   <td><?php echo $check; ?></td>
   <td><?php echo $average; ?></td>
  </tr>
  <?php
	} // end while
?>
  <tr> 
   <td colspan="4" align="center">&nbsp;</td>
 

   <?php 
echo $pagingLink;
   ?>
   
   </td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">No Quiz Yet</td>
  </tr>
  <?php
}

if ($s ==0)
{
$a=0;
}
else
{
$a = ($s/$t)*100;
}
$a = number_format($a,2).' %';
?>

    <tr align="center" id="listTableHeader"> 
   <th>Total:</td>
   <th><?php echo $t; ?></td>
   <th><?php echo $s; ?></td>
   <th><?php echo $a; ?></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>

<?php require_once 'list2.php';?>

<p align="center"> <input type="button" value="Print" onclick="print()"  /></p>
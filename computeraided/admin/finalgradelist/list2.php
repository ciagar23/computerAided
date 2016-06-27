<?php
if (!defined('WEB_ROOT')) {
	exit;
}
// for paging
// how many rows to show per page
$rowsPerPage = 20;

$sql = "SELECT c_id, c_name, c_schedule, c_subject
        FROM tbl_exam where c_teacher ='$session' and c_classid='$classname'
		ORDER BY c_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);


?> 
<h2>Exam Scores</h2>
<div class="table">
<form action="processProduct.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <th>Exam Name</td>
   <th width="100">Total Item</td>
   <th width="100">Score</td>
   <th width="100">Average</td>
  </tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	$t2 = 0;
	$s2 = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
		
		$checkclass2 = mysql_num_rows(mysql_query("SELECT * FROM tbl_studentscore where user_name='$student' and user_class='$c_id'"));
		if ( $checkclass2 != 0)
		{
						$sqls2 = "SELECT *
        FROM tbl_studentscore where user_name='$student' and user_class='$c_id'";
		$results2 = mysql_query($sqls2);
		$show2 = mysql_fetch_array($results2);
		$count2 = mysql_num_rows($results2);	
		$check2= $show2['user_check'];
		$totalitem2= $show2['user_totalitem'];
		$average2= $show2['user_average'].'%';
		
			$t2 += $totalitem2;
		$s2 += $check2;
		
		}
		else
		{
			
	$check2= '<font color=red>Test Not Taken';
		$totalitem2= '<font color=red>Test Not Taken';
		$average2= '<font color=red>Test Not Taken';
				}
		
		
		
		
		
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $c_name; ?></td>
   <td><?php echo $totalitem2; ?></td>
   <td><?php echo $check2; ?></td>
   <td><?php echo $average2; ?></td>
 
  </tr>
  <?php
	} // end while
?>
  <tr> 
   <td colspan="5" align="center">
 

   <?php 
echo $pagingLink;
   ?>
   
   </td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">No Exams Yet</td>
  </tr>
  <?php
  }
  
  if ($s2 ==0)
{
$a2=0;
}
else
{
$a2 = ($s2/$t2)*100;
}
$a2 = number_format($a2,2).' %';
?>

    <tr align="center" id="listTableHeader"> 
   <th>Total:</td>
   <th><?php echo $t2; ?></td>
   <th><?php echo $s2; ?></td>
   <th><?php echo $a2; ?></td>
  </tr>
  </tr>

 </table>
 <p>&nbsp;</p>
</form>


<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();


$classname = (isset($_GET['classname']) && $_GET['classname'] != '') ? $_GET['classname'] : '';
$class = (isset($_GET['class']) && $_GET['class'] != '') ? $_GET['class'] : '';
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$student = (isset($_GET['student']) && $_GET['student'] != '') ? $_GET['student'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';	
		break;

	case 'add' :
		$content 	= 'add.php';	
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		break;

	case 'detail' :
		$content    = 'detail.php';
		break;
		
	default :
		$content 	= 'list.php';	
}

	$sqls = "SELECT *
        FROM tbl_student where user_idnumber='$student'";
		$results = mysql_query($sqls);
		$show = mysql_fetch_array($results);
		$count = mysql_num_rows($results);	
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];

$pageTitle 	= $fname.' '.$lname.' ('.$student.')';
$script    = array('exam.js');

require_once '../include/template.php';
?>

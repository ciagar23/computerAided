<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();


$classname = (isset($_GET['classname']) && $_GET['classname'] != '') ? $_GET['classname'] : '';
$class = (isset($_GET['class']) && $_GET['class'] != '') ? $_GET['class'] : '';
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'search' :
		$content 	= 'search.php';		
		$pageTitle 	= ' View Lesson';
		break;
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= ' View Lesson';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= ' Add Lesson';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= ' Modify Lesson';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = ' View Lesson Detail';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= ' View Lesson';
}




$script    = array('lesson.js');

require_once '../include/template.php';
?>

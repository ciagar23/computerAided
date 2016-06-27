<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();


$classname = (isset($_GET['classname']) && $_GET['classname'] != '') ? $_GET['classname'] : '';
$class = (isset($_GET['class']) && $_GET['class'] != '') ? $_GET['class'] : '';
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= ' View exam';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= ' Add exam';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= ' Modify exam';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = ' View exam Detail';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= ' View Quiz';
}




$script    = array('exam.js');

require_once '../include/template.php';
?>

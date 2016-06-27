<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$classname = (isset($_GET['classname']) && $_GET['classname'] != '') ? $_GET['classname'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= ' View class';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= ' Add class';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= ' Modify class';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = ' View class Detail';
		break;
		
	default :
		$content 	= 'detail.php';		
		$pageTitle 	= ' Lets Practice';
}




$script    = array('class.js');

require_once '../include/template.php';
?>

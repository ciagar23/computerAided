<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Customize';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Add Customize';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Modify Customize';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = 'View Customize Detail';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Customize';
}




$script    = array('Customize.js');

require_once '../include/template.php';
?>

<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Curriculum';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Add Curriculum';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Modify Curriculum';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = 'View Curriculum Detail';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Curriculum';
}




$script    = array('Curriculum.js');

require_once '../include/template.php';
?>

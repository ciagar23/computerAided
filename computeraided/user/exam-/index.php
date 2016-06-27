<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkuser();


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'GSO - View Users';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'GSO - Add Users';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'GSO - Modify Users';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'GSO - View Users';
}

$script    = array('student.js');

require_once '../include/template.php';
?>

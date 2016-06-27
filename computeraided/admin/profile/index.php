<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkuser();


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'header' :
		$content 	= 'header.php';		
		$pageTitle 	= 'View Profile';
		break;
		
		
	case 'background' :
		$content 	= 'background.php';		
		$pageTitle 	= 'View Profile';
		break;
		
		
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Profile';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Add Profile';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Modify Profile';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Profile';
}

$script    = array('user.js');

require_once '../include/template.php';
?>

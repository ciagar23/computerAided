<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkuser();


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$name = (isset($_GET['name']) && $_GET['name'] > '') ? $_GET['name'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'View: '.$name;
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Add: '.$name;
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Modify: '.$name;
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'View: '.$name;
}

$script    = array('examitem.js');

require_once '../include/template.php';
?>

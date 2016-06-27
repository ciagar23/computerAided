<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkuser();


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

$name = (isset($_GET['name']) && $_GET['name'] > '') ? $_GET['name'] : '';
$classname = (isset($_GET['class']) && $_GET['class'] > '') ? $_GET['class'] : '';

switch ($view) {
	case 'intro' :
		$content 	= 'intro.php';		
		$pageTitle 	= 'View: '.$name;
		break;
		
	case 'exit' :
		$content 	= 'exit.php';		
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
		
	case 'examframe' :
		$content 	= 'examframe.php';		
		$pageTitle 	= 'Modify: '.$name;
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'View: '.$name;
}

$script    = array('examitem.js');

require_once '../include/templatetest.php';
?>

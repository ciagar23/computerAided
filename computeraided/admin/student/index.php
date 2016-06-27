<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkuser();


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Students';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Add Students';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Modify Students';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Students';
}

$script    = array('student.js');

require_once '../include/template.php';
?>

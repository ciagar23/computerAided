<?php
require_once '../../library/config.php';
require_once '../library/functions.php';



$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Users';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Add Users';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Modify Users';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'View Users';
}

$script    = array('user.js');

require_once '../include/addusertemplate.php';
?>

<?php


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'upload' :
		$content 	= 'upload.php';		
		$pageTitle 	= ' View';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= ' Add';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= ' Modify';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = ' Play Game';
		break;
		
	default :
		$content 	= 'upload.php';		
		$pageTitle 	= ' View';
}




$script    = array('games.js');

require_once '../include/template.php';
?>

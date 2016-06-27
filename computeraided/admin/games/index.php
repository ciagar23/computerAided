<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
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
		$content 	= 'list.php';		
		$pageTitle 	= ' View';
}




$script    = array('games.js');

require_once '../include/template.php';
?>

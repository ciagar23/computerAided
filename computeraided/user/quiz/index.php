<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= ' View Quiz';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= ' Add Quiz';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= ' Modify Quiz';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = ' View Quiz Detail';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= ' View Quiz';
}




$script    = array('exam.js');

require_once '../include/template.php';
?>

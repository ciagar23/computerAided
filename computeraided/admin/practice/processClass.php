<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'addClass' :
		addClass();
		break;
		
	case 'modify' :
		modify();
		break;
		
	case 'deleteClass' :
		deleteClass();
		break;

	default :
	    // if action is not defined or unknown
		// move to main product page
		header('Location: index.php');
}


function addClass()
{
    $name        = $_POST['txtName'];
    $subject        = $_POST['txtSubject'];    
	$schedule1        = $_POST['txtSchedule1'];
    $schedule2        = $_POST['txtSchedule2'];
    $schedule3        = $_POST['txtSchedule3'];
    $schedule4        = $_POST['txtSchedule4'];
    $schedule5        = $_POST['txtSchedule5'];
    $schedule6        = $_POST['txtSchedule6'];
    $schedule7        = $_POST['txtSchedule7'];
	
	$schedule = $schedule1.':'.$schedule2.' '.$schedule3.'-'.$schedule4.':'.$schedule5.' '.$schedule6.' '.$schedule7;
	$teacher =	$_SESSION["idnumber"];
	
	
	$sql   = "INSERT INTO tbl_class (c_name, c_subject, c_schedule, c_teacher ,c_date)
	          VALUES ('$name', '$subject', '$schedule', '$teacher', NOW())";

	$result = dbQuery($sql);
	
	header("Location: index.php");	
}



/*
	Modify a product
*/
function modify()
{
	$productId   = (int)$_GET['productId'];	
    
    $name        = $_POST['txtName'];
    $subject        = $_POST['txtSubject'];
    $schedule        = $_POST['txtSchedule'];
	
	$sql   = "UPDATE tbl_class
	          SET c_subject='$subject', c_name='$name', c_schedule='$schedule'
			  WHERE c_id = $productId";  

	$result = dbQuery($sql);
	
	header('Location: index.php');			  
}

/*
	Remove a product
*/
function deleteClass()
{
	if (isset($_GET['productId']) && (int)$_GET['productId'] > 0) {
		$productId = (int)$_GET['productId'];
	} else {
		header('Location: index.php');
	}
	
	// remove the product from database;
	$sql = "DELETE FROM tbl_class
	        WHERE c_id = $productId";
	dbQuery($sql);
	
	header('Location: index.php');
}


/*
	Remove a product image
*/
function deleteImage()
{
	if (isset($_GET['productId']) && (int)$_GET['productId'] > 0) {
		$productId = (int)$_GET['productId'];
	} else {
		header('Location: index.php');
	}
	
	$deleted = _deleteImage($productId);

	// update the image and thumbnail name in the database
	$sql = "UPDATE tbl_equipment
			SET pd_image = '', pd_thumbnail = ''
			WHERE pd_id = $productId";
	dbQuery($sql);		

	header("Location: index.php?view=modify&productId=$productId");
}

function _deleteImage($productId)
{
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = "SELECT pd_image, pd_thumbnail 
	        FROM tbl_equipment
			WHERE pd_id = $productId";
	$result = dbQuery($sql) or die('Cannot delete product image. ' . mysql_error());
	
	if (dbNumRows($result)) {
		$row = dbFetchAssoc($result);
		extract($row);
		
		if ($pd_image && $pd_thumbnail) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/product/$pd_image");
			$deleted = @unlink(SRV_ROOT . "images/product/$pd_thumbnail");
		}
	}
	
	return $deleted;
}




?>
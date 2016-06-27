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
    $schedule        = $_POST['txtSchedule'];
	$teacher =	$_SESSION["idnumber"];
	$time =	$_POST["txtTime"];
	$minute =	$_POST["txtMinute"];
	$classId =	$_POST["txtId"];
	
	
	$sql   = "INSERT INTO tbl_exam (c_name ,c_classid, c_subject, c_schedule, c_teacher ,c_date,c_time,c_minute)
	          VALUES ('$name','$classId', '$subject', '$schedule', '$teacher', NOW(), $time, $minute)";

	$result = dbQuery($sql);
	
	header("Location: index.php?classname=".$classId);	
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
	$time =	$_POST["txtTime"];
	$minute =	$_POST["txtMinute"];
	$status =	$_POST["txtStatus"];
	$classId =	$_POST["txtId"];
			
	$sql   = "UPDATE tbl_exam 
	          SET c_name = '$name', c_subject = '$subject', c_schedule = '$schedule', c_time = '$time', c_minute = '$minute', c_status = '$status'
			  WHERE c_id = $productId";  

	$result = dbQuery($sql);
	
	header('Location: index.php?classname='.$classId);			  
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
	$sql = "DELETE FROM tbl_exam
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
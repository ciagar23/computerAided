<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'addClass' :
		addClass();
		break;
		
	case 'modifyProduct' :
		modifyProduct();
		break;
		
	case 'deleteClass' :
		deleteClass();
		break;
	case 'changeStatus' :
		changeStatus();
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
	
	
	$sql   = "INSERT INTO tbl_class (c_name, c_subject, c_schedule, c_teacher ,c_date)
	          VALUES ('$name', '$subject', '$schedule', '$teacher', NOW())";

	$result = dbQuery($sql);
	
	header("Location: index.php");	
}



/*
	Modify a product
*/
function modifyProduct()
{
	$productId   = (int)$_GET['productId'];	
    $catId       = $_POST['cboCategory'];
    $name        = $_POST['txtName'];
    $code        = $_POST['txtCode'];
	$description = $_POST['mtxDescription'];
	
	$images = uploadProductImage('fleImage', SRV_ROOT . 'images/product/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];

	// if uploading a new image
	// remove old image
	if ($mainImage != '') {
		_deleteImage($productId);
		
		$mainImage = "'$mainImage'";
		$thumbnail = "'$thumbnail'";
	} else {
		// if we're not updating the image
		// make sure the old path remain the same
		// in the database
		$mainImage = 'pd_image';
		$thumbnail = 'pd_thumbnail';
	}
			
	$sql   = "UPDATE tbl_equipment 
	          SET cat_id = $catId, pd_name = '$name', pd_code = '$code', pd_description = '$description', pd_image = $mainImage, pd_thumbnail = $thumbnail
			  WHERE pd_id = $productId";  

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

/*
	Remove a product image
*/
function changeStatus()
{
	if (isset($_GET['productId']) && (int)$_GET['productId'] > 0) {
		$productId = (int)$_GET['productId'];
		$status = (int)$_GET['status'];
	} else {
		header('Location: index.php');
	}
	
	if ($status ==0)
	{
	$statusnew =1;
	}
	else
	{
	$statusnew =0;
	}

	// update the image and thumbnail name in the database
	$sql = "UPDATE tbl_games
			SET c_status = $statusnew 
			WHERE c_id = $productId";
	dbQuery($sql);		

	header("Location: index.php");
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
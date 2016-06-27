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
		
	case 'changeStatus' :
		changeStatus();
		break;


	default :
	    // if action is not defined or unknown
		// move to main product page
		header('Location: index.php');
}
/*
	Remove a product image
*/
function changeStatus()
{
	if (isset($_GET['productId']) && (int)$_GET['productId'] > 0) {
		$productId = (int)$_GET['productId'];
		$status = (int)$_GET['status'];
		$classname = (int)$_GET['classname'];
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
	$sql = "UPDATE tbl_lesson
			SET c_status = $statusnew 
			WHERE c_id = $productId";
	dbQuery($sql);		

	header("Location: index.php?classname=".$classname);
}



function addClass()
{
    $name        = $_POST['txtName'];
    $content        = $_FILES['fleImage'];
	$teacher =	$_SESSION["idnumber"];
	$classId =	$_POST["txtId"];
	
	
	// Where the file is going to be placed 
$target_path =  SRV_ROOT . 'images/lessons/';

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */
$target_path = $target_path . basename( $_FILES['fleImage']['name']); 

$target_path =  SRV_ROOT . 'images/lessons/';

        // get the image extension
        $ext = substr(strrchr($content['name'], "."), 1); 

        // generate a random new file name to avoid name conflict
        $imagePath = md5(rand() * time()) . ".$ext";

$target_path = $target_path . $imagePath; 

if(move_uploaded_file($_FILES['fleImage']['tmp_name'], $target_path)) {
	
		$sql   = "INSERT INTO tbl_lesson (c_name ,c_classid, c_teacher, c_content)
	          VALUES ('$name','$classId', '$teacher', '$imagePath')";

	$result = dbQuery($sql);
	
	header("Location: index.php?classname=".$classId);	
	
	
	
} else{
    	header("Location: index.php?classname=".$classId.'&error=This File Cant Be Uploaded');	
}
	

}


/*
	Modify a product
*/
function modify()
{
	$productId   = (int)$_GET['productId'];	
    
    $name        = $_POST['txtName'];
    $content        = $_POST['txtContent'];
	$classId =	$_POST["txtId"];
			
	$sql   = "UPDATE tbl_lesson
	          SET c_name = '$name', c_content = '$content'
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
		$classId = (int)$_GET['classId'];
	} else {
		header('Location: index.php');
	}
	
	// remove the product from database;
	$sql = "DELETE FROM tbl_lesson
	        WHERE c_id = $productId";
	dbQuery($sql);
	
	header('Location: index.php?classname='.$classId);
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
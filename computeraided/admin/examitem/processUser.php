<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'modify' :
		modifyUser();
		break;
		
	case 'delete' :
		deleteUser();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addUser()
{
    $Class = $_POST['txtClass'];
    $Question = $_POST['txtQuestion'];
	$Answer = $_POST['txtAnswer'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken			
		$sql   = "INSERT INTO tbl_examitem (user_class, user_question ,user_correctanswer ,user_regdate)
		          VALUES ('$Class','$Question','$Answer', NOW())";
	
		dbQuery($sql);
		header('Location: index.php?view=list&class='.$Class);	
	
}

/*
	Modify a user
*/
function modifyUser()
{
	$userId   = (int)$_POST['hidUserId'];	
	$FName = $_POST['txtFName'];
    $LName = $_POST['txtLName'];
    $userName = $_POST['txtUserName'];
    $Password = $_POST['txtPassword'];
    $Position = $_POST['txtPosition'];
    $Department = $_POST['txtDepartment'];
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$Password'), user_fname='$FName', user_lname='$LName', user_position='$Position', user_department = '$Department'
			  WHERE user_id = $userId";

	dbQuery($sql);
	header('Location: index.php?success=' . urlencode('You have Successfully Modified this User'));

}

/*
	Remove a user
*/
function deleteUser()
{

$class = (isset($_GET['classId']) && $_GET['classId'] > '') ? $_GET['classId'] : '';
	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_examitem 
	        WHERE user_id = $userId";
	dbQuery($sql);
	
	header('Location: index.php?view=list&class='.$class);
}
?>
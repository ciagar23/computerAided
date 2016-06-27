<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'login' :
		login();
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
    $Id = $_POST['txtId'];
    $Answer = $_POST['txtAnswer'];
    $Correct = $_POST['txtCorrect'];
    $Page = $_POST['txtPage'];
    $Name = $_POST['txtName'];
    $theuser = $_POST['txtUser'];
	
	if($Answer == $Correct)
	{
	$check = 1;
	}
	else
	{
	$check = 0;
	}
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken			
		$sql   = "INSERT INTO tbl_examitemscore (user_class, user_correctanswer ,user_myanswer ,user_questionId,user_check,user_name)
		          VALUES ('$Class','$Correct','$Answer','$Id','$check','$theuser')";
	
		dbQuery($sql);
		header('Location: index.php?class='.$Class.'&name='.$Name.'&page='.$Page);	
	
}

function login()
{
    $Class = $_POST['txtClass'];
    $Name = $_POST['txtName'];
    $sName = $_POST['txtsName'];
    $Password = $_POST['txtPassword'];
	
	$sqls = "SELECT *
        FROM tbl_student where user_idnumber='$sName'";
		$results = mysql_query($sqls);
		$show = mysql_fetch_array($results);
		$count = mysql_num_rows($results);	
		$userid= $show['user_idnumber'];
		$spassword= $show['user_password'];
	
	if($count == 0)
	{
	header('Location: index.php?view=intro&class='.$Class.'&name='.$Name.'&msg=ID Number Doesnt exist');	
	}
	else
	{
	if ($Password!= $spassword)
	{
	header('Location: index.php?view=intro&class='.$Class.'&name='.$Name.'&msg=Wrong Password');
	}
	else
	{
	
				$checkstudent = mysql_num_rows(mysql_query("SELECT * FROM tbl_studentscore where user_name='$sName' and user_class='$Class'"));
		if ( $checkstudent != 0)
		{
		header('Location: index.php?view=intro&class='.$Class.'&name='.$Name.'&msg=You have already taken the test');
		}
		else
		{
			
	$_SESSION['student'] = $userid;
	header('Location: index.php?view=examframe&class='.$Class.'&name='.$Name);
				}
	
	
	
	
	}
	
	}
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken			
		$sql   = "INSERT INTO tbl_examitemscore (user_class, user_correctanswer ,user_myanswer ,user_questionId,user_check)
		          VALUES ('$Class','$Correct','$Answer','$Id','$check')";
	
		dbQuery($sql);
		header('Location: index.php?class='.$Class.'&name='.$Name.'&page='.$Page);	
	
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
	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_examitemscore
	        WHERE user_id = $userId";
	dbQuery($sql);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
<body bgcolor="#000000"><table align="center" width="50%" bgcolor="#FFFFFF">
<tr><td align="center"> <?php 
//get unique id
$up_id = uniqid(); 
?>

<?php
$succes='';

        $teacher = $_GET['idnumber'];
        $classId = $_GET['classId'];
//process the forms and upload the files
if ($_POST) {

	// create the parameters needed to connect to the mysql database server
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'db_computeraided';
	$table_name='tbl_lesson';

	// create the connection; if an error occurs display the error
	$connection = mysql_connect($host, $username, $password) or die(mysql_error());

	// select the database to use; if an error occurs display the error
	//$db = mysql_select_db($db) or die(mysql_error());
	$db = mysql_select_db($db) or die("Could not open a connection to the database server");
	

$folder = "tmp/"; 
        $ext = substr(strrchr($_FILES["file"]['name'], "."), 1); 
        $imagePath = md5(rand() * time()) . ".$ext";
        $name = $_POST['name'];
move_uploaded_file($_FILES["file"]["tmp_name"], "$folder" . $imagePath);

		$query = "insert into $table_name set c_name='$name', c_content='$imagePath', c_teacher='$teacher', c_classid='$classId'";

		$result= mysql_query($query) or die("Error in query: $query.");
		
		$success = '<font color=blue>file successfully Uploaded</font>';

//do whatever else needs to be done (insert information into database, etc...)

//redirect user
}
//

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload your Lesson</title>


</head>

<body>
<h1>Upload PDF file </h1>

<div>
  <?php echo $success; ?>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    File Name:<br />
    <input name="name" type="text" id="name"/>
    <br />
    <br />
    Choose a file to upload<br />

    <input name="file" type="file" id="file" size="30"/>

<br>
<br>
    <input name="Submit" type="submit" id="submit" value="Submit" />
    <input name="back" type="button" id="submit" value="back" onClick="window.history.back();" />
  </form>
  </div>

</body>

</html>

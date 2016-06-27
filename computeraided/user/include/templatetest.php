<?php
if (!defined('WEB_ROOT')) {
	exit;
}	

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$successMessage = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';

if ($errorMessage == '')
{
$errorMessage = '';
}
else
{
$errorMessage = '<p class="msg error">
			<strong>'.$errorMessage.'</strong></p>
		';
}


if ($successMessage == '')
{
$successMessage = '';
}
else
{
$successMessage = '<div class="msg msg-ok">
			<p><strong>'.$successMessage.'</strong></p>
		</div>';
}


$session = $_SESSION["teacher"];

$sql = "SELECT *
        FROM tbl_user where user_idnumber='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$userId= $show['user_id'];
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];
		$department = $show['user_department'];




$self = WEB_ROOT . 'admin/index.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Touch of Purple | Full Width</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>user/include/styles/layout.css" type="text/css" />

 <script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'user/library/' . $script[$i]. '"></script>';
	}
}
?>

</head>
<?php require_once $content;?>

</div>
</div>

</body>
</html>
<frameset 
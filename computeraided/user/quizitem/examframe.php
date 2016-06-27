<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Touch of Purple | Full Width</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>user/include/styles/layout.css" type="text/css" />

 <script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<?php
$user =$_SESSION['student'];


$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'user/library/' . $script[$i]. '"></script>';
	}
}
?>


</head>
<body id="top">
<div class="wrapper col1">
  <div id="header">
    <div class="fl_left">
      <h1><a href="#"><?php echo $fname;?> <?php echo $lname;?> (<?php echo $department;?>)</a></h1>
      <p><?php echo $user;?></p>
    </div>
    <div class="fl_right"><a href="#"><img src="<?php echo WEB_ROOT;?>images/logo.png" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="breadcrumb">
    <ul>
      <li class="first"><?php echo $pageTitle;?></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
 <div id="container">
 <?php echo $successMessage;?>
<?php echo $errorMessage;?>


<h1><?php require_once 'countdown.php';?></h1>
<br>
<iframe src="/computeraided/user/quizitem/index.php?view=list&class=<?php echo $classname; ?>&name=<?php echo $name; ?>" width="100%" scrolling="no" height="500">
  <p>Your browser does not support iframes.</p>
</iframe>
</body>
</html>


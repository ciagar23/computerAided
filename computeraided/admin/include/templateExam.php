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


$session = $_SESSION["idnumber"];

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo WEB_ROOT;?>admin/include/css/reset.css" /> <!-- RESET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo WEB_ROOT;?>admin/include/css/main.css" /> <!-- MAIN STYLE SHEET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo WEB_ROOT;?>admin/include/css/2col.css" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="<?php echo WEB_ROOT;?>admin/include/css/1col.css" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo WEB_ROOT;?>admin/include/css/style.css" /> <!-- GRAPHIC THEME -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo WEB_ROOT;?>admin/include/css/mystyle.css" /> <!-- WRITE YOUR CSS CODE HERE -->
	<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/js/switcher.js"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/js/toggle.js"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/js/ui.core.js"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/js/ui.tabs.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
    
    
    <script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}
?>
    
    
	<title><?php echo $pageTitle;?></title>
</head>

<body>

<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-left box">

			<!-- Switcher -->
			<span class="f-left" id="switcher">
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="<?php echo WEB_ROOT;?>admin/include/design/switcher-2col.gif" alt="2 Columns" /></a>
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="<?php echo WEB_ROOT;?>admin/include/design/switcher-1col.gif" alt="1 Column" /></a>
			</span>

			Click to <strong>Customize Front End</strong>

		</p>

		<p class="f-right">User: <strong><a href="#"><?php echo $fname;?> <?php echo $lname;?> (<?php echo $department;?>)</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="<?php echo $self; ?>?logout" id="logout">Log out</a></strong></p>

	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">

		<ul class="box f-right">
			<li><a target="_blank" href="<?php echo WEB_ROOT;?>user"><span><strong>View Front End &raquo;</strong></span></a></li>
		</ul>

		<ul class="box">
			<li><a href="<?php echo WEB_ROOT;?>admin/profile/index.php?view=modify&userId=<?php echo $userId;?>"><span>Profile</span></a></li>
			<li><a href="<?php echo WEB_ROOT;?>admin/curriculum/"><span>Lessons</span></a></li>
			<li><a href="<?php echo WEB_ROOT;?>admin/quiz/"><span>Quiz</span></a></li>
			<li><a href="<?php echo WEB_ROOT;?>admin/exam"><span>Exam</span></a></li>
			<li><a href="<?php echo WEB_ROOT;?>admin/games"><span>Games</span></a></li>
			<li><a href="<?php echo WEB_ROOT;?>admin/result"><span>Quiz/Exam Results</span></a></li>
			<li><a href="<?php echo WEB_ROOT;?>admin/class"><span>Class</span></a></li>
		</ul>

	</div> <!-- /header -->

	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<p id="logo"><a href="#"><img src="<?php echo WEB_ROOT;?>admin/include/tmp/logo.gif" alt="Our logo" title="Visit Site" /></a></p>


				<!-- Create a new project -->
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Background Color</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>
<p id="btn-create" class="box"><a href="<?php echo WEB_ROOT;?>admin/customize"><span>Add Pictures</span></a></p>

			</div> <!-- /padding -->


		</div> <!-- /aside -->

		<hr class="noscreen" />



<!-- Content (Right Column) -->
		<div id="content" class="box">

<?php echo $errorMessage;?>
<!-- Form -->
			<h1 class="tit"><?php echo $pageTitle;?></h1>
                    
               <?php require_once $content;?> 
      

			</div> <!-- /content -->

	</div> <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer" class="box">

		<p class="f-left">&copy; 2009 <a href="#">Your Company</a>, All Rights Reserved &reg;</p>

		<p class="f-right">Templates by <a href="http://www.adminizio.com/">Adminizio</a></p>

	</div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>
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
		$header = $show['user_header'];
		$footer = $show['user_footer'];
		$navcolor = $show['user_navcolor'];
		$background = $show['user_background'];
		$headercolor = $show['user_headercolor'];
		$headertext = $show['user_headertext'];
		$tabletext = $show['user_tabletext'];
		$navtext = $show['user_navtext'];




$self = WEB_ROOT . 'admin/index.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Computer Aided Instruction</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />

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
<body id="top">
<div class="wrapper col1">
  <div id="header">
    <div class="fl_left">
      <h1><a href="#"><?php echo $fname;?> <?php echo $lname;?> (<?php echo $department;?>)</a></h1>
      <p><?php echo $header;?></p>
    </div>
    <div class="fl_right"><a href="#"><img src="<?php echo WEB_ROOT;?>images/logo.png" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li><a href="<?php echo WEB_ROOT;?>user/">Home</a></li>
        <li><a href="<?php echo WEB_ROOT;?>user/lessons">Lessons</a></li>
        <li><a href="<?php echo WEB_ROOT;?>user/quiz">Quiz</a></li>
        <li><a href="<?php echo WEB_ROOT;?>user/exam">Exam</a></li>
        <li><a href="<?php echo WEB_ROOT;?>user/practice">Practice</a></li>
        <li><a href="<?php echo WEB_ROOT;?>user/games">Games</a></li>
        <li><a href="<?php echo WEB_ROOT;?>user/class">Classes</a></li>
        <li class="last"><a href="?logout" id="logout">Log out</a></li>
      </ul>
    </div>
    <div id="search">
      <form action="<?php echo WEB_ROOT;?>user/lessonlist/index.php?view=search&classname=44" method="get">
        <fieldset>
          <legend>Site Search</legend>
          <input type="hidden" name="view" value="search" />
          <input type="text" value="Search Lessons&hellip;" name="classname"  onfocus="this.value=(this.value=='Search Lessons&hellip;')? '' : this.value ;" />
          <input type="submit"  id="go" value="Search" />
        </fieldset>
      </form>
    </div>
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
<?php require_once $content;?>

</div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left"><a href="#"><?php echo $footer;?></a><br>
    
    </p>
    <br class="clear" />
  </div>
</div>
</body>
</html>

<style>
/*
Template Name: Touch of Purple
File: Layout CSS
Author: OS Templates
Author URI: http://www.os-templates.com/
Licence: <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>
*/

/*
Template Name: Touch of Purple
File: Navigation CSS
Author: OS Templates
Author URI: http://www.os-templates.com/
Licence: <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>
*/

#topnav{
	display:block;
	float:left;
	margin:0;
	padding:0;
	font-size:13px;
	font-weight:normal;
	font-family:Georgia, "Times New Roman", Times, serif;
	}

#topnav ul, #topnav li{
	float:left;
	list-style:none;
	margin:0;
	padding:0;
	}

#topnav li a:link, #topnav li a:visited, #topnav li a:hover{
	display:block;
	margin:0;
	padding:15px 20px;
	color:<?php echo $navtext;?>;
	border-left:2px solid <?php echo $navcolor;?>;
	}

#topnav ul ul li a:link, #topnav ul ul li a:visited{
	border:none;
	}

#topnav li.last a{
	}

#topnav li a:hover, #topnav ul li.active a{
	color:<?php echo $navtext;?>;
	background-color:#A5066D;
	border-left:2px solid #F955BF;
	}
	
#topnav li li a:link, #topnav li li a:visited{
	width:150px;
	float:none;
	margin:0;
	padding:7px 10px;
	font-size:12px;
	font-weight:normal;
	color:<?php echo $navtext;?>;
	background-color:<?php echo $navcolor;?>;
	}
	
#topnav li li a:hover{
	color:<?php echo $navtext;?>;
	background-color:#A5066D;
	}

#topnav li ul{
	z-index:9999;
	position:absolute;
	left:-999em;
	height:auto;
	width:170px;
	border-left:2px solid #F955BF;
	border-bottom:2px solid #F955BF;
	}

#topnav li ul a{width:140px;}

#topnav li ul ul{margin:-32px 0 0 0;}

#topnav li:hover ul ul{left:-999em;}

#topnav li:hover ul, #topnav li li:hover ul{left:auto;}

#topnav li:hover{position:static;}

#topnav li.last{margin:0;}

/* ----------------------------------------------Column Navigation-------------------------------------*/

#column .subnav{display:block; width:250px; padding:25px; background-color:#1F1F1F; margin-bottom:30px;}

#column .subnav h2{
	margin:0 0 20px 0;
	padding:0 0 14px 0;
	font-size:20px;
	font-weight:normal;
	font-family:Georgia, "Times New Roman", Times, serif;
	color:#666666;
	background-color:#1F1F1F;
	line-height:normal;
	border-bottom:1px dashed #666666;
	}

#column .subnav ul{
	margin:0;
	padding:0;
	list-style:none;
	}

#column .subnav li{
	margin:0 0 3px 0;
	padding:0;
	}

#column .subnav ul ul, #column .subnav ul ul ul, #column .subnav ul ul ul ul, #column .subnav ul ul ul ul ul{border-top:none; padding-top:0;}

#column .subnav a{
	display:block;
	margin:0;
	padding:5px 10px 5px 20px;
	color:#666666;
	background:url("../images/purple_file.gif") 10px center no-repeat #1F1F1F;
	text-decoration:none;
	border-bottom:1px dotted #666666;
	}

#column .subnav a:hover{color:<?php echo $columntext;?>; background-color:#161616;}

#column .subnav ul ul a, #column .subnav ul ul ul a, #column .subnav ul ul ul ul a, #column .subnav ul ul ul ul ul a{background:url("../images/white_file.gif") no-repeat #1F1F1F;}
#column .subnav ul ul a{padding-left:40px; background-position:30px center;}
#column .subnav ul ul ul a{padding-left:50px; background-position:40px center;}
#column .subnav ul ul ul ul a{padding-left:60px; background-position:50px center;}
#column .subnav ul ul ul ul ul a{padding-left:70px; background-position:60px center;}


/*
Template Name: Touch of Purple
File: Forms CSS
Author: OS Templates
Author URI: http://www.os-templates.com/
Licence: <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>
*/

form, fieldset, legend{margin:0; padding:0; border:none;}
legend{display:none;}
input, textarea, select{font-size:12px; font-family:Georgia, "Times New Roman", Times, serif;}

/* ----------------------------------------------Search Form-------------------------------------*/

#topbar input{
	display:block;
	float:left;
	width:155px;
	margin:0 5px 0 0;
	padding:5px;
	color:#B6B6B6;
	background-color:<?php echo $background;?>;
	border:1px solid #A5066D;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	}

#topbar input#go{
	width:68px;
	height:26px;
	margin:0;
	padding:4px 0;
	text-transform:uppercase;
	color:<?php echo $navtext;?>;
	background-color:#A5066D;
	cursor:pointer;
	font-weight:bold;
	}

/* ----------------------------------------------Forms in Content Area-------------------------------------*/

#container #respond{display: block; width:100%;}

#container #respond input{width:170px; padding:2px; border:1px solid #CCCCCC; margin:5px 5px 0 0;}

#container #respond textarea{width:98%; border:1px solid #CCCCCC; padding:2px; overflow:auto;}
	
#container #respond p{margin:5px 0;}

#container #respond #submit, #container #respond #reset{
	margin:0;
	padding:5px;
	color:#666666;
	background-color:#F7F7F7;
	border:1px solid #CCCCCC;
	cursor:pointer;
	}

/* ----------------------------------------------Newsletter-------------------------------------*/

#socialise form{
	display:block;
	width:300px;
	margin:0;
	padding:10px 0 0 0;
	border:none;
	}

#socialise input{
	display:block;
	width:218px;
	margin:0 0 10px 0;
	padding:5px;
	color:<?php echo $navtext;?>;
	background-color:#2684B7;
	border:1px solid #1C5E82;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	}

#socialise input#newsletter_go{
	width:58px;
	height:62px;
	margin:0;
	padding:0;
	font-weight:bold;
	text-transform:uppercase;
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:60px;
	cursor:pointer;
	}


/*
Template Name: Touch of Purple
File: Tables CSS
Author: OS Templates
Author URI: http://www.os-templates.com/
Licence: <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>
*/

table{
	width:100%;
	border-collapse:collapse;
	table-layout:auto;
	vertical-align:top;
	margin-bottom:15px;
	border:1px solid <?php echo $tabletext;?>;
	}

table thead th{
	color:<?php echo $navtext;?>;
	background-color:<?php echo $headercolor;?>;
	border:1px solid <?php echo $tabletext;?>;
	border-collapse:collapse;
	text-align:center;
	table-layout:auto;
	vertical-align:middle;
	}

table tbody td{
	vertical-align:top;
	border-collapse:collapse;
	border-left:1px solid <?php echo $tabletext;?>;
	border-right:1px solid <?php echo $tabletext;?>;
	}
	
table thead th, table tbody td{
	padding:5px;
	border-collapse:collapse;
	}

table tbody tr.light{
	color:#CCCCCC;
	background-color:#333333;
	}

table tbody tr.dark{
	color:#CCCCCC;
	background-color:#1E1E1E;
	}


#waterwheelCarousel{
	display:block;
	width:960px;
	height:250px;
	margin:0 auto;
	padding:25px 0 0 0;
	background-color:<?php echo $background;?>;
	}

#waterwheelCarousel > img{
	display:none;
	cursor:pointer;
	}


body{
	margin:0;
	padding:0;
	font-size:13px;
	font-family:Georgia, "Times New Roman", Times, serif;
	color:<?php echo $tabletext;?>;
	background-color:<?php echo $background;?>;
	}

img{display:block; margin:0; padding:0; border:none;}
.justify{text-align:justify;}
.bold{font-weight:bold;}
.center{text-align:center;}
.right{text-align:right;}
.nostart{list-style-type:none; margin:0; padding:0;}
.clear{clear:both;}
br.clear{clear:both; margin-top:-15px;}

a{outline:none; text-decoration:none;}

.fl_left{float:left;}
.fl_right{float:right;}

.imgl, .imgr{border:1px solid #C7C5C8; padding:5px;}
.imgl{float:left; margin:0 8px 8px 0; clear:left;}
.imgr{float:right; margin:0 0 8px 8px; clear:right;}

/* ----------------------------------------------Wrapper-------------------------------------*/

div.wrapper{
	display:block;
	width:100%;
	margin:0;
	text-align:left;
	}

div.wrapper h1, div.wrapper h2, div.wrapper h3, div.wrapper h4, div.wrapper h5, div.wrapper h6{
	margin:0 0 15px 0;
	padding:0;
	font-size:20px;
	font-weight:normal;
	line-height:normal;
	}

.col1, .col1 a{color:#666666; background-color:<?php echo $headercolor;?>;}
.col2{color:<?php echo $navtext;?>; background-color:<?php echo $navcolor;?>;}
.col3{color:<?php echo $tabletext;?>; background-color:<?php echo $background;?>; padding:20px 0;}
.col3 a{color:<?php echo $columntext;?>; background-color:<?php echo $background;?>;}
.col4{color:<?php echo $tabletext;?>; background-color:<?php echo $background;?>;}
.col4 a{color:<?php echo $columntext;?>; background-color:<?php echo $background;?>;}
.col5{color:#CCCCCC; background-color:#1D1D1D; border-top:1px dotted #E7BCE2; border-bottom:1px dotted #E7BCE2;}
.col5 a{color:#E7BCE2; background-color:#1D1D1D;}
.col6, .col6 a{color:#666666; background-color:<?php echo $background;?>;}

/* ----------------------------------------------Generalise-------------------------------------*/

#header, #topbar, #breadcrumb, #featured_intro, #container, #footer, #copyright{
	position:relative;
	margin:0 auto 0;
	display:block;
	width:960px;
	}

/* ----------------------------------------------Header-------------------------------------*/

#header{
	padding:2px 0 20px 0;
	}

#header .fl_left{
	display:block;
	float:left;
	margin-top:17px;
	overflow:hidden;
	}

#header .fl_right{
	display:block;
	float:right;
	width:468px;
	height:60px;
	margin-top:21px;
	overflow:hidden;
	}

#header h1, #header p, #header ul{
	margin:0;
	padding:0;
	list-style:none;
	line-height:normal;
	}

#header h1 a{
	font-size:36px;
	color:<?php echo $headertext;?>;
	background-color:<?php echo $headercolor;?>;
	}

#header .fl_left p{
	margin-top:5px;
	}

/* ----------------------------------------------Topbar-------------------------------------*/

#topbar{
	padding:0;
	z-index:1000;
	}

#topbar #search{
	display:block;
	float:right;
	width:243px;
	margin:10px 0 0 0;
	padding:0;
	}

/* ----------------------------------------------BreadCrumb-------------------------------------*/

#breadcrumb{
	padding:0 0 10px 0;
	border-bottom:1px dotted #E7BCE2;
	}

#breadcrumb ul{
	margin:0;
	padding:0;
	list-style:none;
	}

#breadcrumb ul li{display:inline;}
#breadcrumb ul li.current a{text-decoration:underline;}

/* ----------------------------------------------Homepage Featured Intro-------------------------------------*/

#featured_intro{
	padding:0 0 20px 0;
	}

#featured_intro .fl_left{
	display:block;
	float:left;
	width:470px;
	}
	
#featured_intro .fl_left h2{
	margin:0;
	padding:0;
	font-size:120px;
	color:#585858;
	background-color:<?php echo $background;?>;
	text-transform:uppercase;
	line-height:normal;
	}

#featured_intro .fl_right{
	display:block;
	float:right;
	width:450px;
	padding-top:65px;
	text-align:justify;
	line-height:1.5em;
	}

#featured_intro .fl_right .readmore{
	display:block;
	text-align:right;
	font-weight:bold;
	}

/* ----------------------------------------------Content-------------------------------------*/

#container{
	padding:20px 0;
	}

#content{
	display:block;
	float:left;
	width:600px;
	}

/* ------Comments-----*/

#comments{margin-bottom:40px;}

#comments .commentlist {margin:0; padding:0;}

#comments .commentlist ul{margin:0; padding:0; list-style:none;}

#comments .commentlist li.comment_odd, #comments .commentlist li.comment_even{margin:0 0 10px 0; padding:15px; list-style:none;}

#comments .commentlist li.comment_odd{color:#CCCCCC; background-color:#333333;}
#comments .commentlist li.comment_odd a{color:#E7BCE2; background-color:#333333;}

#comments .commentlist li.comment_even{color:#CCCCCC; background-color:#1E1E1E;}
#comments .commentlist li.comment_even a{color:#E7BCE2; background-color:#1E1E1E;}

#comments .commentlist .author .name{font-weight:bold;}
#comments .commentlist .submitdate{font-size:smaller;}

#comments .commentlist p{margin:10px 5px 10px 0; padding:0; font-weight: normal;text-transform: none;}

#comments .commentlist li .avatar{float:right; border:1px solid #EEEEEE; margin:0 0 0 10px;}

/* ----------------------------------------------Column-------------------------------------*/

#column{
	display:block;
	float:right;
	width:300px;
	}

#column .holder{
	display:block;
	width:260px;
	margin-bottom:20px;
	padding-left:10px;
	}

#column .holder, #column #featured{
	display:block;
	width:300px;
	margin-bottom:20px;
	}

#column .holder p{
	line-height:1.6em;
	}

#column h2{
	font-size:20px;
	}

#column .holder h2.title{
	display:block;
	width:100%;
	height:65px;
	margin:0;
	padding:15px 0 0 0;
	font-size:20px;
	line-height:normal;
	border-bottom:1px dashed #666666;
	}

#column .holder h2.title img{
	float:left;
	margin:-15px 8px 0 0;
	padding:5px;
	border:1px solid #666666;
	}

#column .holder p.readmore{
	display:block;
	width:100%;
	font-weight:bold;
	text-align:right;
	line-height:normal;
	}

#column div.imgholder{
	display:block;
	width:290px;
	margin:0 0 10px 0;
	padding:4px;
	border:1px solid #666666;
	}
	
/* Featured Block */

#column #featured a{
	color:<?php echo $columntext;?>;
	background-color:#1F1F1F;
	}

#column #featured ul, #column #featured h2, #column #featured p{
	margin:0;
	padding:0;
	list-style:none;
	}

#column #featured li{
	display:block;
	width:250px;
	margin:0;
	padding:20px 25px;
	color:#666666;
	background-color:#1F1F1F;
	}

#column #featured li p{
	line-height:1.6em;
	}

#column #featured li p.imgholder{
	display:block;
	width:240px;
	height:90px;
	margin:20px 0 15px 0;
	padding:4px;
	color:#666666;
	background-color:#333333;
	border:1px solid #666666;
	}

#column #featured li h2{
	margin:0;
	padding:0 0 14px 0;
	font-size:20px;
	font-weight:normal;
	font-family:Georgia, "Times New Roman", Times, serif;
	color:#666666;
	background-color:#1F1F1F;
	line-height:normal;
	border-bottom:1px dashed #666666;
	}

#column #featured p.readmore{
	display:block;
	width:100%;
	margin-top:15px;
	font-weight:bold;
	text-align:right;
	line-height:normal;
	}

#column #latestnews{
	display:block;
	width:100%;
	margin:0;
	padding:0;
	list-style:none;
	}

#column #latestnews li{
	display:block;
	margin:0 0 20px 0;
	padding:0 0 15px 0;
	border-bottom:1px dotted <?php echo $tabletext;?>;
	}

#column #latestnews li.last{
	margin-bottom:0;
	}

#column #latestnews p{
	margin:0 0 5px 0;
	padding:0;
	}

#column #latestnews p.readmore{
	margin:0;
	padding:0;
	}

#column #latestnews .imgl{
	margin:0 10px 10px 0;
	padding:4px;
	}

/* ----------------------------------------------Footer-------------------------------------*/

#footer{
	padding:20px 0;
	}

#footer h2, #footer p, #footer ul, #footer a{
	margin:0;
	padding:0;
	font-weight:normal;
	list-style:none;
	line-height:normal;
	}

#footer p{
	line-height:1.6em;
	}

#footer h2{
	padding:0 0 5px 0;
	color:#585858;
	background-color:#1D1D1D;
	border-bottom:1px dotted #585858;
	font-size:16px;
	font-weight:bold;
	margin-bottom:20px;
	}

#footer li{
	margin-bottom:15px;
	}

#footer .footbox{
	display:block;
	float:left;
	width:210px;
	margin:0 40px 0 0;
	padding:0;
	}

#footer .flickr li{
	display:block;
	float:left;
	width:80px;
	height:80px;
	margin:0 7px 15px 7px;
	padding:4px;
	border:1px solid #E7BCE2;
	}

#footer .banners li{
	display:block;
	width:200px;
	height:150px;
	margin:0 0 15px 0;
	padding:4px;
	border:1px solid #E7BCE2;
	}

#footer .last{
	margin:0;
	}

/* ----------------------------------------------Copyright-------------------------------------*/

#copyright{
	padding:15px 0;
	}

#copyright p{
	margin:0;
	padding:0;
	}
</style>
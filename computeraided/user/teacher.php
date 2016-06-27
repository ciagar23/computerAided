<?php
require_once '../library/config.php';
require_once './library/functions.php';

$errorMessage = '<font color="red">&nbsp;</font>';
$successMessage = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';


if (isset($_POST['txtIdNumber'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Computer Aided Instruction for Intermediate Algebra</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>include/css/style.css" />
    </head>
    <body>
		<div class="wrapper">
			<h1 align="center">Computer Aided Instruction for Intermediate Algebra</h1>
			<!--<h2>Demo: click the <span>orange links</span> to see the form animating and switching</h2>
			<div class="content">-->
				<div id="form_wrapper" class="form_wrapper">
				
                    <form  class="login active" method="post" name="frmLogin" id="frmLogin">
						<h3>Login</h3>
           
		 				<div class="errorMessage" align="center"><?php echo $errorMessage; ?><?php echo $successMessage;?></div>
						<div>
							<label>ID Number:</label>
							<input name="txtIdNumber" type="text" />
						</div>
                        
							<label>Password:</label>
						<div>
							<input name="txtPassword" type="password" />
						</div>
						<div class="bottom">
							<div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
							<input  name="btnLogin" type="submit" class="box" id="btnLogin" value="Login">
             			<a href="register.html" rel="register" class="linkform">Forgot your password?</a>
             			<a href="user/index.php?view=add" rel="register" class="linkform">You don't have an account yet? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
				
    </body>
</html>
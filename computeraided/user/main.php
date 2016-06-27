<?php
if (!defined('WEB_ROOT')) {
	exit;
}



// for paging
// how many rows to show per page
$rowsPerPage = 10;

$sql = "SELECT pd_id, pd_name, pd_image
        FROM tbl_pictures
		Where pd_idnumber ='$session'
		ORDER BY pd_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);


?> 

<head profile="http://gmpg.org/xfn/11">
<title>Intermediate Algebra</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<script type="text/javascript" src="<?php echo WEB_ROOT;?>user/include/scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT;?>user/include/scripts/jquery.waterwheelCarousel.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT;?>user/include/scripts/jquery.waterwheelCarousel.setup.js"></script>
<style type="text/css">
<!--
.style1 {font-size: smaller}
body {
	background-color: #fffff;
}
-->
</style>
</head>
<body id="top">
<div class="wrapper col3">
  <div id="waterwheelCarousel">

  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($pd_image) {
			$pd_image = WEB_ROOT . 'images/product/' . $pd_image;
		} else {
			$pd_image = WEB_ROOT . 'images/no-image-large.png';
		}	
		
		$i += 1;
?>

   <img src="<?php echo $pd_image; ?>" alt="" height="300" >
   
  <?php
	} // end while
?>

   <?php 
echo $pagingLink;
   ?>



<?php	
} else {
?>
no pictures posted
<?php

}
?>

  </div>
  </div>
</div>
</body>
</html>


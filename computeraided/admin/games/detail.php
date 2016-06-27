<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// make sure a product id exists
if (isset($_GET['classname']) && $_GET['classname'] > 0) {
	$classname = $_GET['classname'];
} else {
	// redirect to index.php if product id is not present
	header('Location: index.php');
}

$sql = "SELECT c_id, c_name, c_filename
        FROM tbl_games 
		
		WHERE c_id ='$classname'";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);



?>
<p>&nbsp;</p>
<form action="processProduct.php?action=addProduct" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Game Name:</td>
   <td class="content"><?php echo $c_name; ?></td>
  </tr>
  <tr> 
   <td width="150" class="content" colspan="2" align="center">
   
     <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="710" height="420" title="flashtitle">
       <param name="movie" value="<?php echo WEB_ROOT;?>games/<?php echo $c_filename; ?>.swf" />
       <param name="quality" value="high" />
       <embed src="<?php echo WEB_ROOT;?>games/<?php echo $c_filename; ?>.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="710" height="420"></embed>
     </object>  </tr>

 </table>
 <p align="center"> 
 </p>
</form>

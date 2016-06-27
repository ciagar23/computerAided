<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
$sql = "SELECT c_id, c_name, c_classid, c_content, c_status, c_video
        FROM tbl_lesson where c_teacher ='$session' and c_id='$id'
		ORDER BY c_name";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);



?>
<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}
</script>
<script src="DWConfiguration/ActiveContent/IncludeFiles/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}
</script>
<body onload="MM_CheckFlashVersion('7,0,0,0','Content on this page requires a newer version of Adobe Flash Player. Do you want to download it now?');">
<p>&nbsp;</p>
<form action="processProduct.php?action=addProduct" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Lesson Title:</td>
   <td class="content"><?php echo $c_name; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label" colspan="2">&nbsp;</td>
   <tr>
   <td class="content" colspan="2">
 <iframe src="<?php echo WEB_ROOT;?>admin/upload/tmp/<?php echo $c_content; ?>" width="100%" scrolling="no" height="1000">
  <p>Your browser does not support iframes.</p>
</iframe>




</td>
  </tr>

 </table>
 <p align="center"> 
 <?php if ($c_video =='')
 { ?>
  <input name="btnModifyProduct" type="button" id="btnModifyProduct" value="Add Video" onClick="window.location.href='<?php echo WEB_ROOT;?>admin/upload/uploadvideo.php??idnumber=<?php echo $session;?>&classId=<?php echo $c_id; ?>';" class="box">
  &nbsp;&nbsp;
  <?php }
  else
  {
  ?>
  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="620" height="544">
<!--[if !IE]>-->
<object type="application/x-shockwave-flash" data="<?php echo WEB_ROOT;?>admin/upload/tmp/player.swf" width="620" height="544">
<!--<![endif]-->
<param name="movie" value="<?php echo WEB_ROOT;?>admin/upload/tmp/player.swf" />
<param name="wmode" value="transparent" />
<param name="bgcolor" value="#FFFFFF" />
<param name="quality" value="high" />
<param name="allowFullScreen" value="true" />
<param name="allowscriptaccess" value="always" />
<a href="http://www.adobe.com/go/getflash">
<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
</a>
<param name="flashvars" value="vdo=<?php echo WEB_ROOT;?>admin/upload/tmp/<?php echo $c_video; ?>&amp;autoplay=false" />
<!--[if !IE]>-->
</object>
<!--<![endif]-->
</object>

  
  <br>
  
  <?php }?>
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
 </p>
</form>

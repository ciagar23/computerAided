<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$classname = (isset($_GET['class']) && $_GET['class'] > '') ? $_GET['class'] : '';
?> 


    <script type="text/javascript" src="<?php echo WEB_ROOT;?>/wysiwyg/scripts/jquery-1.3.2.js"></script>

    <script type="text/javascript" src="<?php echo WEB_ROOT;?>/wysiwyg/scripts/jHtmlArea-0.7.5.js"></script>
    <link rel="Stylesheet" type="text/css" href="<?php echo WEB_ROOT;?>/wysiwyg/style/jHtmlArea.css" />
    
      <style type="text/css">
        /* body { background: #ccc;} */
        div.jHtmlArea .ToolBar ul li a.custom_disk_button 
        {
            background: url(<?php echo WEB_ROOT;?>/wysiwyg/images/disk.png) no-repeat;
            background-position: 0 0;
        }
        
        div.jHtmlArea { border: solid 1px #ccc; }
    </style>
</head>
<body>

    <script type="text/javascript">
        // You can do this to perform a global override of any of the "default" options
        // jHtmlArea.fn.defaultOptions.css = "jHtmlArea.Editor.css";

        $(function() {
        //
            $("#test").htmlarea();

            $("#Textarea1").htmlarea({
            toolbar: ["html","bold", "italic", "underline", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "link", "unlink", "|",
                    {
                        css: "custom_disk_button", // This is how to add a completely custom Toolbar Button
                        text: "Save",
                        action: function(btn) {
                            // 'this' = jHtmlArea object
                            // 'btn' = jQuery object that represents the <A> "anchor" tag for the Toolbar Button
                            alert('SAVE!\n\n' + this.toHtmlString());
                        }
                    }
                    
                ], // Overrides/Specifies the Toolbar buttons to show
                css: "<?php echo WEB_ROOT;?>/wysiwyg/jHtmlArea.Editor.css", // Specify a specific CSS file to use for the Editor
                loaded: function() { // Do something once the editor has finished loading
                    //// 'this' is equal to the jHtmlArea object
                    //alert("jHtmlArea has loaded!");
                    //this.showHTMLView(); // show the HTML view once the editor has finished loading
                }
            });
        //
            $("textarea").htmlarea(); // Initialize jHtmlArea's with all default values
        });
    </script>
    


<p class="errorMessage">&nbsp;</p>
<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">


 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
 <input name="txtClass" type="hidden" class="box" id="txtClass" value="<?php echo $classname;?>" >
  <tr> 
   <td width="150" class="label">Question</td>
   <td class="content">
   <textarea rows="10" cols="60" name="txtQuestion" id="area2"></textarea>
   
   </td>
  </tr>
    <tr> 
   <td width="150" class="label">Correct Answer</td>
   <td class="content"> <input name="txtAnswer" type="text" class="box" id="txtAnswer" size="50" maxlength="50"></td>
  </tr>
  
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add Question" onClick="checkAddUserForm();" class="box">
  <input name="btnAddUser" type="button" id="btnAddUser" value="Done" onClick="window.location='<?php echo WEB_ROOT;?>admin/exam';" class="box">
   
 </p>
</form>

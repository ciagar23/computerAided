<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT *
        FROM tbl_class where c_id='$classname'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	

?> 
<p>&nbsp;</p>
<form action="processClass.php?action=addClass" method="post" enctype="multipart/form-data" name="frmAddClass" id="frmAddClass">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr><td colspan="2" id="entryTableHeader">Please Add Exam</td></tr>

  <tr> 
   <td width="150" class="label">Lessons Title</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="100"> 
   </td>
  </tr>  
  
  <tr> 
   <td width="150" class="label" colspan="2">Lessons<br>
   <textarea name="txtContent" id="Content"> </textarea>
			

   <input name="txtTeacher" type="hidden" class="box" value="<?php echo $idnumber;?>" id="txtTeacher">
   <input name="txtId" type="hidden" class="box" value="<?php echo $classname;?>" id="txtId">
   
   
   
   </td>
  </tr>  
   
   </td>
  </tr>  
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Item" onClick="checkAddLessonForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
	<script src="<?php echo WEB_ROOT;?>admin/include/textarea/ckeditor.js"></script>
	<script src="<?php echo WEB_ROOT;?>admin/include/textarea/samples/sample.js"></script>
	<script>

				CKEDITOR.replace( 'txtContent', {
					/*
					 * Style sheet for the contents
					 */
					contentsCss: 'assets/outputxhtml/outputxhtml.css',

					/*
					 * Core styles.
					 */
					coreStyles_bold: {
						element: 'span',
						attributes: { 'class': 'Bold' }
					},
					coreStyles_italic: {
						element: 'span',
						attributes: { 'class': 'Italic' }
					},
					coreStyles_underline: {
						element: 'span',
						attributes: { 'class': 'Underline' }
					},
					coreStyles_strike: {
						element: 'span',
						attributes: { 'class': 'StrikeThrough' },
						overrides: 'strike'
					},
					coreStyles_subscript: {
						element: 'span',
						attributes: { 'class': 'Subscript' },
						overrides: 'sub'
					},
					coreStyles_superscript: {
						element: 'span',
						attributes: { 'class': 'Superscript' },
						overrides: 'sup'
					},

					/*
					 * Font face.
					 */

					// List of fonts available in the toolbar combo. Each font definition is
					// separated by a semi-colon (;). We are using class names here, so each font
					// is defined by {Combo Label}/{Class Name}.
					font_names: 'Comic Sans MS/FontComic;Courier New/FontCourier;Times New Roman/FontTimes',

					// Define the way font elements will be applied to the document. The "span"
					// element will be used. When a font is selected, the font name defined in the
					// above list is passed to this definition with the name "Font", being it
					// injected in the "class" attribute.
					// We must also instruct the editor to replace span elements that are used to
					// set the font (Overrides).
					font_style: {
						element: 'span',
						attributes: { 'class': '#(family)' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^Font(?:Comic|Courier|Times)$/
								}
							}
						]
					},

					/*
					 * Font sizes.
					 */
					fontSize_sizes: 'Smaller/FontSmaller;Larger/FontLarger;8pt/FontSmall;14pt/FontBig;Double Size/FontDouble',
					fontSize_style: {
						element: 'span',
						attributes: { 'class': '#(size)' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^Font(?:Smaller|Larger|Small|Big|Double)$/
								}
							}
						]
					} ,

					/*
					 * Font colors.
					 */
					colorButton_enableMore: false,

					colorButton_colors: 'FontColor1/FF9900,FontColor2/0066CC,FontColor3/F00',
					colorButton_foreStyle: {
						element: 'span',
						attributes: { 'class': '#(color)' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^FontColor(?:1|2|3)$/
								}
							}
						]
					},

					colorButton_backStyle: {
						element: 'span',
						attributes: { 'class': '#(color)BG' },
						overrides: [
							{
								element: 'span',
								attributes: {
									'class': /^FontColor(?:1|2|3)BG$/
								}
							}
						]
					},

					/*
					 * Indentation.
					 */
					indentClasses: [ 'Indent1', 'Indent2', 'Indent3' ],

					/*
					 * Paragraph justification.
					 */
					justifyClasses: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull' ],

					/*
					 * Styles combo.
					 */
					stylesSet: [
						{ name: 'Strong Emphasis', element: 'strong' },
						{ name: 'Emphasis', element: 'em' },

						{ name: 'Computer Code', element: 'code' },
						{ name: 'Keyboard Phrase', element: 'kbd' },
						{ name: 'Sample Text', element: 'samp' },
						{ name: 'Variable', element: 'var' },

						{ name: 'Deleted Text', element: 'del' },
						{ name: 'Inserted Text', element: 'ins' },

						{ name: 'Cited Work', element: 'cite' },
						{ name: 'Inline Quotation', element: 'q' }
					]
				});

			</script>
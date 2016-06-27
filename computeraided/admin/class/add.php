<?php
if (!defined('WEB_ROOT')) {
	exit;
}


?> 
<p>&nbsp;</p>
<form action="processClass.php?action=addClass" method="post" enctype="multipart/form-data" name="frmAddClass" id="frmAddClass">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr><td colspan="2" id="entryTableHeader">Please Add Class</td></tr>

  <tr> 
   <td width="150" class="label">Class Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Subject</td>
   <td class="content"> <input name="txtSubject" type="text" class="box" id="txtSubject" size="30" maxlength="100"></td>
  </tr>  
  <tr> 
   <td width="150" class="label">Schedule</td>
   <td class="content"> 
   
         <select name="txtSchedule1" class="box">
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
     <option>5</option>
     <option>6</option>
     <option>7</option>
     <option>8</option>
     <option>9</option>
     <option>10</option>
     <option>11</option>
     <option>12</option>
   </select>
   :
            <select name="txtSchedule2" class="box">
     <option>00</option>
     <option>30</option>
   </select>
      <select name="txtSchedule3" class="box">
     <option>AM</option>
     <option>PM</option>
   </select>
   -
            <select name="txtSchedule4" class="box">
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
     <option>5</option>
     <option>6</option>
     <option>7</option>
     <option>8</option>
     <option>9</option>
     <option>10</option>
     <option>11</option>
     <option>12</option>
   </select>
   :
            <select name="txtSchedule5" class="box">
     <option>00</option>
     <option>30</option>
   </select>
      <select name="txtSchedule6" class="box">
     <option>AM</option>
     <option>PM</option>
   </select>
   
          <select name="txtSchedule7" class="box">
     <option>MWF</option>
     <option>TTH</option>
     <option>Daily</option>
   </select>
   
   
   </td>
  </tr>  
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Item" onClick="checkAddClassForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

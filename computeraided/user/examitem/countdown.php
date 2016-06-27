<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// for paging
// how many rows to show per page
$rowsPerPage = 5;

$sql = "SELECT c_id, c_name, c_schedule, c_subject, c_time, c_minute
        FROM tbl_exam where c_teacher ='$session' and c_name='$name'
		ORDER BY c_name";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));

if ($c_minute ==1)
{
$minute ='second/s';
}
else if ($c_minute ==60)
{
$minute ='minutes/s';
}
else
{
$minute ='hours/s';
}


?>  
<!-- Java start -->
<script>

var fredo = setTimeout( "do_countdown()", 1000);

 function do_countdown()
 { 
var start_num = <?php echo $c_time;?>; 
var unit_var = <?php echo $c_minute;?>; 
start_num = start_num * parseInt(unit_var); 
var countdown_output = document.getElementById('countdown_div'); 

if (start_num > 0)
 { 
countdown_output.innerHTML = format_as_time(start_num); 
var t=setTimeout("update_clock(\"countdown_div\", "+start_num+")", 1000);
 } 
return false;
 } 

function update_clock(countdown_div, new_value) 
{ 
var countdown_output = document.getElementById(countdown_div);
 var new_value = new_value - 1;

 if (new_value > 0) 
{
 new_formatted_value = format_as_time(new_value); countdown_output.innerHTML = new_formatted_value;
 var t=setTimeout("update_clock(\"countdown_div\", "+new_value+")", 1000);
 }
 else 
{
 countdown_output.innerHTML = window.location.href = 'index.php?view=exit&class=<?php echo $classname;?>';
}
 } 

function format_as_time(seconds)
 { 
var minutes = parseInt(seconds/60); 
var seconds = seconds - (minutes*60);
 if (minutes < 10) 
{ 
minutes = "0"+minutes; 
} 
if (seconds < 10) { seconds = "0"+seconds; 
}
 var return_var = minutes+':'+seconds; return return_var; 
}

</script> 

<!-- java end -->

<!-- html start -->
 <div id="body_wrapper"> 
 <form id="countdown_form" onsubmit="return do_countdown();">
  </form> 
 <div id=""><span id="countdown_div">&nbsp; Are you ready to take the test? This wil take <?php echo $c_time;?> <?php echo $minute;?></span></div>  </div> 
<!-- Html end -->



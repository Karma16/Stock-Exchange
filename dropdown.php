<html>
 
 <head>
   <?php include ('inc.php');
     session_start();?>
</head>
 
<body>
 
<form name="dates" action="index.php?id=44#today" method="post" onsubmit="return validation()">

<select name="period" id="period"  onchange="changeFirst()" class="drp">
   <option value="" >Select interval</option> 
    
  <option value="intraday">every 5 mins</option>
  <option value="day" >every day</option> 
  <option value="week" >every week</option>
  <option value="month">every month</option>	
</select>

    <table id="dates" ><TR><TD><label for="start_date" id="start_date"  >Start Date:</label></TD>
                <TD><input type="date" id="start_date" name="start_date" class="tcal" value="<?php echo isset($_SESSION['start_date']) ? $_SESSION['start_date'] : '' ?>" onChange="checkdate(this)" /></TD>
            </TR>

            <TR>
                <TD><label for="end_date" id='end_date'>End Date:</label></TD>
                <TD><input type="date" id="end_date" name="end_date" class="tcal" value="<?php echo isset($_SESSION['end_date']) ? $_SESSION['end_date'] : '' ?>" onChange="checkdate(this)" /></TD>
            </TR>
          
            
               
        </table>
 
 <input type="text" id="today" name="today" value="<?php 
    date_default_timezone_set('America/New_York');
                           $today = date('d/m/Y');
                           echo $today?>" hidden/>
            
    
<input class="btn btn-primary btn-lg" type="submit" name="formSubmit" value="Submit" />
  
</form>	
 
</body>	
	</html>
<?php 





if(isset($_POST['formSubmit'])) 
{ 
    $_SESSION['period'] = $_POST['period'];
$_SESSION['start_date'] = $_POST['start_date'];
$_SESSION['end_date'] = $_POST['end_date'];
    
  $period = $_POST['period'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $errorMessage = "";
  
if (preg_match("^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$",$start_date)===0) 
{
    echo "date error";
    return false;
    
}
 if (preg_match("^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$",$end_date)===0) 
{
    echo "date error";
      return false;
  
}
  if(empty($period)) 
  { 
      return false;
   
  }
  /*  if($start_date>$end_date) 
  { 
      ?> <script>alert('Please enter the start date no later than the end date.');
           start_date.focus(); 
         </script><?php
   
  }
    if($end_date>$today) 
  { 
      ?> <script>alert('Please enter the end date no later than today.');
           start_date.focus(); 
         </script><?php
   
  }*/
 /*   if($start_date>$end_date) 
  {  ?> <script>alert('Please enter the start date no later than the end date.');
           start_date.focus(); 
         </script><?php
     return false;
   
   
  }
    if($end_date>$today) 
  { ?> <script>alert('Please enter the end date no later than today.');
           start_date.focus(); 
         </script><?php
      return false;
   
  }
  */
}

    
  



?>
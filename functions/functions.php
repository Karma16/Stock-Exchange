<?php
 function redirect($url) {
     echo "<script type='text/javascript'>location.replace('$url');</script>"; 
  
}
    
function alert($msg) 
    { 
        echo "<script type='text/javascript'>alert('$msg');</script>"; 
    
    } 
function val_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
function val_input_not_null($data) {
    if(empty($data))
    {
        $data = "non-defined";
    }
    else{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
    }
return $data;
}
function val_input_num($data) {

$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>
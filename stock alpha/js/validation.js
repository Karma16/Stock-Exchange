 function checkEnteredDates(stdateval,endateval){
 //seperate the year,month and day for the first date
 var stryear1 = stdateval.substring(6);
 var strmth1  = stdateval.substring(0,2);
 var strday1  = stdateval.substring(5,3);
 var date1    = new Date(stryear1 ,strmth1 ,strday1);
 
 //seperate the year,month and day for the second date
 var stryear2 = endateval.substring(6);
 var strmth2  = endateval.substring(0,2);
 var strday2  = endateval.substring(5,3);
 var date2    = new Date(stryear2 ,strmth2 ,strday2 );
 

    
 var datediffval = (date2 - date1 )/864e5;
 
 if(datediffval < 0){
  
  return false;
 }
  
 return true;
}

function validation()								 
{  
    
    var today = document.forms["dates"]["today"];
	var period = document.forms["dates"]["period"];
	var start_date = document.forms["dates"]["start_date"];

	var end_date = document.forms["dates"]["end_date"]; 
	
  //  window.alert(today.value);
   //  window.alert(start_date.value);
    // window.alert(end_date.value);
  //   window.alert(period.value);
  
    
    if (period.value == "")								 
	{ 
		window.alert("Please set the interval."); 
		period.focus(); 
		return false; 
	} 

	if (start_date.value == "" && period.value != "intraday")							 
	{ 
		window.alert("Please enter the start date for interval."); 
		start_date.focus(); 
		return false; 
	} 
	
	if (end_date.value == "" && period.value != "intraday")							 
	{ 
		window.alert("Please enter the end date for interval."); 
		end_date.focus(); 
		return false; 
	} 
if (period.value != "intraday")
    {
 if(checkEnteredDates(start_date.value,end_date.value)==false)
    {
        window.alert("Please enter the start date no later than the end date."); 
        start_date.focus(); 
       return false;
        }
  if(checkEnteredDates(end_date.value, today.value)==false)
    {window.alert("Please enter the end date no later than today."); 
        start_date.focus(); 
       return false;
        }

    }
	return true; 
}
   

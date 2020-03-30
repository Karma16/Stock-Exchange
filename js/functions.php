<?php
//require ('validation.php');
date_default_timezone_set('America/New_York');
function round_time($ts, $step) {
	
 return(floor(floor($ts/60)/60)*3600+floor(date("i",$ts)/$step)*$step*60);
	
}

function get_weeks($dateFromString, $dateToString)
{  //date_validation($dateFromString);
//date_validation($dateToString);
    $dateFrom = new \DateTime($dateFromString);
    $dateTo = new \DateTime($dateToString);
    $dates = [];

    if ($dateFrom > $dateTo) {
        return $dates;
    }

    if (1 != $dateFrom->format('N')) {
        $dateFrom->modify('next friday');
    }

    while ($dateFrom <= $dateTo) {
        $dates[] = $dateFrom->format('Y-m-d');
        $dateFrom->modify('+1 week');
    }
array_push($dates, $dateTo->format('Y-m-d'));
    return $dates;
}

function get_months($date1, $date2) {

    $time1 = strtotime($date1);
    $time2 = strtotime($date2);

    $my = date('mY', $time2);
    $months = array(date('Y-m-t', $time1));
    $f = '';

    while($time1 < $time2) {
        $time1 = strtotime((date('Y-m-d', $time1).' +15days'));

        if(date('F', $time1) != $f) {
            $f = date('F', $time1);

            if(date('mY', $time1) != $my && ($time1 < $time2))
                $months[] = date('Y-m-t', $time1);
        }

    }

    $months[] = date('Y-m-d', $time2);
    return $months;
}
function get_days($first, $last ) {
	$step = '+1 day';
	$output_format = 'Y-m-d';
    $dates = array();
    $s_date=date('Y/m/d',$first);
    $today=date('Y/m/d');
    
    if(($today-$s_date)>50)
    {
        $n_date=date('Y/m/d',strtotime('-50 day', strtotime($today)));
        $first = $n_date;
    }
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {
        $dayofweek = date('l', $current);
        if ($dayofweek!='Sunday' or $dayofweek!='Saturday'){
        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }
    }
    return $dates;
}

function get_5mins( ) {
    $first= date('Y-m-d H:i:s');
    $last = date('Y-m-d H:i:s');
    $today = date('Y-m-d H:i:s');
   
    
    if ($today>date('Y-m-d 09:35:00'))
    { 
        $first = date('Y-m-d 09:35:00',strtotime($today));
       $last = date('Y-m-d H:i:s',strtotime($today));
    }
    if ($today<date('Y-m-d 09:35:00'))
    { 
        $today = date('Y-m-d 09:35:00',strtotime($today.'-1 day'));
        $first = date('Y-m-d 09:35:00',strtotime($today));
        $last = date('Y-m-d 16:00:00',strtotime($today));
    }
    
     if ($today>date('Y-m-d 16:00:00'))
     {
        $first = date('Y-m-d 09:35:00',strtotime($today));
        $last = date('Y-m-d 16:00:00',strtotime($today));
     }
    
	$step = '+5 min';
	$output_format = 'Y-m-d H:i:s';
    $dates = array();
    
  /*  if ($first==$last)
    { $first = date('Y-m-d 09:35:00',strtotime($first));
        $last = date('Y-m-d 16:00:00',strtotime($last));
    }*/

    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {
        
        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
        }
    

    return $dates;
}

?>
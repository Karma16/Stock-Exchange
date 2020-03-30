
    <?php
date_default_timezone_set('America/New_York');
//header("Refresh: 60");

$period =  $_SESSION['period'];
$start_date = $_SESSION['start_date'] ;
$end_date = $_SESSION['end_date'] ;

require 'functions.php';

$API_KEY = "5ARVF4ITHJJT44GH";
    $dates = [];
    $labels = [];
    $data = [];

   $atts = array(
    'width' => '600',
    'height' => '410',
    'time' => 'intraday',
    'number' => '90',
    'size' => 'compac', /* compac or full */
    'interval' => '5', /* 1min, 5min, 15min, 30min, 60min */
    'apikey' => '5ARVF4ITHJJT44GH',
    'cache' => 3600
  );
   
    

    switch ($period) {
        case 'intraday':
            $series = 'TIME_SERIES_INTRADAY';
            $series_name = 'Time Series (' . $atts['interval'] . 'min)';
            $dates=get_5mins();
            break;
        case 'day':
            $series = 'TIME_SERIES_DAILY';
            $series_name = 'Time Series (Daily)';
            $atts['interval'] ='';
          $dates=get_days($start_date,$end_date); 
      
            break;
        case '3':
            $series = 'TIME_SERIES_DAILY_ADJUSTED';
            $series_name = 'Time Series (Daily)';
            break;
        case 'week':
            $series = 'TIME_SERIES_WEEKLY';
            $series_name = 'Weekly Time Series';
            $dates = get_weeks($start_date, $end_date);  
            break;
        case 'month':
            $series = 'TIME_SERIES_MONTHLY';
            $series_name = 'Monthly Time Series';
            $dates = get_months($start_date, $end_date); 
            break;
        default:
            $series = 'Time Series (Daily)';
            break;
    }

//JSON

//echo '  series: '.$series_name.'<br/>';

$url="https://www.alphavantage.co/query?function=".$series."&symbol=GOOG&interval=" . $atts['interval'] . "min&apikey=".$atts['apikey'];
    
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,($url));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);
curl_close ($ch);
$result = json_decode($server_output);

$dataForAllDays = $result->{$series_name};

$previous_date = null;

foreach ($dates as $value){ 
   
  
    if ($period=='intraday')
    { 
        array_push($labels, date('m/d/y H:i',strtotime($value)));
       
    }
    else
    {  
        array_push($labels,date('m/d/y',strtotime($value)));
       
        
        
    }         
    if (empty($dataForSingleDate= $dataForAllDays->{$value} ))
    {   
    
    if ($period =='day' or $period == 'week' or $period =='month' )
        {  
        
       if (empty($previous_date))
           {
               $previous_date = date('Y-m-d',strtotime('-1 day', strtotime($value)));
           }
        $value = $previous_date;

 
        }

    }
     if (!empty($dataForSingleDate= $dataForAllDays->{$value} ))
     {
/*echo '<br/>';
echo ''.$value.'<br/>';*/

/*echo  $open. '<br/>';
echo $dataForSingleDate->{'2. high'} . '<br/>';
echo $dataForSingleDate->{'3. low'} . '<br/>';
echo $dataForSingleDate->{'5. volume'} . '<br/>';*/
$open = $dataForSingleDate->{'1. open'};
$close =  $dataForSingleDate->{'4. close'} ;
 //echo $close. '<br/>';

   
array_push($data, $close.'');//array with data!!!
     }
     $previous_date = $value;
    
       }
/*
foreach ($data as $value){
    echo 'data '.$value;
}
*/
?>

<html>
    <head>
  

  <!--ChartJs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">
  
    </head>
    <body>
        
 
 <div class="chart-layout"> 
   		<canvas id="chart" height="15" width="35"></canvas>
  </div>
<div id="holder"></div>
  
    <script >
        var arr = <?php echo(json_encode($labels)); ?>;//!!array of labels
   var data_php = <?php echo(json_encode($data)); ?>;
            const CHART = document.getElementById("chart");
console.log(CHART);
let lineChart = new Chart(CHART,{
  type: 'line',
  data: {
      labels: arr,
    datasets: [
    {
      label: "Aplhabet Inc.(GOOG)",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(75,192,192,0.4)",
      borderColor: "rgba(75,192,192,1)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "rgba(75,192,192,1)",
      pointBackgroundColor: "#fff",
      pointBorderWidth: 1,
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(75,192,192,1)",
      pointHoverBorderColor: "rgba(220,220,220,1)",
      pointHoverBorderWidth: 2,
      pointRadius: 1,
      pointHitRadius: 10,
      data: data_php,
    }]
  }
});</script>
           </body>
</html>



<!DOCTYPE html>
<html>
 <style> 
h4

       
  text-align: center;
      
}
#today-i
{
  font-size: 40px;
  color: darkblue;
  text-align: center;
  text-decoration: none;
  border-color: black;
  
  
}
     
#today_in
{
  font-size: 17px;
  color: darkblue;
  text-align: center;
  text-decoration: none;
  border: none;
}     
</style>
<?php 
//session_start();
include ('inc.php');

if(isset($_SESSION['email']))
{//
alert("Hello ".$_SESSION['name']."! How are you today?");
}
else
{?>
  <script>
    var yes = confirm("Hi there! Would you like to register?");
    if (yes) {
      window.location.replace("reg.php");
    } else {
        // Do nothing!
    }
  </script>
<?php 
}
    //header("location: login.php")



$_SESSION['today'] = $today;


date_default_timezone_set('America/New_York');
$today=date('m/d/Y H:i:s a'); 
                
         
    
// set timeout period in seconds
/*$inactive = 1;
// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) )
{
$session_life = time() - $_SESSION['start'];
if($session_life > $inactive) 
{ 
    session_destroy(); 
    header("Location: index.php"); }
}
$_SESSION['timeout'] = time();

  */
   
header("Refresh:60");
?>
<body onload = "start();">
    
  <!-- Navigation -->
  <?php include("nav.php");?>
<!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Exchange with convenience</h1>
          <p class="lead mb-5 text-white-50"></p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>Alphabet Inc.(GOOG)</h2>
        <hr>
        <p>Google announced a 2-for-1 stock split way back in 2012, and it finally took effect in early 2014. The result: GOOG was joined by GOOGL, each representing different classes of Google stock.</p>
        <p>GOOGL stock allowed for voting rights, GOOG stock did not.</p>
        <a class="btn btn-primary btn-lg" href="companyDescription.html">read more &raquo;</a>
      </div>
      <div class="col-md-4 mb-5" >
        <?php include ('converter.php');?>

        <label for="today" id='today-i'></label>  
        <input type="text" id="today_in" name="today" value="
        <?php 
        date_default_timezone_set('America/New_York');
                        echo date('d/m/y H:i:s a'); 
        ?>" disabled/>

      </div>
    </div>
  <div class="row">
    <div class="col-md-8 mb-5">
      <?php include('dropdown.php');?>
      <h4><?php //echo  $_SESSION['period'];
          switch ($_SESSION['period'])
          { case 'intraday':
          echo '5 mins interval';
          break;
          case 'day':
          echo 'Daily interval';
          break;
          case 'week':
          echo 'Weekly interval';
          break;
          case 'month':
          echo 'Monthly interval';
          break;

          }?> 
    </h4>  
    </div>

  </div>

  </div> 
 
<?php  include('api.php');?>
 
  <!-- /.container -->

    
        
  
  
        
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Polina & Karma 2020</p>
    </div>
    <!-- /.container -->

  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
   
 
</html>


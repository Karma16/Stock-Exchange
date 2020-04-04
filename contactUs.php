<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stock Exchange</title>

  <!--ChartJs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">
  
 

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Stock Exchange</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="aboutUs.php">About Us</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="contactUs.php">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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
        <form action="functions/insert_comments.php" name="contactUs" method="post">
        <h5>Contact Us</h5>
        <TABLE>
            <tr>
                <td><label > Name:</label></td>
                <td><INPUT type="text" id="user_name" NAME="user_name" SIZE=30 placeholder="name"/></td>
           </tr>
           <tr>
                <td><label > Email:</label></td>
                <td><INPUT type="email" id="user_email" NAME="user_email" SIZE=30 placeholder="email" /></td>
           </tr>
            <tr>
                <td><label > Comment:</label></td>
                <td><textarea rows="10" cols="50" id="user_comment" name="user_comment" placeholder="Leave your comment here..."></textarea></td>
           </tr>
           <tr>
               <td><input TYPE="submit" name="submit" VALUE="submit"/></td>    
           </tr>
        </TABLE>
        </form>

  </div>
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
